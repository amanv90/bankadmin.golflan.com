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
						if(isset($_POST['update_cat_name_new']))
						{
							$temp= $_POST['update_cat_name_new'];
							
											 //include '../includes/config.php';
											 //$parent_cat_id = mysql_real_escape_string($_GET['parent_cat_id']);
											 $parent_cat_id=$_GET['parent_cat_id'];
											 $cat_name=$_GET['Catname'];
											 $updateProShopCategoryMaster = $admin->updateProShopCategoryMaster($temp,$parent_cat_id); 
						}			 
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
                    	<span><i class="icon-table"></i>EDIT CATEGORY TITLE</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form action="#" method = "post"> 
							<section>
							<div class="">
									<div class="bs-example" data-example-id="simple-horizontal-form" align="center">
									<div id='' align="center">
									<div class="col-sm-12 lr-padding-0"></br>
										<center><label for="inputEmail3" class="col-sm-25 control-label "><u>Previous Category Title</u>:&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($_GET['Catname'])){echo $_GET['Catname'];}?></label></center>
											<div id="player_1" class="col-sm-12 lr-padding-0 player">
																		<div class="">
																			<div class="form-group" align="left"><label><span class="player_number">EDIT CATEGORY TITLE :</span></label> 
																						<input id="firstPlayerName" name="update_cat_name_new" type='text'/>
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
							<?php //header('Location: ' . $_SERVER['HTTP_REFERER']); ?>
						</form>
						<?php //$temp= $_POST['update_cat_name_new'];  echo $temp; ?>
						
                    </div>
					</br>
					

            </div>
		
  </div>
		<!--         ---------------------------           form sheet    		---------------------------------------------->
					
                <!-- Panels End -->
		
		<div class="container" style="padding-top: 2%">
								
								<div class="mws-panel grid_8">
										<div class="mws-panel-header">
											<span><i class="icon-table"></i> All Categories</span>
										</div>
										<?php 
											
											 //$query = "SELECT * FROM proshopcatgorymaster"; 
											 //$result = mysql_query($query); 
											 
										 ?> 
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
														<th><center>Remove Category</center></th>
													</tr>
												</thead>
												<tbody>
													<?php $setProShopCategoryMaster = $admin->setProShopCategoryMaster(); 
															foreach ($setProShopCategoryMaster as $line) 
															{?>
																<tr>
																<!--<td><?php //echo $value['BookID'];?></td>-->
																<td><center><?php echo $line['catID'];?></center></td>
																<td><center><?php echo $line['parentCategoryID'];?></center></td>
																<td><center><?php echo $line['isParentCategory'];?></center></td>
																<td><center><?php echo $line['isSubCategory'];?></center></td>
																<td><center><?php echo $line['Description'];?></center></td>
																<td><center><a href="ManageSubcategories.php?catid_del=<?php echo $line['catID']?>&action=Remove"><button class="btn btn-danger">Remove</button></a></center></td>
																</tr>
													<?php	}?>
													
												</tbody>
											</table>
										</div>
					</div>
		</div>
            <!-- Inner Container End -->
			

<?php include 'admin_footer.php';?>
<?php //header("Location: ManageCategories.php"); ?>
