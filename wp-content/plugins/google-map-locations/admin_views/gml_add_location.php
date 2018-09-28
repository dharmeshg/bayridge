<?php 
/**
 * Section to display Custom Admin overview
 * @author Dotsquares
 */
?>
<?php

if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) 
	die('You are not allowed to call this page directly.'); 
	
	
$title = __('Add New Location On Google Map');

global $wpdb;

?>

<div class="wrap" id="customers">
  <div class="icon32 icon32-posts-post" id="icon-edit"></div>
  <h2><?php echo esc_html( $title ); ?></h2>
  <div class="clear"></div>
  <?php if($_GET['trashed']==1){?>
  <div class="updated below-h2" id="message">
    <p> Record deleted successfully. </p>
  </div>
  <?php } if($_GET['action']=='add' && !isset($_GET['message'])){ ?>
  <div class="updated below-h2" id="message">
    <p> Record Added successfully. </p>
  </div>
  <?php } 
  if(isset($_SESSION['added'])){ ?>
  <div class="updated below-h2" id="message">
    <p> <?php
	 echo $_SESSION['added'];
	 unset($_SESSION['added']);
	 ?>. </p>
  </div>
  <?php } 
  ?>
  <br />
 <form name="add_trainer" id="add_trainer" action="<?php echo admin_url('admin.php?page=add-location&amp;action=add'); ?>" method="post" onsubmit="return checkForm();" enctype="multipart/form-data"> 
  <table style="padding-left:55px;" class="create_trainer" cellspacing="5">
  	<tr>
		<td width="150">Company Name*:</td>
		<td>
		<input type="hidden" class="my_input" name="category_id" id="category_id" value="1"/>
		<input type="text" class="my_input" name="name" id="name" placeholder="Company Name" value="<?php echo $_REQUEST['name'];?>"/>
		</td>
	</tr>
	<tr>
		<td>Address One*: </td>
		<td>
		<input type="text" class="my_input" name="address_one" id="address_one"  placeholder="Address One" value="<?php echo $_REQUEST['address_one'];?>">
		
		</td>
	</tr>	
	<tr>
		<td>Address Two: </td>
		<td>
		<input type="text" class="my_input" name="address_two" id="address_two"  placeholder="Address Two" value="<?php echo $_REQUEST['address_two'];?>">
		
		</td>
	</tr>	
	<tr>
		<td>Postcode: </td>
		<td>
		<input type="text" class="my_input" name="postcode" id="postcode"  placeholder="Postcode" value="<?php echo $_REQUEST['postcode'];?>"/>
		</td>
	</tr>
	<tr>
		<td>Phone: </td>
		<td>
		<input type="text" class="my_input" name="phone" id="phone"  placeholder="Phone" value="<?php echo $_REQUEST['phone'];?>"/>
		</td>
	</tr>
	<tr>
		<td>Emai: </td>
		<td>
		<input type="text" class="my_input" name="email" id="email" placeholder="Email" value="<?php echo $_REQUEST['email'];?>"/>
		</td>
	</tr>	
	<tr>
		<td>Latitude*: </td>
		<td>
		<input type="text" class="my_input" name="latitude" id="latitude" placeholder="Latitude" value="<?php echo $_REQUEST['latitude'];?>"/>
		<span id="errorEmail"></span>
		</td>
	</tr>
	<tr>
		<td>Longitude*: </td>
		<td>
		<input type="text" class="my_input" name="longitude" id="longitude"  placeholder="Longitude" value="<?php echo $_REQUEST['longitude'];?>"/>
		</td>
	</tr>
	<tr>
		<td>Description: </td>
		<td>
		
		<textarea class="" rows="4" cols="41" name="description" id="description"><?php echo $_REQUEST['description'];?></textarea>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
		<input type="submit" name="submit" id="submit" value="Add Location" />
		</td>
	</tr>
  </table>
  </form>
</div>
<script>

</script>