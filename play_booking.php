<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<?php

    include 'router.php';
    $active ="complimentary";
    include 'admin_header.php';
    $id = $_GET['service'];
    $url_array = unserialize(SERVICE_ARRAY);
    $key = array_search($id, $url_array);
    $admin = new Admin($key);
    $checkDatabase = $admin->getCheckDatabase($key,$_SESSION);
    if($checkDatabase){
      $compBookingsArr = $admin->getPlayBookings();
    }else { 
        //echo "Service Error";
        ?>
    <script>
        $(document).ready(function() {
        $( "#mws-container" ).hide();
        alert("Service Error.");
     });
      </script>
      <?php  } ?>
 

        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix" style="width:1630px;">

        	<!-- Inner Container Start -->
        <div class="container" style="padding-top: 2%">

            <div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i> Complimentary Bookings</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-datatable mws-table">
                            <thead>
                                <tr>
                                    <th>Book ID</th>
                                    <th>USER ID</th>
                                    <th>Request Date</th>
                                    <th>Date of Play</th>
                                    <th>Slot of Play</th>
									<th>Golf Course 1</th>
                                                                        <th>Golf Course 2</th>
                                                                        <th>Confirm Golf Course</th>
									<th>Type Of Play</th>
                                                                        <th>Customer Name</th>
									<th>Email ID</th>
									
                                    <th>Booking status</th>	
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($compBookingsArr as $value) {?>
                                    <tr>
                                    <td><?php echo $value['BookID'];?></td>
                                    <td><?php echo $value['USER_ID'];?></td>
                                    <td><?php echo $value['dateRequest'];?></td>
                                    <td><?php echo $value['dateOfPlay'];?></td>
                                    <td><?php echo $value['slotOfPlay'];?></td>
									<td><?php echo $value['GC1'];?></td>
									<td><?php echo $value['GC2'];?></td>
									<td><?php echo $value['confirmedGC'];?></td>
                                                                        <td><?php if($value['booking_type'] == 0 ){
                                                                                    echo "Play";
                                                                            
                                                                         } else {
                                                                              echo "Learn";
                                                                         }?></td>
                                                                        <td><?php echo $value['Login_Name']?></td>
                                                                        <td><?php echo $value['EMAIL']?></td>
                                    <!--<td><?php //echo $value['bookingStatus'];?></td>-->
                                    <td><a href="javascript:void(0)" onclick="window.location.href='complimentary_edit.php?booking_ID=<?php echo $value['BookID'];?>&service=<?php echo $id; ?>'">Edit</a></td>
                                    </tr>
                                <?php }?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Panels End -->
            </div>
            <!-- Inner Container End -->
 <!-- Core Script -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/core/mws.js"></script>
	   <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/core/mws.js"></script>
		</body>
		   <script src="js/libs/jquery-1.8.3.min.js"></script>
    <script src="js/libs/jquery.mousewheel.min.js"></script>
    <script src="js/libs/jquery.placeholder.min.js"></script>
    <script src="custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="jui/jquery-ui.custom.min.js"></script>
    <script src="jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/colorpicker/colorpicker-min.js"></script>

    <!-- Core Script -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="js/demo/demo.table.js"></script>  	
 <?php include 'admin_footer.php';?>