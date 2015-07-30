<?php
session_start();
include 'router.php';
$admin = new Admin(DB1);
$Login_Name= mysql_real_escape_string(filter_var(trim($_POST['Login_Name']), FILTER_SANITIZE_STRING));
$_SESSION['Login_NAME']=$Login_Name;
$FName= mysql_real_escape_string(filter_var(trim($_POST['FName']), FILTER_SANITIZE_STRING));
$_SESSION['F_NAME']=$FName;
$LName= mysql_real_escape_string(filter_var(trim($_POST['LName']), FILTER_SANITIZE_STRING));
$_SESSION['L_NAME']=$LName;
$Email= mysql_real_escape_string(filter_var(trim($_POST['Email']), FILTER_SANITIZE_STRING));
$_SESSION['Email']=$Email;
$Mobile= mysql_real_escape_string(filter_var(trim($_POST['Mobile']), FILTER_SANITIZE_STRING));
$_SESSION['Mobile']=$Mobile;
$City= mysql_real_escape_string(filter_var(trim($_POST['City']), FILTER_SANITIZE_STRING));
$_SESSION['City']=$City;
$State= mysql_real_escape_string(filter_var(trim($_POST['State']), FILTER_SANITIZE_STRING));
$_SESSION['State']=$State;
$ZipCode= mysql_real_escape_string(filter_var(trim($_POST['ZipCode']), FILTER_SANITIZE_STRING));
$_SESSION['ZipCode']=$ZipCode;
$Country= mysql_real_escape_string(filter_var(trim($_POST['Country']), FILTER_SANITIZE_STRING));
$_SESSION['Country']=$Country;
$Address= mysql_real_escape_string(filter_var(trim($_POST['Address']), FILTER_SANITIZE_STRING));
$_SESSION['Address']=$Address;
$Gender= mysql_real_escape_string(filter_var(trim($_POST['Gender']), FILTER_SANITIZE_STRING));
$_SESSION['Gender']=$Gender;
$CardTypeID= mysql_real_escape_string(filter_var(trim($_POST['CardTypeID']), FILTER_SANITIZE_STRING));
$_SESSION['CardTypeID']=$CardTypeID;
$CardNo= mysql_real_escape_string(filter_var(trim($_POST['CardNo']), FILTER_SANITIZE_STRING));
$_SESSION['CardNo']=$CardNo;
$Password= mysql_real_escape_string(filter_var(trim($_POST['Password']), FILTER_SANITIZE_STRING));
$_SESSION['Password']=$Password;
$PasswordHash=MD5($Password);
$DOB= mysql_real_escape_string(filter_var(trim($_POST['DOB']), FILTER_SANITIZE_STRING));
$D_O_B = mysql_real_escape_string($DOB);
$D_O_B = date('Y-m-d', strtotime($D_O_B));
//mysql_query("INSERT INTO `webUserMaster` (Login_Name,FName,LName,Email,Mobile,City,State,ZipCode,Country,Address,Gender,CardTypeID,CardNo,Password,DOB) VALUES ('".$Login_Name."','".$FName."','".$LName."','".$Email."','".$Mobile."','".$City."','".$State."','".$ZipCode."','".$Country."','".$Address."','".$Gender."','".$CardTypeID."','".$CardNo."','".$Password."','".$D_O_B."') ");
$setWebUserMaster = $admin->setWebUserMaster($Login_Name,$FName,$LName,$Email,$Mobile,$City,$State,$ZipCode,$Country,$Address,$Gender,$CardTypeID,$CardNo,$PasswordHash,$Password,$D_O_B);

//echo $Login_Name;



/*$string= "SELECT User_ID FROM webUserMaster WHERE Email LIKE '".$Email."'";
    $query = mysql_query($string) or die(mysql_error());
    while($row = mysql_fetch_assoc($query))
	{
		
		$_SESSION["user"] = $row['User_ID'] ;
		//echo $_SESSION["user"];
		
	
	}*/	
	 $getWebUserMasterEmail = $admin->getWebUserMasterEmail($Email); 
	foreach ($getWebUserMasterEmail as $line) 
	{
		
		$_SESSION["user"] = $line['User_ID'] ;
		//echo $_SESSION["user"];
	}

//header('Location: ' . $_SERVER['HTTP_REFERER']);


?>

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
    //  include 'router.php';
