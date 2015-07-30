<?php
include 'router.php';
$admin = new Admin(DB1);
//session_start["cart_item"];
			
						if((!empty($_POST["priceMapID"]))&&(!empty($_POST["prodID"])))
						{
							$usersCount = count($_POST["attributeID1"]);
							for($i=0;$i<$usersCount;$i++) {
								
							$updateProShopAttributePriceMap2 = $admin->updateProShopAttributePriceMap2($_POST["attributeID1"][$i],$_POST["Description1"][$i],$_POST["attributeID2"][$i],$_POST["Description2"][$i],$_POST["attributeID3"][$i],$_POST["Description3"][$i],$_POST["attributeID4"][$i],$_POST["Description4"][$i],$_POST["listPrice"][$i],$_POST["ourPrice"][$i],$_POST["dealApplicable"][$i],$_POST["dealID"][$i],$_POST["stockOnHand"][$i],$_POST["isActive"][$i],$_POST["priceMapID"][$i]); 
							//mysql_query("UPDATE proShopAttributePriceMap set attributeID1 = '".$_POST["attributeID1"][$i]."',Description1='".$_POST["Description1"][$i]."',attributeID2='".$_POST["attributeID2"][$i]."',Description2='".$_POST["Description2"][$i]."',attributeID3='".$_POST["attributeID3"][$i]."',Description3='".$_POST["Description3"][$i]."',attributeID4='".$_POST["attributeID4"][$i]."',Description4='".$_POST["Description4"][$i]."',listPrice='".$_POST["listPrice"][$i]."',ourPrice='".$_POST["ourPrice"][$i]."',dealApplicable='".$_POST["dealApplicable"][$i]."',dealID='".$_POST["dealID"][$i]."',stockOnHand='".$_POST["stockOnHand"][$i]."',isActive='".$_POST["isActive"][$i]."' WHERE priceMapID = '".$_POST["priceMapID"][$i]."'");
							}	
						}
						if((empty($_POST["priceMapID"]))&&(!empty($_POST["prodID"])))
						{
							$prodID=$_POST['prodID'];
							echo $prodID;
							$Title = $_POST['Title'];
							$Description = $_POST['Description'];
							$FeatureRanking = $_POST['FeatureRanking'];
							$imgURL = $_POST['imgURL'];
							$brandName = $_POST['brandName'];
							$Category = $_POST['Category'];
							$subCategory = $_POST['subCategory'];
							$updateProShopMaster = $admin->updateProShopMaster($Title,$Description,$FeatureRanking,$imgURL,$brandName,$Category,$subCategory,$prodID); 
						}
		
			
	header('Location: ' . $_SERVER['HTTP_REFERER']);		
?>