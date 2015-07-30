<?php
session_start();?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<link rel="stylesheet" type="text/css" href="css/boostarp-admin.css" media="screen">
<style>

table {
  table-layout: fixed;
  width: 10px; /* Important */
}
td {
  width: 150px;
}
input {
    margin-top: 5px;
    width: 70px;
}

</style>

	<?php
      include 'router.php';
	  $admin = new Admin(DB1);
//    $compBookingsArr = $admin->getComplimentaryBookings();
//    echo "<pre>";
//    print_r($compBookingsArr);
?>

<?php
    $active ="ManageCategories";
    include 'admin_header.php';
?>
<div id="mws-container" class="clearfix" style="width:1630px;">
<div class="container" style="padding-top: 2%">
								
							<div class="mws-panel grid_8">
										<div class="mws-panel-header">
											<span><i class="icon-table"></i>New Card</span>
										</div>
										
										<div class="mws-panel-body no-padding">
											<table class="mws-datatable mws-table">
												<thead>
													<tr>
														<!--<th>#</th>-->
														
														<th><center>Login Name</center></th>
														<th><center>First Name</center></th>
														<th><center>Last Name</center></th>  
														<th style="width: 120px;"><center>Email</center></th>
														<th style="width: 150px;"><center>Mobile</center></th>
														<th><center>City</center></th>
														<th><center>State</center></th>
														<th><center>Zip Code</center></th>
														<th><center>Country</center></th>
														<th><center>Address</center></th>
														<th><center>Gender</center></th>
														<th><center>Card Type</center></th>
														<th><center>Card No</center></th>
														<th><center>Password</center></th>
														<th><center>D.O.B</center></th>
														
														<!--<th style="width: 100px;"><center>Delete Product</center></th>-->
													</tr>
												</thead>
												<tbody>
										<form action="card.php" method="POST">
												
														<tr>
														<!--<td><?php //echo $value['BookID'];?></td>-->
														<!--<td><center><?php //echo $line['prodID'];?></center></td>-->
														<td><center><input style="width: 45px;" id="product" type="text" name="Login_Name" value=""></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="FName" value=""></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="LName" value=""></center></td>
														<td><center><input style="width: 80px;" id="product" type="text" name="Email" value=""></center></td>
														<td><center><input style="width: 110px;" id="product" type="text" name="Mobile" value=""></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="City" value=""></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="State" value=""></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="ZipCode" value=""></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="Country" value=""></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="Address" value=""></center></td>
														<td><center><select name="Gender" style="width: 50px;">
															<option  value="Male">Male</option>
														    <option value="Female">Female</option>
														</select></center></td>

														
														
														
														<td><center>
														<?php 
											 
											 //$query = "SELECT * FROM gCardMaster"; 
											 //$result = mysql_query($query); ?>
										  
											<select name="CardTypeID" required style="width: 45px;"> <option value="" >Select</option>
												<?php $setgCardMaster = $admin->setgCardMaster(); 
												foreach ($setgCardMaster as $line) { ?> 
											
											<option value="<?php echo $line['CardTypeID'];?>"> <?php echo $line['CardName'];?> </option>   <?php } ?> 
											</select>
														
														</center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="CardNo" value=""></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="Password" value=""></center></td>
														<td><center>
												<div class="mws-form-row">
													<div class="mws-form-item">
														<input type="text" class="mws-datepicker large" name="DOB" readonly="readonly">
													</div>
												</div>
														</center></td>
														
														
														<!--<td><center><input value="Remove" class="btn btn-danger" type="button" onclick="window.location = 'delete_product.php?prodID=<?php echo $line['prodID'];?>&action=Remove';"></center></td>-->
														</tr>
												
												
												</tbody>
											</table>
										</div></br>
											<center><button class="btn btn-primary">Add New Card</button></center>
										</form>
							</div>
									<!-- Panels End -->
			</div><div class="container" style="padding-top: 2%">
								
							<div class="mws-panel grid_8">
										<div class="mws-panel-header">
											<span><i class="icon-table"></i>Card Details</span>
										</div>
										<div class="mws-panel-body no-padding">
											<table class="mws-datatable mws-table">
												<thead>
													<tr>
														<!--<th>#</th>-->
														
														<th style="width: 75px;"><center>Valid From</center></th>
														<th style="width: 85px;"><center>Valid Till</center></th>
														<th style="width: 75px;"><center>Avl Comp Games</center></th>
														<th style="width: 85px;"><center>Avl Learn Sessions</center></th>
														<th style="width: 75px;"><center>Avl Assist Sessions</center></th>
														<th style="width: 85px;"><center>Avl Global Sessions</center></th>
														<th style="width: 75px;"><center>Avl Trophy Games</center></th>
														<th style="width: 85px;"><center>Is Active</center></th>
														<th style="width: 85px;"><center>Avl PNRGames</center></th>
														<th style="width: 85px;"><center>Date Added</center></th>
														<th style="width: 85px;"><center>Activated On</center></th>
														<th style="width: 85px;"><center>Renewed On</center></th>
														<th style="width: 70px;"><center>Country Origin</center></th>
														
														<!-- correct button for delete a produt <th style="width: 100px;"><center>Delete Product</center></th>-->
													</tr>
												</thead>
												<tbody>
										
													
														<form action="card.php" method="POST">
														<tr>
														<td><center><input style="width: 40px;" id="product" type="text" name="ValidFrom"disabled value=""></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="ValidTill"disabled value=""></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="AvlCompGames"disabled value=""></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="AvlLearnSessions"disabled value=""></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="AvlAssistSessions"disabled value=""></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="AvlGlobalSessions"disabled value=""></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="AvlTrophyGames"disabled value=""></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="isActive"disabled value=""></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="AvlPNRGames"disabled value=""></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="DateAdded"disabled value=""></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="ActivatedOn"disabled value=""></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="RenewedOn"disabled value=""></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="CountryOrigin"disabled value=""></center></td>
														</tr>
													
													
													
													
												
												</tbody>
											</table>
										</div>
									</form>
							</div>
									<!-- Panels End -->
			</div>










</div> 

<!-- JavaScript Plugins -->
    <script src="js/libs/jquery-1.8.3.min.js"></script>
    <script src="js/libs/jquery.mousewheel.min.js"></script>
    <script src="js/libs/jquery.placeholder.min.js"></script>
    <script src="custom-plugins/fileinput.js"></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script src="jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="jui/jquery-ui.custom.min.js"></script>
    <script src="jui/js/jquery.ui.touch-punch.js"></script>
    <script src="jui/js/timepicker/jquery-ui-timepicker.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="plugins/imgareaselect/jquery.imgareaselect.min.js"></script>
    <script src="plugins/jgrowl/jquery.jgrowl-min.js"></script>
    <script src="plugins/validate/jquery.validate-min.js"></script>
    <script src="plugins/colorpicker/colorpicker-min.js"></script>

    <!-- Core Script -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="js/demo/demo.widget.js"></script>

            <!-- Inner Container End -->
 <?php include 'admin_footer.php';?>