//	$admin = new Admin(DB1);
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
												<form action="#" method="POST">
													 <?php 
											 
											// $string= "SELECT User_ID FROM webUserMaster WHERE Email LIKE '".$_SESSION['Email']."' LIMIT 1";
											 $getWebUserMasterEmail = $admin->getWebUserMasterEmail($Email); 
											foreach ($getWebUserMasterEmail as $line) 	{
									
													$User= $line['User_ID'];
													//echo $User;
												?>
												
														<tr>
														<!--<td><?php //echo $value['BookID'];?></td>-->
														<!--<td><center><?php //echo $line['prodID'];?></center></td>-->
														<td><center><input style="width: 45px;" id="product" type="text" name="Login_Name" disabled  value="<?php echo $_SESSION['Login_NAME'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="FName"disabled value="<?php echo$_SESSION['F_NAME'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="LName"disabled value="<?php echo $_SESSION['L_NAME'];?>"></center></td>
														<td><center><input style="width: 80px;" id="product" type="text" name="Email"disabled value="<?php echo $_SESSION['Email'];?>"></center></td>
														<td><center><input style="width: 110px;" id="product" type="text" name="Mobile"disabled value="<?php echo $_SESSION['Mobile'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="City"disabled value="<?php echo $_SESSION['City'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="State"disabled value="<?php echo $_SESSION['State'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="ZipCode"disabled value="<?php echo $_SESSION['ZipCode'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="Country"disabled value="<?php echo $_SESSION['Country'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="Address"disabled value="<?php echo $_SESSION['Address'];?>"></center></td>
													<td><center><select name="Gender" disabled  style="width: 50px;">
															<option  value="Male">Male</option>
														    <option value="Female">Female</option>
														</select></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="CardTypeID"disabled value="<?php echo $_SESSION['CardTypeID'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="CardNo"disabled value="<?php echo $_SESSION['CardNo'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="Password"disabled value="<?php echo $_SESSION['Password'];?>"></center></td>
														<td><center><input style="width: 45px;" id="product" type="text" name="DOB"disabled value="<?php echo $_SESSION['DOB'];?>"></center></td>
														
														
														<!--<td><center><input value="Remove" class="btn btn-danger" type="button" onclick="window.location = 'delete_product.php?prodID=<?php echo $line['prodID'];?>&action=Remove';"></center></td>-->
														</tr>
											 <?php 
												}
												?>
												</tbody>
											</table>
										</div>
											<button class="btn btn-primary" disabled>Add </button>
										</form>
							</div>
							</div>
							</div>
									<!-- Panels End -->
		<div id="mws-container" class="clearfix" style="width:1630px;">

								
		<div class="container" style="padding-top: 2%">
								
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
										
													
									<form action="carddata.php" method="POST">
														<tr>
														<td><center><div class="mws-form-row">
													<div class="mws-form-item">
														<input type="text" class="mws-datepicker large" name="ValidFrom" readonly="readonly">
													</div>
												</div></center></td>
														<td><center><div class="mws-form-row">
													<div class="mws-form-item">
														<input type="text" class="mws-datepicker large" name="ValidTill" readonly="readonly">
													</div>
												</div></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="AvlCompGames" value=""></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="AvlLearnSessions" value=""></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="AvlAssistSessions" value=""></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="AvlGlobalSessions" value=""></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="AvlTrophyGames" value=""></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="isActive" value=""></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="AvlPNRGames" value=""></center></td>
														<td><center><div class="mws-form-row">
													<div class="mws-form-item">
														<input type="text" class="mws-datepicker large" name="DateAdded" readonly="readonly">
													</div>
												</div></center></td>
														<td><center><div class="mws-form-row">
													<div class="mws-form-item">
														<input type="text" class="mws-datepicker large" name="ActivatedOn" readonly="readonly">
													</div>
												</div></center></td>
														<td><center><div class="mws-form-row">
													<div class="mws-form-item">
														<input type="text" class="mws-datepicker large" name="RenewedOn" readonly="readonly">
													</div>
												</div></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="CountryOrigin" value=""></center></td>
														</tr>
													
													
													
													
												
												</tbody>
											</table>
										</div>
										<button class="btn btn-primary">Add </button>
									</form>
							</div>
									<!-- Panels End -->
			</div>
		</div>













            <!-- Inner Container End -->
 <?php include 'admin_footer.php';?>