<?php
session_start();
// Define database credentials
include 'router.php';
$admin = new Admin(DB1);
			if(isset($_POST['select1']))
			{
				$prod_id=$_POST['select1'];
				$_SESSION['PROD_ID']=$prod_id;
				echo $prod_id;
				if($prod_id!=NULL)
				{
					$getProShopMaster1 = $admin->getProShopMaster1($prod_id); 
					foreach ($getProShopMaster1 as $line) 
					{
						//echo '<li>',$row['FName'],'</li>';
						$_SESSION["desc"] = $line['Description'] ;
						echo $_SESSION["desc"];
					
					}
				}
			}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

