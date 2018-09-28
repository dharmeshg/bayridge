<?php 
/**
 * Section to display Custom Admin overview
 * @author Dotsquares
 */
?>
<?php

if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) 
	die('You are not allowed to call this page directly.'); 
	
	
$title = __('Google Map Location Edit');

global $wpdb;
if($_REQUEST['action']='edit' && $_REQUEST['locationId']!=''){
	$location_id = $_REQUEST['locationId'];
	
	$sql = "SELECT *FROM ".GML_TABLE_PREFIX."locations where id='$location_id'";
	$location_record = $wpdb->get_results($sql,'ARRAY_A');
	
}
?>
<div class="wrap" id="customers">
  <div class="icon32 icon32-posts-post" id="icon-edit"></div>
  <h2><?php echo esc_html( $title ); ?></h2>
  <div class="clear"></div>
  <?php if($_GET['trashed']==1){?>
  <div class="updated below-h2" id="message">
    <p> Record deleted successfully. </p>
  </div>
  <?php } if($_GET['message']=='added'){ ?>
  <div class="updated below-h2" id="message">
    <p> Record Added successfully. </p>
  </div>
  <?php } 
  if($_GET['message']=='updated'){ ?>
  <div class="updated below-h2" id="message">
    <p> Record Updated successfully. </p>
  </div>
  <?php } ?>
  <br />
 <form name="add_trainer" id="add_trainer" action="<?php echo admin_url('admin.php?page=add-location&action=edit&locationId=$location_id'); ?>" method="post" onsubmit="return checkForm_edit();" enctype="multipart/form-data"> 
  <table style="padding-left:5px;" class="create_trainer" cellspacing="5">
  	<tr>
		<td width="150">Company Name*:</td>
		<td>
		<input class="my_input" type="hidden" name="location_id" id="location_id" value="<?php echo $location_record[0]['id']; ?>"/>
		<input class="my_input" type="hidden" name="category_id" id="category_id" value="<?php echo $location_record[0]['id']; ?>"/>
		<input class="my_input" type="text" name="name" id="name" placeholder="Full Name" value="<?php echo $location_record[0]['name']; ?>"/>
		
		</td>
	</tr>
	<tr>
		<td>Address One*: </td>
		<td>
		<input type="text" class="my_input" name="address_one" id="address_one" value="<?php echo $location_record[0]['address_one'];?>">
		
		</td>
	</tr>	
	<tr>
		<td>Address Two: </td>
		<td>
		<input type="text" class="my_input" name="address_two" id="address_two" value="<?php echo $location_record[0]['address_two'];?>">
		
		</td>
	</tr>	
	<tr>
		<td>Postcode: </td>
		<td>
		<input class="my_input" type="text" name="postcode" id="postcode"  placeholder="Postcode" value="<?php echo $location_record[0]['postcode']; ?>"/>
		</td>
	</tr>
	<tr>
		<td>Phone: </td>
		<td>
		<input type="text" class="my_input" name="phone" id="phone"  placeholder="Phone" value="<?php echo $location_record[0]['phone'];?>"/>
		</td>
	</tr>
	<tr>
		<td>Email: </td>
		<td>
		<input type="text" class="my_input" name="email" id="email" placeholder="Email" value="<?php echo $location_record[0]['email'];?>"/>
		</td>
	</tr>	
	<tr>
		<td>Latitude*: </td>
		<td>
		<input class="my_input" type="text" name="latitude" id="latitude"  placeholder="Latitude" value="<?php echo $location_record[0]['latitude']; ?>"/>
		</td>
	</tr>
	<tr>
		<td>Longitude*: </td>
		<td>
		<input class="my_input" type="text" name="longitude" id="longitude"  placeholder="Longitude" value="<?php echo $location_record[0]['longitude']; ?>"/>
		</td>
	</tr>
	<tr>
		<td>Description: </td>
		<td>
		
		<textarea class="" rows="4" cols="41" name="description" id="description"><?php echo $location_record[0]['description'];?></textarea>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
		<input type="submit" name="submit" id="submit" value="Edit Location" />
		</td>
	</tr>
  </table>
  </form>
</div>