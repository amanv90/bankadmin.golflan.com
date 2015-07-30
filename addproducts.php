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
									<form class="form-horizontal" action="Productinfo.php" method="post">
										 <div class="col-sm-2  col-sm-offset-50 h4-padding-bot"><h5><strong>ADD Product</strong></h5></div>

										 <div class="clearfix"></div>
										 <div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label ">Products :</label>
											<div class="col-sm-2 ">	
											  
											  <input id="firstPlayerName" name="Title"  placeholder="Product_Name" type='text' required="required" value=""/>
											</div>
										 
									<div class="bs-example" data-example-id="simple-horizontal-form">
									
										 
										 <label for="inputEmail3" class="col-sm-2 control-label ">Select Category :</label>&nbsp;&nbsp;&nbsp;
										 <?php 
											// setProShopCategoryMaster
											// $query = "SELECT * FROM proshopcatgorymaster"; 
											// $result = mysql_query($query); ?>
										  
											<select name="select1" required> <option value="" >--Choose Category--</option>
											<?php $setProShopCategoryMaster = $admin->setProShopCategoryMaster(); 
												foreach ($setProShopCategoryMaster as $line) {  ?> 
											
											<option value="<?php echo $line['catID'];?>"> <?php echo $line['Description'];?> </option>   <?php } ?> 
										</select>
										 
				  </div>
										 
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label ">Brand :</label>
											<div class="col-sm-2 ">
											   <input id="firstPlayerName" name="brandName"  placeholder="" type='text' required class="form-control validate[required] player_name" value=""/>
											
											</div>
											
										</div>																	 							 
										 						  
											
								</div>
								
										 <div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label "> Description :</label>
											<div class="col-sm-5" "row-sm-10">
											
											 
											   <input id="firstPlayerName" name="Description"  placeholder="" type='text' required class="form-control validate[required] player_name" value=""/>
									</div>
											
										  </div>
										   <div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label "> Feature Ranking :</label>
											<div class="col-sm-2" >
											
											 
											   <input id="firstPlayerName" name="FeatureRanking"  placeholder="" type='text' required class="form-control validate[required] player_name" value=""/>
									</div>
											
										  </div>
										    
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-1 control-label ">Active :</label>
											<input type="checkbox" class="col-sm-2 control-label " name="isActive" value="1"></input>
											</div>	
									<div class="col-sm-offset-0 col-sm-12 bottom-button" align="right">
											<!--<button type="button" class="btn btn-default" onclick="submitAddcard();">Save</button>-->
											<!--<center><input id="submit-button" type="submit" /></center>-->
											
											<button class="btn btn-primary">Add Product</button>
									</div>
									</div>
									</form>

