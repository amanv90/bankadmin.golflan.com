<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->

<?php
    //$temp=11;
    include 'router.php';
	//include '/includes/temp.php';
	$admin = new Admin(DB1);
    $paidBookingsArr = $admin->getPayNPlayBookings();
	//$getpaynplay_support = $admin->getpaynplay_support($);
	//$get_golfcourse = $admin->getBookingDetailsByID($temp);
	//foreach ($get_golfcourse as $key => $value) { if($key=="GCName"){ echo $value; } }
//    echo "<pre>";
//    print_r($compBookingsArr);
?>
<?php 
    $active ="paynpaly";
    include 'admin_header.php';
?>
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix" style="width:1630px;">
        
        	<!-- Inner Container Start -->
            <div class="container" style="padding-top: 2%">
            
           <div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i> Pay N Play Bookings</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-datatable mws-table">
                            <thead>
                                <tr>
                                    <th>Book ID</th>
                                    <th>USER ID</th>
                                    <th>Request Date</th>
                                    <th>Date of Play</th>
                                    <th>Slot of Play</th>
                                    <th>Booking status</th>
                                    <th>Pay status</th>
									<th>Golf Course Name</th>
									<th>Customer Name</th>
									<th>Email ID</th>
									<th>Card Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($paidBookingsArr as $value) {?>
                                    <tr>
                                    <td><?php echo $value['BookID'];?></td>
                                    <td><?php echo $value['USER_ID'];?></td>
                                    <td><?php echo $value['dateRequest'];?></td>
                                    <td><?php echo $value['dateOfPlay'];?></td>
                                    <td><?php echo $value['slotOfPlay'];?></td>
                                    <td><?php echo $value['bookingStatus'];?></td>
                                    <td><?php echo $value['payStatus'];?></td>
									<td><?php 	
												$getpaynplay_support_1 = $admin->getpaynplay_support_1($value['GID']); 
												foreach ($getpaynplay_support_1 as $line)
												{
													echo $line['GCName'];
												}
									?></td>
									<td><?php 	
												$getpaynplay_support_2 = $admin->getpaynplay_support_2($value['USER_ID']); 
												foreach ($getpaynplay_support_2 as $line)
												{
													echo $line['Login_Name'];
												}
									?></td>
									<td><?php 	
												$getpaynplay_support_2 = $admin->getpaynplay_support_2($value['USER_ID']); 
												foreach ($getpaynplay_support_2 as $line) 
												{
													echo $line['Email'];
													$cardtype_id=$line['CardTypeID'];
												}
									?></td>
									<td><?php 	 
												$getpaynplay_support_3 = $admin->getpaynplay_support_3($cardtype_id); 
												foreach ($getpaynplay_support_3 as $line) 
												{
													echo $line['CardName'];
												}
									?></td>
                                    </tr>
                                <?php }?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Panels End -->
            </div>
            <!-- Inner Container End -->
    <!-- Core Script -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/core/mws.js"></script>
	   <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/core/mws.js"></script>
		</body>
		   <script src="js/libs/jquery-1.8.3.min.js"></script>
    <script src="js/libs/jquery.mousewheel.min.js"></script>
    <script src="js/libs/jquery.placeholder.min.js"></script>
    <script src="custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="jui/jquery-ui.custom.min.js"></script>
    <script src="jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/colorpicker/colorpicker-min.js"></script>

    <!-- Core Script -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="js/demo/demo.table.js"></script>  	                 
<?php include 'admin_footer.php';?>