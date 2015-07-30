<?php

include 'router.php';
$admin = new Admin(DB1);

$shipStatus= mysql_real_escape_string(filter_var(trim($_POST['shipStatus']), FILTER_SANITIZE_STRING));
$shipDate= mysql_real_escape_string(filter_var(trim($_POST['shipDate']), FILTER_SANITIZE_STRING));
echo $shipStatus;
echo $shipDate;
$Renewed_On = date('Y-m-d', strtotime($shipDate));

$updateproShopTrans = $admin->updateproShopTrans($shipStatus,$Renewed_On,$_GET['orderID']); 

echo $shipStatus;

header( "refresh:0;url=Proshop_order.php" );
?>
