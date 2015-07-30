<?php
session_start();?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->

<link rel="stylesheet" type="text/css" href="css/boostarp-admin.css" media="screen">
	<?php

  include 'router.php';
  $admin = new Admin(DB1);
//    $compBookingsArr = $admin->getComplimentaryBookings();
//    echo "<pre>";
//    print_r($compBookingsArr);
?>
<!-- BEGIN syntax highlighter -->
	<script type="text/javascript" src="sh/shCore.js"></script>
	<script type="text/javascript" src="sh/shBrushJScript.js"></script>
	<link type="text/css" rel="stylesheet" href="sh/shCore.css"/>
	<link type="text/css" rel="stylesheet" href="sh/shThemeDefault.css"/>
	
	<!-- END syntax highlighter -->

<?php
    $active ="ManageCategories";
    include 'admin_header.php';
?>

 <div id="mws-container" class="clearfix" style="width:2020px;">
	<div class="container" style="padding-top: 2%">
	
	<div class="mws-panel grid_8">
		<form class="form-horizontal" action="orderdata.php?orderID=<?php echo $_GET['orderID'];?>" method="post">	
				<div class="mws-panel-header">
				<span><i class="icon-table"></i> Proshop_Order</span>
				</div>
			<div class="mws-panel-body no-padding">
					<div class="mws-panel-body no-padding">
							<table class="mws-datatable mws-table">
												<?php 
													//$query = "SELECT * FROM proShopTrans where orderID = ".$_GET['orderID'].""; 
													//$result = mysql_query($query); 
													//$query1 = "SELECT * FROM proShopTrans"; 
													//$result1 = mysql_query($query1); 
													
													
													?> 
														<thead>
																<tr>
																	<th><center>Order Number</center></th>
																	<th><center>Customer Details</center></th>
																	<th><center>Product Name</center></th>
																	<th><center>Quantity</center></th>
																	<th><center>Price Per Item</center></th>
																	<th><center>Our Price</center></th>
																	<th><center>Final Amount</center></th>
																	<th><center>Ship Date</center></th>
																	<th><center>Order Status</center></th>
																</tr>
														</thead>
											<tbody>
												  
								<tr>
														<td><center><?php echo $_GET['orderID'];?></center></td>
														<td style="width: 100px;"><center>
														<?php 	  $getproShopTransOrderID = $admin->getproShopTransOrderID($_GET['orderID']); 
														foreach ($getproShopTransOrderID as $line) 
														{
																$getpaynplay_support_2 = $admin->getpaynplay_support_2($line['USER_ID']); 
																foreach ($getpaynplay_support_2 as $line) 
																{
																			//echo $line['Login_Name'];
																			?>
																			
																	<p align="left">Name-<?php echo $line['Login_Name']; ?></p>
																	<p align="left">Email- <?php echo $line['Email'];?></p>
																	<p align="left">Mobile-<?php echo $line['Mobile'] ?> </p>
																	<p align="left">Address-<?php echo $line['Address'];  echo ",".$line['City']; echo ",".$line['State']; echo ",".$line['Country']; echo ",".$line['ZipCode']; ?> </p>
																		<?php
																}
															}
															
											?>
										
														
														
														
														</center>
													</td>
													 <td><?php 	 
															$getproShopTransOrderID = $admin->getproShopTransOrderID($_GET['orderID']); 
															foreach ($getproShopTransOrderID as $line) 
															{
																//echo $line['prodID'];
																echo "</br>";
																$getProShopMaster1 = $admin->getProShopMaster1($line['prodID']); 
																foreach ($getProShopMaster1 as $line) 
																{
																	echo $line['Title'];
																	echo "</br>";
																	
																}
															}
															?>
														</td>
														
														<td><center><?php $getproShopTransOrderID = $admin->getproShopTransOrderID($_GET['orderID']); 
																		foreach ($getproShopTransOrderID as $line) 
																		{
																			echo $line['Quantity'];
																			echo "</br>";
																	
																		}
																		?></center></td>
													<td><center><?php 
																	$getproShopTransOrderID = $admin->getproShopTransOrderID($_GET['orderID']); 
																	foreach ($getproShopTransOrderID as $line) 
																	{
																			echo $line['pricePerItem'];
																			echo "</br>";
																	
																		}
																?>
													</center></td>	
													<td><center><?php echo $_GET['ourprice'];?></center></td>
													<td><center><?php  echo $_GET['finalamount']; ?></center></td>
									<!--	<td><center>	
													<?php 	 
															$getproShopTransOrderID = $admin->getproShopTransOrderID($_GET['orderID']); 
															foreach ($getproShopTransOrderID as $line) 
															{
																//echo $line['USER_ID'];$line['priceMapID']
																$getProShopAttributePriceMapByPriceMapID = $admin->getProShopAttributePriceMapByPriceMapID($line['priceMapID']); 
																foreach ($getProShopAttributePriceMapByPriceMapID as $line) 
																{
																echo $line['Description1'];
																echo "-".$line['Description2'];
																echo "-".$line['Description3'];
																echo "-".$line['Description4'];
																?>
															
															<?php
																}
															}
											?>
											</center>
										</td>-->	
												        <td>
														    <center>
																<div class="mws-form-row">
																	<div class="mws-form-item">
																		<input type="text" class="mws-datepicker large" size="9" name="shipDate" readonly="readonly">
																	</div>
																</div>
															</center>
														</td>	
																<td><center>
																		<select name="shipStatus" required>
																							  <option value="" required>--Status--</option>
																							  <option value="0" >Not Dispatch</option>
																							  <option value="1">In Process</option>
																							  <option value="2">Dispatch</option>
																		</select>
																				
																	</center>
																</td>			
								</tr>
												  
												  
											</tbody>
							 </table>	
 						 
					</div>
				</div>
					<div align="right"><button class="btn btn-primary" >Submit</button></div>	 
			</form>					
		</div>
		 
	</div>	
	
										
</div>



	<?php include 'admin_footer.php';?>
