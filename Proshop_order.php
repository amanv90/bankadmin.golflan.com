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
 <div id="mws-container" class="clearfix" >
		<div class="container" style="padding-top: 2%">
            
			<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i> Proshop_Order</span>
                    </div>
                    <div class="mws-panel-body no-padding">
         <table class="mws-datatable mws-table">
                            <?php 
					 //$query = "SELECT * FROM proShopOrderMaster"; 
					 //$result = mysql_query($query); 
					
				?> 
							
							
							
							
							<thead>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Order Date</th>
									<th>Our Price</th>
                                    <th>Voucher Amount</th>
									<th>Final Amount</th>
									<th>Voucher Number</th>
									<th>Payment Status</th>
									<th>Order Status</th>
                                   
                                </tr>
                            </thead>
                    <tbody>
						<?php $getproShopOrderMaster = $admin->getproShopOrderMaster(); 
								foreach ($getproShopOrderMaster as $line) 
								{?>
									<tr>
									<td><a href="javascript:void(0)" onclick="window.location.href='orderdetails.php?orderID=<?php echo $line['orderID']; ?>&ourprice=<?php echo $line['subTotal'];?>&finalamount=<?php echo $line['grandTotal'];?>'"><?php echo $line['orderID'];?></a></td>
									
										<td><center><?php echo $line['orderDate'];?></center></td>
										<td><center>
										
										<?php echo $line['subTotal'];?></center></td>
										<td><center><?php echo $line['discount'];?></center></td>
										<td><center><?php echo $line['grandTotal'];?></center></td>
										<td><center><?php echo $line['voucherNumber'];?></center></td>
										   <?php if($line['paymentStatus']=='0')
											{ $temp="Payment Pending";
											}
											else
											$temp ="Payment Received";
										   ?>
										<td><center><?php echo $temp;?></center></td>
									<td><center><?php $getProShoptrans2 = $admin->getProShoptrans2($line['orderID']); 
												foreach ($getProShoptrans2 as $line){
						
													
													
													
													//echo  $line['shipStatus'];
													if($line['shipStatus']=='0')
													{$temp="Not Dispatch";
													}elseif($line['shipStatus']=='1')
													{
														$temp="In-Process";
													}else
														$temp="Dispatch";
													
													echo  $temp;
												}?> </center>
									</td>
									</tr>
						<?php   }?>
					</tbody>
         </table>
                    </div>
                </div>
               
         </div>
  </div>	
			
			 <!-- Panels End -->
			
			
			
			
			
			
			<?php include 'admin_footer.php';?>