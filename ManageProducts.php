<?php
session_start();?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<link rel="stylesheet" type="text/css" href="css/boostarp-admin.css" media="screen">
<style>

table {
  table-layout: fixed;
  width: 10px; /* Important */
}
td {
  width: 150px;
}
input {
    margin-top: 5px;
    width: 70px;
}

</style>

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

        <!-- Main Container Start -->
<div id="mws-container" class="clearfix" style="width:1630px;">

    <!---              first form      ----------- -->
        <div class="container" style="padding-top: 2%">

            <div class="mws-panel mws-panel-margin-bot  grid_8">
					<div class="mws-panel-header">
                    	<span><i class="icon-table"></i> Manage Products</span>
                    </div>
					<div class="mws-panel-body no-padding">
                        <table class="mws-datatable mws-table">

                            <div class="bs-example-back-color1 col-lg-12 padding-off " data-example-id="condensed-table">

								<div class="bs-example" data-example-id="simple-horizontal-form">
									
					<!--------     add sub category                 -->
									<form action="ManageProducts-data.php" class="form-horizontal" method="post">
										 </br>
										 <label for="inputEmail3" class="col-sm-2 control-label">Select Product Title:</label>&nbsp;&nbsp;&nbsp;
										 <select name="select1"> <option value="">Select</option>
											<?php $getProShopMaster = $admin->getProShopMaster(); 
												foreach ($getProShopMaster as $line) {  ?> 
											<option value="<?php echo $line['prodID'];?>"> <?php echo $line['Title'];?> </option>   <?php } ?> 
										</select>
									
										
										  <input type="submit" name="submit" class="btn btn-success" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										  
									</form>
									<a href="addproducts.php"><button class="btn btn-danger">Add New Product</button></a>
					<!--------     add sub category                 -->
										
								</div>


							</div>


                        </table>
                    </div>

            </div>
		</div>
		
		<!---              first form      ----------- -->
		<!---              second form      ----------- -->
		<div class="container" style="padding-top: 2%">
								
								<div class="mws-panel grid_8">
										<div class="mws-panel-header">
											<span><i class="icon-table"></i>Edit Selected Product Details</span>
										</div>
										<?php 
											 $temp_prodID=$_SESSION['PROD_ID'];
											 //$query ="SELECT * FROM proshopmaster WHERE prodID LIKE '".$temp_prodID."'";
											// $result = mysql_query($query); 
											 
										 ?> 
										<div class="mws-panel-body no-padding">
											<table class="mws-datatable mws-table">
												<thead>
													<tr>
														<!--<th>#</th>-->
														<th><center>Product ID</center></th>
														<th><center>Title</center></th>
														<th><center>Description</center></th>
														<th><center>Feature Ranking</center></th>  
														<th><center>Image URL</center></th>
														<th><center>Brand Name</center></th>
														<th><center>Category</center></th>
														<th><center>Sub Category</center></th>
														<th style="width: 100px;"><center>Edit Subcategories</center></th>
														<!--<th style="width: 100px;"><center>Delete Product</center></th>-->
													</tr>
												</thead>
												<tbody>
												<form action="delete_product.php" method="POST">
													<?php $getProShopMaster1 = $admin->getProShopMaster1($temp_prodID); 
													foreach ($getProShopMaster1 as $line) {?>
														<tr>
														<!--<td><?php //echo $value['BookID'];?></td>-->
														<!--<td><center><?php //echo $line['prodID'];?></center></td>-->
														<td><center><input style="width: 120px;" id="product" type="text" name="prodID" value="<?php echo $line['prodID']; ?>"></center></td>
														<td><center><input style="width: 120px;" id="product" type="text" name="Title" value="<?php echo $line['Title'];?>"></center></td>
														<td><center><input style="width: 120px;" id="product" type="text" name="Description" value="<?php echo $line['Description'];?>"></center></td>
														<td><center><input style="width: 120px;" id="product" type="text" name="FeatureRanking" value="<?php echo $line['FeatureRanking'];?>"></center></td>
														<td><center><input style="width: 120px;" id="product" type="text" name="imgURL" value="<?php echo $line['imgURL'];?>"></center></td>
														<td><center><input style="width: 120px;" id="product" type="text" name="brandName" value="<?php echo $line['brandName'];?>"></center></td>
														<td><center><input style="width: 120px;" id="product" type="text" name="Category" value="<?php echo $line['Category'];?>"></center></td>
														<td><center><input style="width: 120px;" id="product" type="text" name="subCategory" value="<?php echo $line['subCategory'];?>"></center></td>
														<input id="id" type="text" name="id" value="<?php $line['prodID']; ?>" style="display:none;">
														<td><center><input class="btn btn-primary" type="submit" name="submit" value="Update"> </center></td>
														<!--<td><center><input value="Remove" class="btn btn-danger" type="button" onclick="window.location = 'delete_product.php?prodID=<?php echo $line['prodID'];?>&action=Remove';"></center></td>-->
														</tr>
													<?php }?>
												</form>
												</tbody>
											</table>
										</div>
							</div>
									<!-- Panels End -->
			</div>
		
		
		
		<!---              second form      ----------- -->
		
		<!---              Third form      ----------- -->
			
			<div class="container" style="padding-top: 2%">
								
							<div class="mws-panel grid_8">
										<div class="mws-panel-header">
											<span><i class="icon-table"></i>Edit Selected Product Attributes</span>
										</div>
										<div class="mws-panel-body no-padding">
											<table class="mws-datatable mws-table">
												<thead>
													<tr>
														<!--<th>#</th>-->
														<th style="width: 70px;"><center>Price Map ID</center></th>
														<th style="width: 70px;"><center>Product ID</center></th>
														<th style="width: 75px;"><center>Attribute 1</center></th>
														<th style="width: 85px;"><center>Description 1</center></th>
														<th style="width: 75px;"><center>Attribute 2</center></th>
														<th style="width: 85px;"><center>Description 2</center></th>
														<th style="width: 75px;"><center>Attribute 3</center></th>
														<th style="width: 85px;"><center>Description 3</center></th>
														<th style="width: 75px;"><center>Attribute 4</center></th>
														<th style="width: 85px;"><center>Description 4</center></th>
														<th style="width: 85px;"><center>List Price</center></th>
														<th style="width: 85px;"><center>Our Price</center></th>
														<th style="width: 85px;"><center>Deal Applicable</center></th>
														<th style="width: 70px;"><center>Deal ID</center></th>
														<th style="width: 70px;"><center>Stock On Hand</center></th>
														<th style="width: 70px;"><center>IS Active</center></th>
														<th style="width: 100px;"><center>Edit Subcategories</center></th>
														<!-- correct button for delete a produt <th style="width: 100px;"><center>Delete Product</center></th>-->
													</tr>
												</thead>
												<tbody><?php //$i=0; ?>
												<form action="delete_product.php" method="post">
													<?php $i=0;
													$getProShopAttributePriceMap = $admin->getProShopAttributePriceMap($_SESSION['PROD_ID']); 
													foreach ($getProShopAttributePriceMap as $line[$i]) 
													{
														
														?>
														<tr>
														<!--<td><?php //echo $value['BookID'];?></td>-->
														<!--<td><center><?php //echo $line['prodID'];?></center></td>-->
														<td><center><input style="width: 40px;" id="product" type="text" name="priceMapID[]" value="<?php echo $line[$i]['priceMapID']; ?>"></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="prodID[]" value="<?php echo $line[$i]['prodID']; ?>"></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="attributeID1[]" value="<?php echo $line[$i]['attributeID1'];?>"></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="Description1[]" value="<?php echo $line[$i]['Description1'];?>"></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="attributeID2[]" value="<?php echo $line[$i]['attributeID2'];?>"></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="Description2[]" value="<?php echo $line[$i]['Description2'];?>"></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="attributeID3[]" value="<?php echo $line[$i]['attributeID3'];?>"></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="Description3[]" value="<?php echo $line[$i]['Description3'];?>"></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="attributeID4[]" value="<?php echo $line[$i]['attributeID4'];?>"></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="Description4[]" value="<?php echo $line[$i]['Description4'];?>"></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="listPrice[]" value="<?php echo $line[$i]['listPrice'];?>"></center></td>
														<td><center><input style="width: 60px;" id="product" type="text" name="ourPrice[]" value="<?php echo $line[$i]['ourPrice'];?>"></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="dealApplicable[]" value="<?php echo $line[$i]['dealApplicable'];?>"></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="dealID[]" value="<?php echo $line[$i]['dealID'];?>"></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="stockOnHand[]" value="<?php echo $line[$i]['stockOnHand'];?>"></center></td>
														<td><center><input style="width: 40px;" id="product" type="text" name="isActive[]" value="<?php echo $line[$i]['isActive'];?>"></center></td>
														<input id="id" type="text" name="id" value="<?php $line['priceMapID']; ?>" style="display:none;">
														<?php //$arr[$i]= $line['priceMapID'];?>
														<td><center><input class="btn btn-primary" type="submit" name="update[<?php echo $line['priceMapID'];?>]" value="Update"> </center></td>
														<!--<td><center><input value="Update Record" class="btn btn-primary" type="button" onclick="window.location = 'delete_product.php?priceMapID=<?php echo $line['priceMapID'];?>&prodID=<?php echo $line['prodID'];?>&attributeID1=<?php echo $line['attributeID1'];?>&Description1=<?php echo $line['Description1'];?>&attributeID2=<?php echo $line['attributeID2'];?>&Description2=<?php echo $line['Description2'];?>&attributeID3=<?php echo $line['attributeID3'];?>&Description3=<?php echo $line['Description3'];?>&attributeID4=<?php echo $line['attributeID4'];?>&Description4=<?php echo $line['Description4'];?>&listPrice=<?php echo $line['listPrice'];?>&ourPrice=<?php echo $line['ourPrice'];?>&dealApplicable=<?php echo $line['dealApplicable'];?>&dealID=<?php echo $line['dealID'];?>&stockOnHand=<?php echo $line['stockOnHand'];?>&isActive=<?php echo $line['isActive'];?>&action=Add';"></center></td>
														--><!--<td><center><input value="Remove" class="btn btn-danger" type="button" onclick="window.location = 'delete_product.php?priceMapID=<?php echo $line[$i]['priceMapID'];?>&prodID=<?php echo $line[$i]['prodID'];?>&action=Remove';"></center></td>  correct button for delete a product-->
														</tr>
													<?php  //$i++;
													}?>
												</form>
												</tbody>
											</table>
										</div>
							</div>
									<!-- Panels End -->
			</div>
	<!---              Third form      ----------- -->
	
	
	
                <!-- Panels End -->
</div>
		

            <!-- Inner Container End -->
 <?php include 'admin_footer.php';?>

