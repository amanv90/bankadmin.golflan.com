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

        <!-- Main Container Start -->
<div id="mws-container" class="clearfix" style="width:1630px;">

    <!---              first form      ----------- -->
        <div class="container" style="padding-top: 2%">

            <div class="mws-panel mws-panel-margin-bot  grid_8">
					<div class="mws-panel-header">
                    	<span><i class="icon-table"></i>Manage cards</span>
                    </div>
					<div class="mws-panel-body no-padding">
                        <table class="mws-datatable mws-table">

                            <div class="bs-example-back-color1 col-lg-12 padding-off " data-example-id="condensed-table">

								<div class="bs-example" data-example-id="simple-horizontal-form">
									
					<!--------     add sub category                 -->
									<form action="link_card_data.php" class="form-horizontal" method="post">
										 </br>
										 <label for="inputEmail3" class="col-sm-2 control-label">Select Product Title:</label>&nbsp;&nbsp;&nbsp;
										 <select name="select1"> <option value="">Select</option>
											<?php $getWebUserMaster = $admin->getWebUserMaster(); 
												foreach ($getWebUserMaster as $line) {  ?> 
											<option value="<?php echo $line['Email'];?>"> <?php echo $line['Email'];?> </option>   <?php } ?> 
										</select>
									
										
										  <input type="submit" name="submit" class="btn btn-success" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										  
									</form>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<form action="link_card_data.php" class="form-horizontal" method="post">
										 </br>
										 <label for="inputEmail3" class="col-sm-2 control-label">Select Card No:</label>&nbsp;&nbsp;&nbsp;
										 <select name="select2" style="width: 275px;"> <option value="">Select</option>
											<?php $getWebUserMaster = $admin->getWebUserMaster(); 
												foreach ($getWebUserMaster as $line) {  ?> 
											<option value="<?php echo $line['CardNo'];?>"> <?php echo $line['CardNo'];?> </option>   <?php } ?> 
										</select>
									
										
										  <input type="submit" name="submit" class="btn btn-success" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										  
									</form><!--<a href="addproducts.php"><button class="btn btn-danger">Add New Product</button></a>-->
					<!--------     add sub category                 -->
										
								</div>
								 
							<?php //echo $_SESSION["temp_user_id"]; ?>

							</div>


                        </table>
                    </div>

            </div>
		</div>
		
		<!---              first form      ----------- -->
		<!---              second form      ----------- -->
		<div class="container" style="padding-top: 2%">
								
								<div class="mws-panel grid_8">
										<div class="mws-panel-header">
											<span><i class="icon-table"></i>Edit Card Owner's Detail</span>
										</div>
										<?php 
											 $temp_user_id=$_SESSION["temp_user_id"];
											 //$query ="SELECT * FROM proshopmaster WHERE prodID LIKE '".$temp_prodID."'";
											// $result = mysql_query($query); 
											 
										 ?> 
										<div class="mws-panel-body no-padding">
											<table class="mws-datatable mws-table">
												<thead>
													<tr>
														<!--<th>#</th>-->
														<th style="width: 60px;"><center>User ID</center></th>
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
														<th style="width: 100px;"><center>Edit</center></th>
														<!--<th style="width: 100px;"><center>Delete Product</center></th>-->
													</tr>
												</thead>
												<tbody>
												<form action="Update_Link_Card.php" method="POST">
													<?php $getWebUserMasterByUserID = $admin->getWebUserMasterByUserID($temp_user_id); 
													foreach ($getWebUserMasterByUserID as $line) {?>
														<tr>
														<!--<td><?php //echo $value['BookID'];?></td>-->
														<!--<td><center><?php //echo $line['prodID'];?></center></td>-->
														<td><center><input style="width: 25px;" id="product" type="text" name="UserID" value="<?php echo $line['User_ID']; ?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="LoginName" value="<?php echo $line['Login_Name'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="FirstName" value="<?php echo $line['Fname'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="LastName" value="<?php echo $line['Lname'];?>"></center></td>
														<td><center><input style="width: 80px;" id="product" type="text" name="Email" value="<?php echo $line['Email'];?>"></center></td>
														<td><center><input style="width: 110px;" id="product" type="text" name="Mobile" value="<?php echo $line['Mobile'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="City" value="<?php echo $line['City'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="State" value="<?php echo $line['State'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="ZipCode" value="<?php echo $line['ZipCode'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="Country" value="<?php echo $line['Country'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="Address" value="<?php echo $line['Address'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="Gender" value="<?php echo $line['Gender'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="CardType" value="<?php echo $line['CardTypeID'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="CardNo" value="<?php echo $line['CardNo'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="Password" value="<?php echo $line['Password'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="DOB" value="<?php echo $line['DOB'];?>"></center></td>
														
														<input id="id" type="text" name="id" value="<?php $line['User_ID']; ?>" style="display:none;">
														<td><center><input class="btn btn-primary" type="submit" name="submit" value="Update"> </center></td>
														<!--<td><center><input value="Remove" class="btn btn-danger" type="button" onclick="window.location = 'delete_product.php?prodID=<?php echo $line['prodID'];?>&action=Remove';"></center></td>-->
														</tr>
													<?php }?>
												</form>
												</tbody>
											</table>
										</div>
							</div>
									<!-- Panels End -->
			</div>
		
		
		
		<!---              second form      ----------- -->
		
		<!---              Third form      ----------- -->
			
			<div class="container" style="padding-top: 2%">
								
							<div class="mws-panel grid_8">
										<div class="mws-panel-header">
											<span><i class="icon-table"></i>Edit User's Card Detail</span>
										</div>
										<div class="mws-panel-body no-padding">
											<table class="mws-datatable mws-table">
												<thead>
													<tr>
														<!--<th>#</th>-->
														<th style="width: 70px;"><center>User ID</center></th>
														<th style="width: 70px;"><center>Card Type ID</center></th>
														<th style="width: 70px;"><center>Card No</center></th>
														<th style="width: 110px;"><center>Valid From</center></th>
														<th style="width: 110px;"><center>Valid Till</center></th>
														<th style="width: 75px;"><center>Avl Comp Games</center></th>
														<th style="width: 85px;"><center>Avl Learn Sessions</center></th>
														<th style="width: 75px;"><center>Avl Assist Sessions</center></th>
														<th style="width: 85px;"><center>Avl Global Sessions</center></th>
														<th style="width: 75px;"><center>Avl Trophy Games</center></th>
														<th style="width: 85px;"><center>Is Active</center></th>
														<th style="width: 110px;"><center>Date Added</center></th>
														<th style="width: 110px;"><center>Activated On</center></th>
														<th style="width: 110px;"><center>Renewed On</center></th>
														<th style="width: 90px;"><center>Country Origin</center></th>
														<th style="width: 100px;"><center>Edit Subcategories</center></th>
														<!-- correct button for delete a produt <th style="width: 100px;"><center>Delete Product</center></th>-->
													</tr>
												</thead>
												<tbody><?php //$i=0; ?>
												<form action="Update_Link_Card.php" method="post">
													<?php $i=0;
													//echo $temp_user_id;
													$getWebCardByUserID = $admin->getWebCardByUserID($temp_user_id); 
													foreach ($getWebCardByUserID as $line[$i]) 
													{
														
														?>
														<tr>
														<!--<td><?php //echo $value['BookID'];?></td>-->
														<!--<td><center><?php //echo $line['prodID'];?></center></td>-->
														<td><center><input style="width: 40px;" id="product" type="text" name="User_ID[]" value="<?php echo $line[$i]['User_ID']; ?>"></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="CardTypeID[]" value="<?php echo $line[$i]['CardTypeID']; ?>"></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="CardNo[]" value="<?php echo $line[$i]['CardNo']; ?>"></center></td>
														<td>
														    <center>
																<div class="mws-form-row">
																	<div class="mws-form-item">
																		<input style="width: 80px;" type="text" class="mws-datepicker large" size="9" name="ValidFrom[]" value="<?php echo $line[$i]['ValidFrom'];?>" readonly="readonly">
																	</div>
																</div>
															</center>
														</td>	
														<!--<td><center><input style="width: 40px;" id="product" type="text" name="ValidFrom[]" value="<?php //echo $line[$i]['ValidFrom'];?>"></center></td>-->
														<td>
														    <center>
																<div class="mws-form-row">
																	<div class="mws-form-item">
																		<input style="width: 80px;" type="text" class="mws-datepicker large" size="9" name="ValidTill[]" value="<?php echo $line[$i]['ValidTill'];?>" readonly="readonly">
																	</div>
																</div>
															</center>
														</td>	
														<!--<td><center><input style="width: 60px;" id="product" type="text" name="ValidTill[]" value="<?php //echo $line[$i]['ValidTill'];?>"></center></td>-->
														<td><center><input style="width: 40px;" id="product" type="text" name="AvlCompGames[]" value="<?php echo $line[$i]['AvlCompGames'];?>"></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="AvlLearnSessions[]" value="<?php echo $line[$i]['AvlLearnSessions'];?>"></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="AvlAssistSessions[]" value="<?php echo $line[$i]['AvlAssistSessions'];?>"></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="AvlGlobalSessions[]" value="<?php echo $line[$i]['AvlGlobalSessions'];?>"></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="AvlTrophyGames[]" value="<?php echo $line[$i]['AvlTrophyGames'];?>"></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="isActive[]" value="<?php echo $line[$i]['isActive'];?>"></center></td>
														<td>
														    <center>
																<div class="mws-form-row">
																	<div class="mws-form-item">
																		<input style="width: 80px;" type="text" class="mws-datepicker large" size="9" name="DateAdded[]" value="<?php echo $line[$i]['DateAdded'];?>" readonly="readonly">
																	</div>
																</div>
															</center>
														</td>
														<!--<td><center><input style="width: 60px;" id="product" type="text" name="DateAdded[]" value="<?php //echo $line[$i]['DateAdded'];?>"></center></td>-->
														<td>
														    <center>
																<div class="mws-form-row">
																	<div class="mws-form-item">
																		<input style="width: 80px;" type="text" class="mws-datepicker large" size="9" name="ActivatedOn[]" value="<?php echo $line[$i]['ActivatedOn'];?>" readonly="readonly">
																	</div>
																</div>
															</center>
														</td>
														<!--<td><center><input style="width: 60px;" id="product" type="text" name="ActivatedOn[]" value="<?php //echo $line[$i]['ActivatedOn'];?>"></center></td>-->
														<td>
														    <center>
																<div class="mws-form-row">
																	<div class="mws-form-item">
																		<input style="width: 80px;" type="text" class="mws-datepicker large" size="9" name="RenewedOn[]" value="<?php echo $line[$i]['RenewedOn'];?>" readonly="readonly">
																	</div>
																</div>
															</center>
														</td>
														<!--<td><center><input style="width: 40px;" id="product" type="text" name="RenewedOn[]" value="<?php //echo $line[$i]['RenewedOn'];?>"></center></td>-->
														<td><center><input style="width: 60px;" id="product" type="text" name="CountryOrigin[]" value="<?php echo $line[$i]['CountryOrigin'];?>"></center></td>
														<input id="id" type="text" name="id" value="<?php $line['User_ID']; ?>" style="display:none;">
														<?php //$arr[$i]= $line['priceMapID'];?>
														<td><center><input class="btn btn-primary" type="submit" name="update[<?php echo $line['Used_ID'];?>]" value="Update"> </center></td>														
														</tr>
													<?php  //$i++;
													}?>
												</form>
												</tbody>
											</table>
										</div>
							</div>
									<!-- Panels End -->
			</div>
	<!---              Third form      ----------- -->
	
	
	
                <!-- Panels End -->
</div>
		

            <!-- Inner Container End -->
 <?php include 'admin_footer.php';?>

