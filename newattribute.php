<?php

 include 'router.php';
//    $admin = new Admin(DB1);
//    $compBookingsArr = $admin->getComplimentaryBookings();
//    echo "<pre>";
//    print_r($compBookingsArr);
?>

<?php
    $active ="ManageCategories";
    include 'admin_header.php';
?>
<?php/*
			//session_start["cart_item"];
			if(!empty($_GET["action"])) 
			{
			//	mysql_connect("localhost", "root", "") or die("Connection Failed"); 
			//	mysql_select_db("golflandb")or die("Connection Failed"); 
			include '../includes/config.php';
				switch($_GET["action"])
					{
					case "Remove":
						if(!empty($_GET["Description_del"])) 
						{
							//echo $_GET["code"];
							$des=$_GET["Description_del"];
						//	echo $des;
							mysql_query("DELETE FROM proShopAttributes where attributeID=".$des."");
							
							
						} 
					break;
					
					}
				}
*/			?>
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">

        	<!-- Inner Container Start -->
        <div class="container" style="padding-top: 2%">

            <div class="mws-panel mws-panel-margin-bot  grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i>Add New Attribute</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form action="newatt.php" method = "post"> 
							<section>
							<div class="">
									<div class="bs-example" data-example-id="simple-horizontal-form" align="center">
									<div id='' align="center">
									<div class="col-sm-12 lr-padding-0"></br>
										
											<div id="player_1">
																		<div class="col-sm-13">
																			<div class="form-group"><label><span class="player_number">New Attribute</span></label> 
																						<input id="firstPlayerName" name="Description" type='text' class="form-control validate[required] player_name" value=""/>
																			</div>
																		</div>
																  
											</div>
											
											
											
											
									</div>
									</div>
									</div>
							</div>
							</section>	
							</center>
							<center><input id="submit-button" type="submit" class="btn btn-success"/></center></br>
						</form>
                    </div>
		</div>	
			</div>	
				</div>	
