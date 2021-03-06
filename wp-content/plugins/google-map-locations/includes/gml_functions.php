<?php  
// this is the function page

/*
*
* Using this function we can get any file extension
*
*/	
function getExtension($str){
		$i = strrpos($str,".");
		if(!$i){
				return ""; 
		}
		$l 		= strlen($str) - $i;
		$ext 	= substr($str,$i+1,$l);
		return $ext;
}
/*
*
* Create new location
*
*/
function gml_add_new_location(){
		global $wpdb;
		
		
	$category_id 		= $_POST['category_id'];
	$name 				= $_POST['name'];
	$address_one 		= $_POST['address_one'];
	$address_two 		= $_POST['address_two'];
	$postcode 			= $_POST['postcode'];
	$phone 				= $_POST['phone'];
	$email	 			= $_POST['email'];
	$latitude 			= $_POST['latitude'];
	$longitude 			= $_POST['longitude'];
	$description 		= $_POST['description'];
	$created_date 		= date("Y-m-d h:i:s");
	$modified_date 		= date("Y-m-d h:i:s");
	
		$ins_data = $wpdb->insert( 
		$wpdb->prefix.'gml_locations', 
		array( 
			'category_id'		=> $category_id,
			'name' 				=> $name,
			'address_one' 		=> $address_one,
			'address_two' 		=> $address_two,
			'postcode' 			=> $postcode,
			'phone'				=> $phone,
			'email'				=> $email,
			'latitude' 			=> $latitude,
			'longitude' 		=> $longitude,
			'description' 		=> $description,
			'created_date'		=> $created_date,
			'modified_date'		=> $modified_date,
			'status' 			=> 1
		), 
		array( 
			'%d',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s', 
			'%d' 
		) 
		);
		
		$location_id = $wpdb->insert_id;
		
		if($ins_data){
				$_SESSION['added']="Location Added Successfully";
				?>
				<script>
					window.location.href = 
					"<?php echo admin_url("admin.php?page=google-map-location");?>";
				</script>
				<?php 		
				exit();
			}
}
/*
*
* Edit any location
*
*/
function gml_edit_location(){

	global $wpdb;
	
	$category_id 		= $_POST['category_id'];
	$name 				= $_POST['name'];
	$address_one 		= $_POST['address_one'];
	$address_two 		= $_POST['address_two'];
	$postcode 			= $_POST['postcode'];
	$phone 				= $_POST['phone'];
	$email	 			= $_POST['email'];
	$latitude 			= $_POST['latitude'];
	$longitude 			= $_POST['longitude'];
	$description 		= $_POST['description'];
	$created_date 		= date("Y-m-d h:i:s");
	$modified_date 		= date("Y-m-d h:i:s");
	
	$edit_data = $wpdb->update( 
		$wpdb->prefix.'gml_locations',
		array( 
			'category_id'		=> $category_id,
			'name' 				=> $name,
			'address_one' 		=> $address_one,
			'address_two' 		=> $address_two,
			'postcode' 			=> $postcode,
			'phone'				=> $phone,
			'email'				=> $email,
			'latitude' 			=> $latitude,
			'longitude' 		=> $longitude,			
			'description' 		=> $description,
			'created_date'		=> $created_date,
			'modified_date'		=> $modified_date,
			'status' 			=> 1
		),		 
		array( 'id' => $_POST['location_id']), 
		array( 
			'%d',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s', 
			'%d' 
		),
		array( '%d' )  
		);
	
	$location_id = $_POST['location_id'];
	
	if($edit_data){
	
	$_SESSION['edited']="Location Updated Successfully";
	
				?>
				<script>
					window.location.href = 
					"<?php echo admin_url("admin.php?page=google-map-location");?>";
				</script>
				<?php 		
				exit();
			}
}
/*
*
* Edit default settings
*
*/
function gml_edit_settings(){
 	global $wpdb;
 	
	$latitude 		= $_POST['latitude'];
	$longitude 		= $_POST['longitude'];
	$map_height		= $_POST['map_height'];
	$map_width		= $_POST['map_width'];	
	$show_phone 	= $_POST['show_phone'];
	$show_email 	= $_POST['show_email'];
	$created_date 	= date("Y-m-d h:i:s");
	
	$edit_data = $wpdb->update( 
		'wp_gml_settings',
		array(
			'latitude' 			=> $latitude,
			'longitude' 		=> $longitude,
			'map_height'		=> $map_height,
			'map_width'			=> $map_width,
			'show_phone'		=> $show_phone,
			'show_email'		=> $show_email,
			'created_date'		=> $created_date,
			'status' 			=> 1
		),		 
		array( 'id' => $_POST['settings_id']), 
		array(
			'%s',
			'%s',
			'%s',
			'%s',
			'%d', 
			'%d', 
			'%s',
			'%d' 
		),
		array( '%d' )  
		);
	
	
	if($edit_data){
	
	$_SESSION['edited']="Settings Updated Successfully";
	
				?>
				<script>
					window.location.href = 
					"<?php echo admin_url("admin.php?page=gml-settings");?>";
				</script>
				<?php 		
				exit();
			}
 
} 
/*
*
* Create view for map (front side)
*
*/
function gml_show_map_with_location(){
	global $wpdb;
	
	$sql = "SELECT *FROM ".GML_TABLE_PREFIX."settings where status='1'";
	$default_record = $wpdb->get_results($sql,"ARRAY_A");
	
	$latitude 		=  $default_record[0]['latitude'];
	$longitude 		=  $default_record[0]['longitude'];
	$use_radius 	=  $default_record[0]['use_radius'];
	$map_height 	=  $default_record[0]['map_height'];
	$map_width  	=  $default_record[0]['map_width'];
	
	$show_phone  	=  $default_record[0]['show_phone'];
	$show_email  	=  $default_record[0]['show_email'];
	
	if($use_radius==1){
		$clsss = "form_show";
	}else{
		$clsss = "form_hide";
	}
		
	/*
	*
	* Get all location anme
	*
	*/	
	$sql_location = "SELECT *FROM ".GML_TABLE_PREFIX."locations where status='1'";
	$location_record = $wpdb->get_results($sql_location);
	
	
	
	
	?>
	<style>
	.form_hide{display:none !important;}
	.GoogleMapInfoWindow {color: #000000;}
	</style>
	
<div>
	<form name="frm" action="#">
		<div class="findatrainer">	
		<label for='<%=txtPostCodeSearch.ClientID %>'>Post Code:</label>
		<input type="text" id="txtPostCodeSearch" name="txtPostCodeSearch" class="postcode textboxwatermark"  title="Enter Post Code" />
		<input type="submit" name="btnPostCodeSearch" id="btnPostCodeSearch" class="btnPostCodeSearch" value="GO" />
		</div>
	</form>	
</div>
	
<div id="map_canvas" style="height:<?php echo $map_height;?>px;width:<?php echo $map_width;?>px;"></div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo GML_URL.'/js';?>/gml_find_location.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

    google.load('maps','3.6',{other_params:'sensor=false'});

    var map;
    var geocoder;
    var icon0 ;
    var newpoints = new Array();
    var popupContent;

    function addLoadEvent(func) {
        var oldonload = window.onload;
        if (typeof window.onload != 'function') {
            window.onload = func
        } else {
            window.onload = function () {
                oldonload();
                func();
            }
        }
    }

    addLoadEvent(loadMap);
    addLoadEvent(addPoints);

    function loadMap() {

        var myOptions = {
            center: new google.maps.LatLng(<?php echo $latitude;?>, <?php echo $longitude;?>),
            zoom: 5,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map_canvas"),
           myOptions);
    }

    function addPoints() {
		<?php
		$i = 0; 
      foreach($location_record as $locations){
	  	if($show_phone==1){
		
			$p_phone = "Phone:- ".$locations->phone; 
			
		}else{
		
			$p_phone = "";
			
		}
		if($show_email==1){
		
			$p_email = "<br />Email:- ".$locations->email;
			
		}else{
		
			$p_email = "";
			
		}
		
		if($locations->latitude!=''){
			$marker_image = GML_URL.'/images/test_pointer.png';
		}else{
			$marker_image = GML_URL.'/images/test_pointer.png';
		}
	 
	  
	  ?>
        newpoints["<?php echo $i?>"] = new Array(
			"<?php echo $locations->latitude;?>",
			"<?php echo $locations->longitude;?>",
			"<?php echo $marker_image;?>",
			"",
			"<span class='title'><?php echo $locations->name;?></span><hr /><span style='float:left;'><?php echo $locations->address_one;?><br /><?php echo $locations->address_two;?><br><?php echo $locations->postcode;?><br /><?php echo $p_phone;?><?php echo $p_email;?></span><?php echo $p_image;?><?php echo $p_url;?>"
		);
		
		<?php
		$i++;
		 }?>	

        for (var i = 0; i < newpoints.length; i++) {     
            createMarker(newpoints[i]);
        }

    }

    function createMarker(markerPoint){
        var myLatLng = new google.maps.LatLng(markerPoint[0], markerPoint[1]);            
    
        var popupContent = markerPoint[4];

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: 'http://www.google.com/mapfiles/marker.png'
        });

        google.maps.event.addListener(marker, "click", function(){
            var infowindow = new google.maps.InfoWindow({
                content: "<div class='GoogleMapInfoWindow'>" + popupContent + "</div>"
            });
            infowindow.open(map, marker);
        });
    }

