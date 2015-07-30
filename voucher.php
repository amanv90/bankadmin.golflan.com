<?php
session_start();
include 'router.php';
$admin = new Admin(DB1);

$VoucherNumber= mysql_real_escape_string(filter_var(trim($_POST['VoucherNumber']), FILTER_SANITIZE_STRING));
$_SESSION['VoucherNum']=$VoucherNumber;
echo $VoucherNumber;
$Description= mysql_real_escape_string(filter_var(trim($_POST['Description']), FILTER_SANITIZE_STRING));
$_SESSION['DES']=$Description;
$Amount= mysql_real_escape_string(filter_var(trim($_POST['Amount']), FILTER_SANITIZE_STRING));
$_SESSION['Amou']=$Amount;
$issuedDate= mysql_real_escape_string(filter_var(trim($_POST['issuedDate']), FILTER_SANITIZE_STRING));
$_SESSION['issued_Date']=$issuedDate;
$expiryDate= mysql_real_escape_string(filter_var(trim($_POST['expiryDate']), FILTER_SANITIZE_STRING));
$_SESSION['expiry_Date']=$expiryDate;
$voucherType= mysql_real_escape_string(filter_var(trim($_POST['voucherType']), FILTER_SANITIZE_STRING));
$LobApplicable= mysql_real_escape_string(filter_var(trim($_POST['LobApplicable']), FILTER_SANITIZE_STRING));
$GIDApplicable= mysql_real_escape_string(filter_var(trim($_POST['GIDApplicable']), FILTER_SANITIZE_STRING));
$numTimesAllowed= mysql_real_escape_string(filter_var(trim($_POST['numTimesAllowed']), FILTER_SANITIZE_STRING));
$issued_Date = mysql_real_escape_string($issuedDate);
$issued_Date = date('Y-m-d', strtotime($issued_Date));
$expiry_Date = mysql_real_escape_string($expiryDate);
$expiry_Date = date('Y-m-d', strtotime($expiry_Date));


$setVoucherMaster = $admin->setVoucherMaster($VoucherNumber,$Description,$Amount,$issued_Date,$expiry_Date,$voucherType,$LobApplicable,$GIDApplicable,$numTimesAllowed);

//mysql_query("INSERT INTO `VoucherMaster` (VoucherNumber,Description,Amount,issuedDate,expiaryDate,voucherType,LobApplicable) VALUES ('".$VoucherNumber."','".$Description."','".$Amount."','".$issued_Date."','".$expiry_Date."','".$voucherType."','".$LobApplicable."') ");












header('Location: ' . $_SERVER['HTTP_REFERER']);
?>