<form action="Productinfo.php" method = "post"> 
		<section>
		<div id="featured-golf-section">
				<div class="container" id="FourballSection" align="center">
				<div id='' align="center">
				
				
						
						<div class="col-sm-12 lr-padding-0">
                                        <span id="error_msg" style="color: red;display: none"></span>
						</div>
						
						
					</div></div>
										
                        </div></div>
				</section>	
			</center>
		
	</form>
							</div>


                        </table>
                    </div></br>
				

            </div>
		
  </div>
  
  
  
	<div class="container" style="padding-top: 2%">

            <div class="mws-panel mws-panel-margin-bot  grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i>Proshop</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-datatable mws-table">
		<div class="col-sm-2  col-sm-offset-50 h4-padding-bot"><h5><strong>ADD NEW Attribute</strong></h5></div></br></br></br>
		





		
		
                            <div class="bs-example-back-color1 col-lg-12 padding-off " data-example-id="condensed-table">

									<div class="bs-example" data-example-id="simple-horizontal-form">
		<form class="form-horizontal" action="proddata.php" method="post">
										

									<div class="bs-example" data-example-id="simple-horizontal-form">
									
										  <?php 
											 $getProShopMasterTitle = $admin->getProShopMasterTitle($_SESSION['TITLE_NAME']); 
												foreach ($getProShopMasterTitle as $line) 
												{
													$PROD_ID= $line['prodID'];
													
													?><center><?php echo "<b>Recently Added Product-</b>".$_SESSION['TITLE_NAME'];"";?></center>
														<?php											
												}
												?>
												</br>	</br>
											</br>
										
										
						
										 <div class="col-sm-2 ">
											<label for="inputEmail3" class="col-sm-2 control-label ">List Price</label>
											<div class="col-sm-2 ">
											   <input id="firstPlayerName" name="listPrice" style="width: 65px;" placeholder="" type='text' required class="form-control validate[required] player_name" value=""/>
											</div>
										  </div>
								 <div class="col-sm-2 ">
											<label for="inputEmail3" class="col-sm-2 control-label ">Our Price</label>
											<div class="col-sm-2 ">
											   <input id="firstPlayerName" name="ourPrice" style="width: 65px;" placeholder="" type='text' required class="form-control validate[required] player_name" value=""/>
											</div>
										  </div>
										  
										 <form>
										  <div class="col-sm-2 ">
											<label for="inputEmail3" class="col-sm-2 control-label " >Stock</label>
											<div class="col-sm-2 ">
											   <input id="firstPlayerName" name="stockOnHand" style="width: 65px;" placeholder="" type='text' required class="form-control validate[required] player_name" value=""/>
											</div>
										  </div>
										   <div class="col-sm-2 ">
											<label for="inputEmail3" class="col-sm-2 control-label " >Deal ID</label>
											<div class="col-sm-2 ">
											   <input id="firstPlayerName" name="dealID" style="width: 65px;" placeholder="" type='text' required class="form-control validate[required] player_name" value=""/>
											</div>
										  </div>
										
										 </br> </br> </br>
										<div class="form-group">
											<div class="col-sm-2 ">	
										
										 <select name="select1" style="width: 70px;"> <option value="">Select</option>
											<?php $setProShopAttributes = $admin->setProShopAttributes(); 
											foreach ($setProShopAttributes as $line) 
											{?> 
											<option value="<?php echo $line['attributeID'];?>"> <?php echo $line['Description'];?> </option>   <?php } ?> 
										</select>
											
							<input id="firstPlayerName" name="Description1"  style="width: 50px;" placeholder="" type='text'  value=""/>
									</div>
											
										
										  		 
									
											<div class="col-sm-2 ">	
										
											<select name="select2" style="width: 65px;"> <option value="">Select</option>
											<?php $setProShopAttributes = $admin->setProShopAttributes(); 
											foreach ($setProShopAttributes as $line) 
											{?> 
											
											<option value="<?php echo $line['attributeID'];?>"> <?php echo $line['Description'];?> </option>   <?php } ?> 
										</select>
											
							<input id="firstPlayerName" name="Description2"  placeholder="" style="width: 50px;" type='text'  value=""/>
									</div>
											
										  
										  		 
										<div class="form-group">
											<div class="col-sm-2 ">	
										
										 
										  
											<select name="select3" style="width: 65px;"> <option value="">Select</option>
											<?php $setProShopAttributes = $admin->setProShopAttributes(); 
											foreach ($setProShopAttributes as $line) 
											{?> 
												<option value="<?php echo $line['attributeID'];?>"> <?php echo $line['Description'];?> </option>   <?php 
											} ?> 
										</select>
											
							<input id="firstPlayerName" name="Description3"  placeholder="" style="width: 50px;" type='text'  value=""/>
									</div>
											
										
										  	 
										<div class="form-group">
											<div class="col-sm-2 ">	
										
										  
											<select name="select4" style="width: 65px;"> <option value="">Select</option>
											<?php $setProShopAttributes = $admin->setProShopAttributes(); 
											foreach ($setProShopAttributes as $line) 
											{?> 
												<option value="<?php echo $line['attributeID'];?>"> <?php echo $line['Description'];?> </option>   <?php 
											} ?> 
										</select>
											
							<input id="firstPlayerName" name="Description4"  placeholder="" style="width:50px;" type='text'  value=""/>
									</div>
											
										  </div>
										
										
										
										  
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label ">Active :</label>
											<input type="checkbox" name="isActive" value="1"></input>
											</div>	
											<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label ">Deal Applicable :</label>
											<input type="checkbox" name="dealApplicable" value="1"></input>
											</div>	
											
									<div class="col-sm-offset-0 col-sm-12 bottom-button" align="right">
											<!--<button type="button" class="btn btn-default" onclick="submitAddcard();">Save</button>-->
											<!--<center><input id="submit-button" type="submit" /></center>-->
													<button class="btn btn-primary" type="submit" input id="submit-button">Finish</button>
									</div>
									</div>
								<div>
								
		</form>

		<form action="proddata.php" method = "post"> 
			<section>
			<div id="featured-golf-section">
					<div class="container" id="FourballSection" align="center">
					<div id='' align="center">
					
					
							
							<div class="col-sm-12 lr-padding-0">
											<span id="error_msg" style="color: red;display: none"></span>
							</div>
							
							
						</div></div>
											
							</div></div>
					</section>	
				</center>
			
		</form>
							</div>


                        </table>
                    </div></br>
				

            </div>
		
  </div>
	
                <!-- Panels End -->
		</div>
		
		
		
            <!-- Inner Container End -->
	

 <?php include 'admin_footer.php';?>
