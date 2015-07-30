<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="plugins/colorpicker/colorpicker.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/themer.css" media="screen">

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
			$voucherID= $_GET['voucherID'];
		?>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
            
            	
                <!-- Panels Start -->
                
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>Edit Selected Voucher Details</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="editVoucherData.php" method="post">
						<?php $getVoucherMasterVoucherID = $admin->getVoucherMasterVoucherID($voucherID); 
							foreach ($getVoucherMasterVoucherID as $line) 
							{?>
									<div class="mws-form-inline">
										<div class="mws-form-row">
											<label class="mws-form-label">Voucher ID</label>
											<div class="mws-form-item">
												<input type="text" class="small" name="voucherID" value="<?php echo $line['voucherID']; ?>">
											</div>
										</div>
										<div class="mws-form-row">
											<label class="mws-form-label">Voucher Number</label>
											<div class="mws-form-item">
												<input type="text" class="small" name="VoucherNumber" value="<?php echo $line['VoucherNumber']; ?>">
											</div>
										</div>
										<div class="mws-form-row">
											<label class="mws-form-label">Description</label>
											<div class="mws-form-item">
												<input type="text" class="small" name="Description" value="<?php echo $line['Description']; ?>">
											</div>
										</div>
										<div class="mws-form-row">
											<label class="mws-form-label">Voucher Number</label>
											<div class="mws-form-item">
												<input type="text" class="small" name="VoucherNumber" value="<?php echo $line['VoucherNumber']; ?>">
											</div>
										</div>
										<div class="mws-form-row">
											<label class="mws-form-label">Amount</label>
											<div class="mws-form-item">
												<input type="text" class="small" name="Amount" value="<?php echo $line['Amount']; ?>">
											</div>
										</div>
										<div class="mws-form-row">
											<label class="mws-form-label">Lob Applicable</label>
											<div class="mws-form-item">
												<input type="text" class="small" name="LobApplicable" value="<?php echo $line['LobApplicable']; ?>">
											</div>
										</div>
										<div class="mws-form-row">
											<label class="mws-form-label">GID Applicable</label>
											<div class="mws-form-item">
												<input type="text" class="small" name="GIDApplicable" value="<?php echo $line['GIDApplicable']; ?>">
											</div>
										</div>
										<div class="mws-form-row">
											<label class="mws-form-label">Issued Date</label>
											<div class="mws-form-item">
												<input type="text" class="small" name="issuedDate" value="<?php echo $line['issuedDate']; ?>">
											</div>
										</div>
										<div class="mws-form-row">
											<label class="mws-form-label">Expiry Date</label>
											<div class="mws-form-item">
												<input type="text" class="small" name="expiaryDate" value="<?php echo $line['expiaryDate']; ?>">
											</div>
										</div>
										<div class="mws-form-row">
											<label class="mws-form-label">Num Times Allowed</label>
											<div class="mws-form-item">
												<input type="text" class="small" name="numTimesAllowed" value="<?php echo $line['numTimesAllowed']; ?>">
											</div>
										</div>
										<div class="mws-form-row">
											<label class="mws-form-label">Num Times Used</label>
											<div class="mws-form-item">
												<input type="text" class="small" name="numTimesUsed" value="<?php echo $line['numTimesUsed']; ?>">
											</div>
										</div>
										<div class="mws-form-row">
											<label class="mws-form-label">Status</label>
											<div class="mws-form-item">
												<input type="text" class="small" name="Status" value="<?php echo $line['Status']; ?>">
											</div>
										</div>
										<!--<div class="mws-form-row">
											<label class="mws-form-label">Dropdown List</label>
											<div class="mws-form-item">
												<select class="large">
													<option>Option 1</option>
													<option>Option 3</option>
													<option>Option 4</option>
													<option>Option 5</option>
												</select>
											</div>
										</div>
										-->
										
									</div>
															
									<div class="mws-button-row">
										<input type="submit" value="Submit" class="btn btn-danger">
									</div>
					<?php 	}  ?>
                    	</form>
                    </div>    	
                </div>
                
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
            	Copyright Your Website 2012. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
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

    <!-- Plugin Scripts -->
    <script src="plugins/colorpicker/colorpicker-min.js"></script>
    <script src="plugins/validate/jquery.validate-min.js"></script>

    <!-- Core Script -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->

</body>
</html>
