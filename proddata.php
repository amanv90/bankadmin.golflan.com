<?php
session_start();

include 'router.php';
$admin = new Admin(DB1);
$TITLE=$_SESSION['TITLE_NAME'];

$getProShopMasterTitle = $admin->getProShopMasterTitle($TITLE); 
	foreach ($getProShopMasterTitle as $line) 
	{
		$PROD_ID= $line['prodID'];
	}

$Description1= mysql_real_escape_string(filter_var(trim($_POST['Description1']), FILTER_SANITIZE_STRING));
$Description2= mysql_real_escape_string(filter_var(trim($_POST['Description2']), FILTER_SANITIZE_STRING));
$Description3= mysql_real_escape_string(filter_var(trim($_POST['Description3']), FILTER_SANITIZE_STRING));
$Description4= mysql_real_escape_string(filter_var(trim($_POST['Description4']), FILTER_SANITIZE_STRING));
$listPrice= mysql_real_escape_string(filter_var(trim($_POST['listPrice']), FILTER_SANITIZE_STRING));
$ourPrice= mysql_real_escape_string(filter_var(trim($_POST['ourPrice']), FILTER_SANITIZE_STRING));
$stockOnHand= mysql_real_escape_string(filter_var(trim($_POST['stockOnHand']), FILTER_SANITIZE_STRING));
$isActive= mysql_real_escape_string(filter_var(trim($_POST['isActive']), FILTER_SANITIZE_STRING));
$dealApplicable= mysql_real_escape_string(filter_var(trim($_POST['dealApplicable']), FILTER_SANITIZE_STRING));
$select1= mysql_real_escape_string(filter_var(trim($_POST['select1']), FILTER_SANITIZE_STRING));
$select2= mysql_real_escape_string(filter_var(trim($_POST['select2']), FILTER_SANITIZE_STRING));
$select3= mysql_real_escape_string(filter_var(trim($_POST['select3']), FILTER_SANITIZE_STRING));
$select4= mysql_real_escape_string(filter_var(trim($_POST['select4']), FILTER_SANITIZE_STRING));
$select14= mysql_real_escape_string(filter_var(trim($_POST['select4']), FILTER_SANITIZE_STRING));
$dealID= mysql_real_escape_string(filter_var(trim($_POST['dealID']), FILTER_SANITIZE_STRING));

//mysql_query("INSERT INTO proshopattributepricemap (prodID,attributeID1,attributeID2,attributeID3,attributeID4,Description1,Description2,Description3,Description4,listPrice,ourPrice,stockOnHand,isActive,dealApplicable,dealID) VALUES ('".$PROD_ID."','".$select1."','".$select2."','".$select3."','".$select4."','".$_POST['Description1']."','".$_POST['Description2']."','".$_POST['Description3']."','".$_POST['Description4']."','".$_POST['listPrice']."','".$_POST['ourPrice']."','".$_POST['stockOnHand']."','".$_POST['isActive']."','".$_POST['dealApplicable']."','".$_POST['dealID']."') ") ;
$setProShopAttributePriceMap8 = $admin->setProShopAttributePriceMap8($PROD_ID,$select1,$select2,$select3,$select4,$Description1,$Description2,$Description3,$Description4,$listPrice,$ourPrice,$stockOnHand,$isActive,$dealApplicable,$dealID);
$_SESSION['name']=$PROD_ID;


header( "refresh:0;url=addproducts.php" );
exit;

?>
