<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>

<title>Connecting Golfer's WorldWide</title>

</head>

<body>

	

	<!-- Header -->
	
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
		<?php
			$active ="ManageCoupons";
			include 'admin_header.php';
			include 'router.php';
			$admin = new Admin(DB1);
		?>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix" style="width:1900px;">
        
        	<!-- Inner Container Start -->
            <div class="container">
            
            	
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i>Proshop Vouchers</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-datatable-fn mws-table">
                            <thead>
                                <tr>
                                    <th>Voucher ID</th>
                                    <th>Voucher Number</th>
									<th>Description</th>
                                    <th>Voucher Type</th>
                                    <th>Amount</th>
                                    <th>LobApplicable</th>
									<th>GID Applicable</th>
									<th>Issue Date</th>
									<th>Expiry Date</th>
									<th>Num Times Allowed</th>
									<th>Num Times Used</th>
									<th>Status</th>
									<th>Edit Coupons</th>
									
                                </tr>
                            </thead>
                            <tbody>
							<?php $getVoucherMaster = $admin->getVoucherMaster(); 
								foreach ($getVoucherMaster as $line) { ?>
                                <tr>
                                    <td><center><?php echo $line['voucherID'];?></center></td>
									<td><center><?php echo $line['VoucherNumber'];?></center></td>
									<td><center><?php echo $line['Description'];?></center></td>
									<td><center><?php echo $line['voucherType'];?></center></td>
									<td><center><?php echo $line['Amount'];?></center></td>
									<td><center><?php echo $line['LobApplicable'];?></center></td>
									<td><center><?php echo $line['GIDApplicable'];?></center></td>
									<td><center><?php echo $line['issuedDate'];?></center></td>
									<td><center><?php echo $line['expiaryDate'];?></center></td>
									<td><center><?php echo $line['numTimesAllowed'];?></center></td>
									<td><center><?php echo $line['numTimesUsed'];?></center></td>
									<td><center><?php echo $line['Status'];?></center></td>
									<td><center><a href="editVoucher.php?voucherID=<?php echo $line['voucherID'];?>"><button class="btn btn-primary">Edit</button></a><!--&nbsp;&nbsp;<a href="ManageCoupons.php?voucherID_del=<?php //echo $line['voucherID']?>&action=Remove"><button class="btn btn-danger">Remove</button></a>--></center></td>
                                </tr> 
								<?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Panels End -->
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
            	Copyright Your Website 2012. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

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
</body>

</html>