<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<link rel="stylesheet" type="text/css" href="css/boostarp-admin.css" media="screen">
	<?php

		  include 'router.php';
		  $admin = new Admin(DB1);
//   	  $compBookingsArr = $admin->getComplimentaryBookings();
//  	  echo "<pre>";
//  	  print_r($compBookingsArr);
?>

<?php
    $active ="ManageCategories";
    include 'admin_header.php';
?>
<?php
						if(isset($_POST['update_cat_name_new']))
						{
							$temp= $_POST['update_cat_name_new'];
							$parent_cat_id=$_GET['parent_cat_id'];
							$cat_name=$_GET['Catname'];
							$updateProShopAttributes = $admin->updateProShopAttributes($temp,$parent_cat_id); 
											
						}			 
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
                    	<span><i class="icon-table"></i>EDIT Attribute</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form action="" method = "post"> 
							<section>
							<div class="">
									<div class="bs-example" data-example-id="simple-horizontal-form" align="center">
									<div id='' align="center">
									<div class="col-sm-12 lr-padding-0"></br>
									<label for="inputEmail3" class="col-sm-25 control-label ">Attribute Selected:&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($_GET['Catname'])){echo $_GET['Catname'];}?></label>
											<div id="player_1" class="col-sm-12 lr-padding-0 player">
																		<div class="">
																			<div class="" align="left"><label><span class="player_number">New Attribute Name :</span></label> 
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
										<div class="mws-panel-body no-padding">
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
													
												</tbody>
											</table>
										</div>
					</div>
		</div>
            <!-- Inner Container End -->
			

 <?php include 'admin_footer.php';?>
<?php //header("Location: ManageCategories.php"); ?>
