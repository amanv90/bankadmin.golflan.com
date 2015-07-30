<?php
//session_start();
// Define database credentials
include 'router.php';
$admin = new Admin(DB1);
// Grab user input and sanitize 
			if(isset($_POST['cat_name']))
			{
			$cat_name = mysql_real_escape_string(filter_var(trim($_POST['cat_name']), FILTER_SANITIZE_STRING));
					if($cat_name!=NULL)
					{ $temp='1';
					$setProShopCategoryMaster1 = $admin->setProShopCategoryMaster1($temp,$cat_name);
					}
			}
			//<!-- -------   -->

			if(isset($_POST['select1']))
			{
				$cat_id=$_POST['select1'];
				echo $cat_id;
				if($cat_id!=NULL)
				{
					$getProShopCategoryMaster = $admin->getProShopCategoryMaster($cat_id); 
					foreach ($getProShopCategoryMaster as $line) 
					{
						//echo '<li>',$row['FName'],'</li>';
						$_SESSION["desc"] = $line['Description'] ;
						echo $_SESSION["desc"];
					
					}
				}
			}

			if(isset($_POST['sub_cat_name']))
			{
				$sub_cat_name=$_POST['sub_cat_name'];
				echo $sub_cat_name;
				if($sub_cat_name!=NULL)
				{
					$setProShopCategoryMaster4 = $admin->setProShopCategoryMaster4($cat_id,$sub_cat_name);	
				}
			}



header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

