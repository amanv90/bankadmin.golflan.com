<?php
session_start();
include 'router.php';
$admin = new Admin(DB1);
$Email=$_SESSION['Email'];

//$string= "SELECT * FROM webUserMaster WHERE Email LIKE '".$Email."'";
   $getWebUserMasterEmail = $admin->getWebUserMasterEmail($Email); 
   foreach ($getWebUserMasterEmail as $line) 	{
		$User= $line['User_ID'];
		echo $User;
		$Card_ID= $line['CardTypeID'];
		echo $Card_ID;
		$Card_No= $line['CardNo'];
	}





$ValidFrom= mysql_real_escape_string(filter_var(trim($_POST['ValidFrom']), FILTER_SANITIZE_STRING));
$ValidTill= mysql_real_escape_string(filter_var(trim($_POST['ValidTill']), FILTER_SANITIZE_STRING));
$AvlCompGames= mysql_real_escape_string(filter_var(trim($_POST['AvlCompGames']), FILTER_SANITIZE_STRING));
$AvlLearnSessions= mysql_real_escape_string(filter_var(trim($_POST['AvlLearnSessions']), FILTER_SANITIZE_STRING));
$AvlAssistSessions= mysql_real_escape_string(filter_var(trim($_POST['AvlAssistSessions']), FILTER_SANITIZE_STRING));
$AvlGlobalSessions= mysql_real_escape_string(filter_var(trim($_POST['AvlGlobalSessions']), FILTER_SANITIZE_STRING));
$AvlTrophyGames= mysql_real_escape_string(filter_var(trim($_POST['AvlTrophyGames']), FILTER_SANITIZE_STRING));
$isActive= mysql_real_escape_string(filter_var(trim($_POST['isActive']), FILTER_SANITIZE_STRING));
$AvlPNRGames= mysql_real_escape_string(filter_var(trim($_POST['AvlPNRGames']), FILTER_SANITIZE_STRING));
$DateAdded= mysql_real_escape_string(filter_var(trim($_POST['DateAdded']), FILTER_SANITIZE_STRING));
$ActivatedOn= mysql_real_escape_string(filter_var(trim($_POST['ActivatedOn']), FILTER_SANITIZE_STRING));
$RenewedOn= mysql_real_escape_string(filter_var(trim($_POST['RenewedOn']), FILTER_SANITIZE_STRING));
$CountryOrigin= mysql_real_escape_string(filter_var(trim($_POST['CountryOrigin']), FILTER_SANITIZE_STRING));

$Valid_From = mysql_real_escape_string($ValidFrom);
$Valid_From = date('Y-m-d', strtotime($Valid_From));
$Valid_Till = mysql_real_escape_string($ValidTill);
$Valid_Till = date('Y-m-d', strtotime($Valid_Till));

$Date_Add = mysql_real_escape_string($DateAdded);
$Date_Add = date('Y-m-d', strtotime($Date_Add));

$Activated_On = mysql_real_escape_string($ActivatedOn);
$Activated_On = date('Y-m-d', strtotime($Activated_On));

$Renewed_On = mysql_real_escape_string($RenewedOn);
$Renewed_On = date('Y-m-d', strtotime($Renewed_On));


//mysql_query("INSERT INTO `webUserCards` (User_ID,CardTypeID,CardNo,ValidFrom,ValidTill,AvlCompGames,AvlLearnSessions,AvlAssistSessions,AvlGlobalSessions,AvlTrophyGames,isActive,AvlPNRGames,DateAdded,ActivatedOn,RenewedOn,CountryOrigin) VALUES ('".$User."','".$Card_ID."','".$Card_No."','".$Valid_From."','".$Valid_Till."','".$AvlCompGames."','".$AvlLearnSessions."','".$AvlAssistSessions."','".$AvlGlobalSessions."','".$AvlTrophyGames."','".$isActive."','".$AvlPNRGames."','".$Date_Add."','".$Activated_On."','".$Renewed_On."','".$CountryOrigin."') ");
$setWebUserCards = $admin->setWebUserCards($User,$Card_ID,$Card_No,$Valid_From,$Valid_Till,$AvlCompGames,$AvlLearnSessions,$AvlAssistSessions,$AvlGlobalSessions,$AvlTrophyGames,$isActive,$AvlPNRGames,$Date_Add,$Activated_On,$Renewed_On,$CountryOrigin);


header( "refresh:0;url=addnewcard.php" );

//header('Location: ' . addnewcard.php);







?>