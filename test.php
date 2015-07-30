<?php
echo "aman";








includes 'router.php';
echo"mana";

//Grab user input and sanitize 
$Description = mysql_real_escape_string(filter_var(trim($_POST['Description']), FILTER_SANITIZE_STRING));
mysql_query("INSERT INTO proShopAttributes (Description) VALUES ('".$Description."') ");
echo "";










header('Location: ' . $_SERVER['HTTP_REFERER']);
aman"
?>
