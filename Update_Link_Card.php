<?php
include 'router.php';
$admin = new Admin(DB1);
//session_start["cart_item"];
			
						if((empty($_POST["LoginName"]))&&(!empty($_POST["UserID"])))
						{
							echo $_POST["User_ID"];
							$usersCount = count($_POST["CardTypeID"]);
							for($i=0;$i<$usersCount;$i++) {
								
							$updateWebUserCards = $admin->updateWebUserCards($_POST["CardTypeID"][$i],$_POST["CardNo"][$i],$_POST["ValidFrom"][$i],$_POST["ValidTill"][$i],$_POST["AvlCompGames"][$i],$_POST["AvlLearnSessions"][$i],$_POST["AvlAssistSessions"][$i],$_POST["AvlGlobalSessions"][$i],$_POST["AvlTrophyGames"][$i],$_POST["isActive"][$i],$_POST["DateAdded"][$i],$_POST["ActivatedOn"][$i],$_POST["RenewedOn"][$i],$_POST["CountryOrigin"][$i],$_POST["User_ID"][$i]); 
							//mysql_query("UPDATE proShopAttributePriceMap set attributeID1 = '".$_POST["attributeID1"][$i]."',Description1='".$_POST["Description1"][$i]."',attributeID2='".$_POST["attributeID2"][$i]."',Description2='".$_POST["Description2"][$i]."',attributeID3='".$_POST["attributeID3"][$i]."',Description3='".$_POST["Description3"][$i]."',attributeID4='".$_POST["attributeID4"][$i]."',Description4='".$_POST["Description4"][$i]."',listPrice='".$_POST["listPrice"][$i]."',ourPrice='".$_POST["ourPrice"][$i]."',dealApplicable='".$_POST["dealApplicable"][$i]."',dealID='".$_POST["dealID"][$i]."',stockOnHand='".$_POST["stockOnHand"][$i]."',isActive='".$_POST["isActive"][$i]."' WHERE priceMapID = '".$_POST["priceMapID"][$i]."'");
							}	
						}
						if((!empty($_POST["LoginName"]))&&(!empty($_POST["UserID"])))
						{
							$UserID=$_POST['UserID'];
							echo $UserID;
							$LoginName = $_POST['LoginName'];
							$FirstName = $_POST['FirstName'];
							$LastName = $_POST['LastName'];
							$Email = $_POST['Email'];
							$Mobile = $_POST['Mobile'];
							$City = $_POST['City'];
							$State = $_POST['State'];
							$ZipCode = $_POST['ZipCode'];
							$Country = $_POST['Country'];
							$Address = $_POST['Address'];
							$Gender = $_POST['Gender'];
							$CardType = $_POST['CardType'];
							$CardNo = $_POST['CardNo'];
							$PasswordHash = MD5($_POST['Password']);
							echo $PasswordHash;
							$Password = $_POST['Password'];
							$DOB = $_POST['DOB'];
							$updateWebUserMaster = $admin->updateWebUserMaster($LoginName,$FirstName,$LastName,$Email,$Mobile,$City,$State,$ZipCode,$Country,$Address,$Gender,$CardType,$CardNo,$PasswordHash,$Password,$DOB,$UserID); 
						}
						else
						{
							echo $_POST["User_ID"];
							$usersCount = count($_POST["CardTypeID"]);
							for($i=0;$i<$usersCount;$i++) {
								$Valid_Till = mysql_real_escape_string($_POST["ValidTill"][$i]);
								$Valid_Till = date('Y-m-d', strtotime($Valid_Till));
								$ValidFrom = mysql_real_escape_string($_POST["ValidFrom"][$i]);
								$ValidFrom = date('Y-m-d', strtotime($ValidFrom));
								$DateAdded = mysql_real_escape_string($_POST["DateAdded"][$i]);
								$DateAdded = date('Y-m-d', strtotime($DateAdded));
								$ActivatedOn = mysql_real_escape_string($_POST["ActivatedOn"][$i]);
								$ActivatedOn = date('Y-m-d', strtotime($ActivatedOn));
								$RenewedOn = mysql_real_escape_string($_POST["RenewedOn"][$i]);
								$RenewedOn = date('Y-m-d', strtotime($RenewedOn));
							$updateWebUserCards = $admin->updateWebUserCards($_POST["CardTypeID"][$i],$_POST["CardNo"][$i],$ValidFrom,$Valid_Till,$_POST["AvlCompGames"][$i],$_POST["AvlLearnSessions"][$i],$_POST["AvlAssistSessions"][$i],$_POST["AvlGlobalSessions"][$i],$_POST["AvlTrophyGames"][$i],$_POST["isActive"][$i],$DateAdded,$ActivatedOn,$RenewedOn,$_POST["CountryOrigin"][$i],$_POST["User_ID"][$i]); 
							//mysql_query("UPDATE proShopAttributePriceMap set attributeID1 = '".$_POST["attributeID1"][$i]."',Description1='".$_POST["Description1"][$i]."',attributeID2='".$_POST["attributeID2"][$i]."',Description2='".$_POST["Description2"][$i]."',attributeID3='".$_POST["attributeID3"][$i]."',Description3='".$_POST["Description3"][$i]."',attributeID4='".$_POST["attributeID4"][$i]."',Description4='".$_POST["Description4"][$i]."',listPrice='".$_POST["listPrice"][$i]."',ourPrice='".$_POST["ourPrice"][$i]."',dealApplicable='".$_POST["dealApplicable"][$i]."',dealID='".$_POST["dealID"][$i]."',stockOnHand='".$_POST["stockOnHand"][$i]."',isActive='".$_POST["isActive"][$i]."' WHERE priceMapID = '".$_POST["priceMapID"][$i]."'");
							}	
						}
		
			
	header('Location: ' . $_SERVER['HTTP_REFERER']);		
?>