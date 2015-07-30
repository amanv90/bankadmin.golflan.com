<?php
//session_start();
// Define database credentials
include 'router.php';
$admin = new Admin(DB1);
// Grab user input and sanitize 
$Description = mysql_real_escape_string(filter_var(trim($_POST['Description']), FILTER_SANITIZE_STRING));
$setProShopAttibutes = $admin->setProShopAttibutes($Description);

echo $Description;

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>

