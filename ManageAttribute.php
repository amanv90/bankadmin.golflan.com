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

<?php
    $active ="ManageCategories";
    include 'admin_header.php';
?>
<?php
			//session_start["cart_item"];
			if(!empty($_GET["action"])) 
			{
				
				switch($_GET["action"])
					{
					case "Remove":
						if(!empty($_GET["Description_del"])) 
						{
							//echo $_GET["code"];
							$des=$_GET["Description_del"];
						//	echo $des;
							$deleteProShopAttributes = $admin->deleteProShopAttributes($des); 
							// mysql_query("DELETE FROM proshopattributes where attributeID=".$des."");
							
							
						} 
					break;
					
					}
				}
			?>
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">

        	<!-- Inner Container Start -->
        <div class="container" style="padding-top: 2%">

            <div class="mws-panel mws-panel-margin-bot  grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i>Add New Attribute</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-datatable mws-table">

                            <div class="bs-example-back-color1 col-lg-12 padding-off " data-example-id="condensed-table">

									<div class="bs-example" data-example-id="simple-horizontal-form">
									<form class="form-horizontal" action="Attdata.php" method="post">
									</br>
										 <!--<div class="col-sm-2  col-sm-offset-50 h4-padding-bot"><h5><strong>ADD NEW Attribute</strong></h5></div>-->

										 <div class="clearfix"></div>
										 <div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label ">Attribute Name:</label>
											<div class="col-sm-10 ">
											  
											  <input id="firstPlayerName" name="Description"  placeholder="Attribute Name" type='text' required class="form-control validate[required] player_name" value=""/>
											</div>
										  </div>
									
									<div class="col-sm-offset-0 col-sm-12 bottom-button" align="right">
											<!--<button type="button" class="btn btn-default" onclick="submitAddcard();">Save</button>-->
											<!--<center><input id="submit-button" type="submit" /></center>-->
												<center><input id="submit-button" type="submit" class="btn btn-success"/></center>
									</div>
									</div>
									</form>

<form action="Attdata.php" method = "post"> 
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
								
								<div class="mws-panel grid_8">
										<div class="mws-panel-header">
											<span><i class="icon-table"></i> All Attribute</span>
										</div>
										
										
										
										
							<div class="mws-panel-body no-padding">
							<?php 
											 
											 //$query = "SELECT * FROM proshopattributes"; 
											// $result = mysql_query($query); 
											 
										 ?> 
											<table class="mws-datatable mws-table">
												<thead>
													<tr>
														<!--<th>#</th>-->
														<th><center>S No</center></th>
														<th><center>Attribute Name</center></th>
															<th><center>Manage Attribute </center></th>
													</tr>
												</thead>
												<tbody>
													<?php $setProShopAttributes = $admin->setProShopAttributes(); 
															foreach ($setProShopAttributes as $line) { ?>
														<tr>
														
														<!--<td><?php //echo $value['BookID'];?></td>-->
														<td><center><?php echo $line['attributeID'];?></center></td>
														<td><center><?php echo $line['Description'];?></center></td>

															
														<td>
														<center>
	
	<a href="editattribute.php?Catname=<?php echo $line['Description'];?>&parent_cat_id=<?php echo $line['attributeID'];?>"><button class="btn btn-success">Edit</button></a>
	<a href="ManageAttribute.php?Description_del=<?php echo $line['attributeID']?>&action=Remove"><button class="btn btn-danger">DELETE</button></a>
	</center>
														</td>

											
														
														</tr>
													<?php }?>
													<div>
													
													</div>
												</tbody>
											</table>
										</div>			
																							
									</div>
									<!-- Panels End -->
							</div>
                <!-- Panels End -->
		</div>
		
            <!-- Inner Container End -->

 <?php include 'admin_footer.php';?>
