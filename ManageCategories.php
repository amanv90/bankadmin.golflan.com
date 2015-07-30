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
						if(!empty($_GET["catid_del"])) 
						{
							//echo $_GET["code"];
							$del_cat_code=$_GET["catid_del"];
							//echo $del_cat_code;
							$deleteProShopCategoryMaster = $admin->deleteProShopCategoryMaster($del_cat_code); 
							
							
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
                    	<span><i class="icon-table"></i>Add New Parent Category</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form action="managecategories-data.php" method = "post"> 
							<section>
							<div class="">
									<div class="bs-example" data-example-id="simple-horizontal-form" align="center">
									<div id='' align="center">
									<div class="col-sm-12 lr-padding-0"></br>
										
											<div id="player_1">
																		<div class="col-sm-13">
																			<div class="form-group"><label><span class="player_number">New Parent Category Title</span></label> 
																						<input id="firstPlayerName" name="cat_name" type='text' class="form-control validate[required] player_name" value=""/>
																			</div>
																		</div>
																  
											</div>
											
											
											
											
									</div>
									</div>
									</div>
							</div>
							</section>	
							</center>
							<center><input id="submit-button" type="submit" class="btn btn-success"/></center></br>
						</form>
                    </div>
					</br>
					<div class="mws-panel-header">
                    	<span><i class="icon-table"></i> Add New Sub Category</span>
                    </div>
					<div class="mws-panel-body no-padding">
                        <table class="mws-datatable mws-table">

                            <div class="bs-example-back-color1 col-lg-12 padding-off " data-example-id="condensed-table">

								<div class="bs-example" data-example-id="simple-horizontal-form">
									
					<!--------     add sub category                 -->
									<form action="managecategories-data.php" class="form-horizontal" method="post">
										 </br>
										 <label for="inputEmail3" class="col-sm-2 control-label ">In Parent Category :</label>&nbsp;&nbsp;&nbsp;
										 
										 <select name="select1"> 
											<?php $setProShopCategoryMaster = $admin->setProShopCategoryMaster(); 
												foreach ($setProShopCategoryMaster as $line) { ?> 
											<option value="<?php echo $line['catID'];?>"> <?php echo $line['Description'];?> </option>   <?php } ?> 
										</select>
									
										 <div class="clearfix"></div>
										 
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label ">Sub Category Title :</label>
											<div class="col-sm-10 ">
											  <input id="firstPlayerName" name="sub_cat_name" type='text' class="form-control validate[required] player_name" value=""/>
											</div>
										</div>
										<div class="col-sm-offset-0 col-sm-12 bottom-button" align="right">
										  <input type="submit" name="submit" class="btn btn-success" />
										  </div>
									</form>
					<!--------     add sub category                 -->
										
								</div>


							</div>


                        </table>
                    </div>

            </div>
		
  </div>
					  <div class="container" style="padding-top: 2%">
								
								<div class="mws-panel grid_8">
										<div class="mws-panel-header">
											<span><i class="icon-table"></i> All Categories</span>
										</div>
										<div class="mws-panel-body no-padding">
											<table class="mws-datatable mws-table">
												<thead>
													<tr>
														<!--<th>#</th>-->
														<th><center>Category ID</center></th>
														<th><center>Parent Category ID</center></th>
														<th><center>IS Parent Category</center></th>
														<th><center>Is Sub Categories</center></th>
														<th><center>Description</center></th>
														<th><center>Manage Subcategories</center></th>
													</tr>
												</thead>
												<tbody>
													<?php $setProShopCategoryMaster = $admin->setProShopCategoryMaster(); 
															foreach ($setProShopCategoryMaster as $line) { ?>
														<tr>
														<!--<td><?php //echo $value['BookID'];?></td>-->
														<td><center><?php echo $line['catID'];?></center></td>
														<td><center><?php echo $line['parentCategoryID'];?></center></td>
														<td><center><?php echo $line['isParentCategory'];?></center></td>
														<td><center><?php echo $line['isSubCategory'];?></center></td>
														<td><center><?php echo $line['Description'];?></center></td>
														<td><center><a href="ManageSubCategories.php?Catname=<?php echo $line['Description'];?>&parent_cat_id=<?php echo $line['catID'];?>"><button class="btn btn-primary">Edit</button></a>&nbsp;&nbsp;<a href="ManageCategories.php?catid_del=<?php echo $line['catID']?>&action=Remove"><button class="btn btn-danger">Remove</button></a></center></td>
														</tr>
													<?php }?>
													
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