</script> 

<?php 

}
/*
*
* Delete any location based on id
*
*/
function gml_delete_location(){
	
	 global $wpdb;
	 $location_id = $_REQUEST['locationId'];
   	 $table = GML_TABLE_PREFIX."locations";
  	 $structure = "delete from $table where id='$location_id'";
     $description = $wpdb->query($structure); 
		
	if($description){
	
		$_SESSION['deleted']="Location Deleted Successfully";	
		
		?>
<script>
			window.location.href ="<?php echo admin_url("admin.php?page=google-map-location");?>";
		</script>
<?php 		
		exit();
	}else{
		$_SESSION['deleted']="Some problem in location delete please try again";
		?>
<script>
			window.location.href = "<?php echo admin_url("admin.php?page=google-map-location");?>";
		</script>
<?php 		
		exit();
	}

}
/*
*
* pagination function
*
*/
function pagination($total_record,$totalposts,$p,$lpm1,$prev,$next){
    $adjacents = 3;
    if($totalposts > 1)
    {
        $pagination .= "<center><div>";
        //previous button
        $pagination.= "<b>Total $total_record Records</b>";
		if ($p > 1)
        $pagination.= "<a href=\"?page=google-map-location&pg=$prev\"><< Prev</a> ";
        else
        $pagination.= "<span class=\"disabled\"><< Prev</span> ";
        if ($totalposts < 7 + ($adjacents * 2)){
            for ($counter = 1; $counter <= $totalposts; $counter++){
                if ($counter == $p)
                $pagination.= "<span class=\"current\">$counter</span>";
                else
                $pagination.= " <a href=\"?page=google-map-location&pg=$counter\">$counter</a> ";}
        }elseif($totalposts > 5 + ($adjacents * 2)){
            if($p < 1 + ($adjacents * 2)){
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
                    if ($counter == $p)
                    $pagination.= " <span class=\"current\">$counter</span> ";
                    else
                    $pagination.= " <a href=\"?page=google-map-location&pg=$counter\">$counter</a> ";
                }
                $pagination.= " ... ";
                $pagination.= " <a href=\"?page=google-map-location&pg=$lpm1\">$lpm1</a> ";
                $pagination.= " <a href=\"?page=google-map-location&pg=$totalposts\">$totalposts</a> ";
            }
            //in middle; hide some front and some back
            elseif($totalposts - ($adjacents * 2) > $p && $p > ($adjacents * 2)){
                $pagination.= " <a href=\"?page=google-map-location&pg=1\">1</a> ";
                $pagination.= " <a href=\"?page=google-map-location&pg=2\">2</a> ";
                $pagination.= " ... ";
                for ($counter = $p - $adjacents; $counter <= $p + $adjacents; $counter++){
                    if ($counter == $p)
                    $pagination.= " <span class=\"current\">$counter</span> ";
                    else
                    $pagination.= " <a href=\"?page=google-map-location&pg=$counter\">$counter</a> ";
                }
                $pagination.= " ... ";
                $pagination.= " <a href=\"?page=google-map-location&pg=$lpm1\">$lpm1</a> ";
                $pagination.= " <a href=\"?page=google-map-location&pg=$totalposts\">$totalposts</a> ";
            }else{
                $pagination.= " <a href=\"?page=google-map-location&pg=1\">1</a> ";
                $pagination.= " <a href=\"?page=google-map-location&pg=2\">2</a> ";
                $pagination.= " ... ";
                for ($counter = $totalposts - (2 + ($adjacents * 2)); $counter <= $totalposts; $counter++){
                    if ($counter == $p)
                    $pagination.= " <span class=\"current\">$counter</span> ";
                    else
                    $pagination.= " <a href=\"?page=google-map-location&pg=$counter\">$counter</a> ";
                }
            }
        }
        if ($p < $counter - 1)
        $pagination.= " <a href=\"?page=google-map-location&pg=$next\">Next >></a>";
        else
        $pagination.= " <span class=\"disabled\">Next >></span>";
        $pagination.= "</center>\n";
    }
    return $pagination;
}
/*
*
* Check and manage url
*
*/
function check_url($url){
	$urlhttp = substr($url,0,4);
	$urlwww = substr($url,0,3);
	
	if($urlhttp!='http' && $urlwww!='www'){
		$url = 'http//:www.'.$url;
	}
	if($urlhttp != 'http' && $urlwww == 'www'){
		$url = 'http//:'.$url;
	}
		
	return $url;
}

?>