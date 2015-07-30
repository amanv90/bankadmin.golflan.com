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

        <!-- Main Container Start -->
    <div id="mws-container" class="clearfix">


        	<!-- Inner Container Start -->
        <div class="container" style="padding-top: 2%">

            <div class="mws-panel mws-panel-margin-bot  grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i>Proshop</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-datatable mws-table">

                            <div class="bs-example-back-color1 col-lg-12 padding-off " data-example-id="condensed-table">

									<div class="bs-example" data-example-id="simple-horizontal-form">
									<form class="form-horizontal" action="voucher.php" method="post">
										 <div class="col-sm-2  col-sm-offset-50 h4-padding-bot"><h5><strong>ADD Voucher</strong></h5></div>

										 <div class="clearfix"></div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label ">Voucher Number :</label>
											<div class="col-sm-2 ">	
											  
											  <input id="firstPlayerName" name="VoucherNumber"  placeholder="Voucher_Number" required="required" type='text' value=""/>
											</div>
										 
									<div class="bs-example" data-example-id="simple-horizontal-form">
									
										 
										 <label for="inputEmail3" class="col-sm-2 control-label ">Description:</label>&nbsp;&nbsp;&nbsp;
										<input id="firstPlayerName" name="Description"  placeholder="" type='text' value=""/>
									</div>
										 
									<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label ">Amount:</label>
											<div class="col-sm-2 ">
											   <input id="firstPlayerName" name="Amount"  placeholder="" type='text'  value=""/>
											
											</div>
											
									</div>																	 							 
										 						  
									<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label ">Voucher Type:</label>
											<select name="voucherType">
														<option value="">Select</option>
													  <option value="0">CashOff</option>
													  <option value="1">PercentageOff</option>
													 
											</select>
											
									</div>	
									<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label ">Voucher Applicable:</label>
											<select name="LobApplicable">
														<option value="">Select</option>
													  <option value="0">All</option>
													  <option value="1">MMG</option>
													  <option value="2">Proshop</option>
											</select>
											
									</div>
									<div class="bs-example" data-example-id="simple-horizontal-form">
									
										 
										 <label for="inputEmail3" class="col-sm-2 control-label ">GID Applicable:</label>&nbsp;&nbsp;&nbsp;
										<input id="firstPlayerName" name="GIDApplicable"  placeholder="" type='text' value=""/>
									</div>
									<div class="bs-example" data-example-id="simple-horizontal-form">
									
										 
										 <label for="inputEmail3" class="col-sm-2 control-label ">Times Allowed:</label>&nbsp;&nbsp;&nbsp;
										<input id="firstPlayerName" name="numTimesAllowed"  placeholder="" type='text' value=""/>
									</div>
											 <div class="form-group">
													<label for="inputEmail3" class="col-sm-2 control-label "> Issued Date :</label>
													<div class="mws-form-item">
																<input type="text" class="mws-datepicker large" name="issuedDate" readonly="readonly">
															</div>
													
											</div>
										<div class="form-group">
												<label for="inputEmail3" class="col-sm-2 control-label "> Expiry Date :</label>
												<div class="mws-form-item">
															<input type="text" class="mws-datepicker large" name="expiryDate" readonly="readonly">
												</div>
										</div>
											
									<div class="col-sm-offset-0 col-sm-12 bottom-button" align="right">
										<button class="btn btn-primary">Add Voucher</button>
									</div>
									</div>
									</form>
								</div>
							</div>
	
                <!-- Panels End -->
					</div>
		
			</div>	
		  </div>
		</div>
            <!-- Inner Container End -->
	

	
