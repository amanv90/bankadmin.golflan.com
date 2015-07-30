<?php
session_start();
// Define database credentials
include 'router.php';
$admin = new Admin(DB1);
			if(isset($_POST['select1']))
			{
				$email_id=$_POST['select1'];
				//$_SESSION['PROD_ID']=$prod_id;
				echo $email_id;
				if($email_id!=NULL)
				{
					$getWebUserMasterByEmail = $admin->getWebUserMasterByEmail($email_id); 
					foreach ($getWebUserMasterByEmail as $line) 
					{
						//echo '<li>',$row['FName'],'</li>';
						$_SESSION["temp_user_id"] = $line['User_ID'] ;
						echo $line['User_ID'] ;
					
					}
				}
			}
			if(isset($_POST['select2']))
			{
				$CardNo=$_POST['select2'];
				//$_SESSION['PROD_ID']=$prod_id;
				echo $CardNo;
				if($CardNo!=NULL)
				{
					$getWebUserMasterByCardNo = $admin->getWebUserMasterByCardNo($CardNo); 
					foreach ($getWebUserMasterByCardNo as $line) 
					{
						//echo '<li>',$row['FName'],'</li>';
						$_SESSION["temp_user_id"] = $line['User_ID'] ;
						echo $line['User_ID'] ;
					
					}
				}
			}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>