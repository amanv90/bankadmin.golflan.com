<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<?php

    include 'router.php';
    include 'admin_header.php';
    $id = $_GET['service'];
    $active ="complimentary";
    $url_array = unserialize(SERVICE_ARRAY);
    $key = array_search($id, $url_array);
    $admin = new Admin($key);
    $bookID = $_GET['booking_ID'];
    
        $checkDatabase = $admin->getCheckDatabase($key,$_SESSION);
    if($checkDatabase){
      $booking_details = $admin->getBookingDetailsByID($bookID);
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


<?php
    
?>

        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">

        	<!-- Inner Container Start -->
        <div class="container" style="padding-top: 2%">


            <div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>complimentary bookings Details</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form action="form_layouts.html" class="mws-form" style="padding-left:2%;padding-top: 1%">
                    		<div class="col-md-12">
                    			<div class="form-group" style="padding-bottom: 1%">
									<label class="col-md-4"><strong>Slot Request Id #</strong></label>
									<label class="col-md-7"><?php if(isset($booking_details['BookID'])){echo $booking_details['BookID'].',';}?></label>
                    			</div>
                                        <div class="form-group" style="padding-bottom: 1%">
                    				<label class="col-md-4"><strong>Golf Course 1:</strong></label>
                                                <label class="col-md-7">
                                                    <?php if(isset($booking_details['GC1'])){echo $booking_details['GC1'].',';}?>
                                                 </label>
                                                <label class="col-md-12">
                                                  <?php if (isset($booking_details['bookingStatus']) && strtolower($booking_details['bookingStatus'])==strtolower("Confirmed") && $booking_details['GID_OPT1'] == $booking_details['confirm_GID']) { ?>
                                                    <font color="red">Confirmed Golf Course</font> 
                                                    <?php } ?>
                                                </label>
                    			</div>
                                        <div class="form-group" style="padding-bottom: 1%">
                    				<label class="col-md-4"><strong>Golf Course 2:</strong></label>
                                                <label class="col-md-7">
                                                    <?php if(isset($booking_details['GC2'])){echo $booking_details['GC2'].',';}?>
                                                 </label>
                                                <label class="col-md-12">
                                                  <?php if (isset($booking_details['bookingStatus']) && strtolower($booking_details['bookingStatus'])==strtolower("Confirmed") && $booking_details['GID_OPT2'] == $booking_details['confirm_GID']) { ?>
                                                    <font color="red">Confirmed Golf Course</font>
                                                    <?php } ?>
                                                </label>
                    			</div>
                                        <div class="form-group" style="padding-bottom: 1%">
                                            <label class="col-md-4"><strong>Date of Booking Request:</strong></label>
                                            <label class="col-md-7"><?php if(isset($booking_details['dateRequest'])){echo $booking_details['dateRequest'];}?></label>
                    			</div>
                                        <div class="form-group" style="padding-bottom: 1%">
                                            <label class="col-md-4"><strong>Date of Play:</strong></label>
                                            <label class="col-md-7"><?php if(isset($booking_details['dateOfPlay'])){echo $booking_details['dateOfPlay'];}?></label>
                    			</div>
                    		</div>
                    	</form>
                    </div>
                </div>
                <!-- Panels End -->



				<div class="clearfix"></div>
				<div class="bs-example width-table-b " data-example-id="simple-table">
    <table width="97%" class="table table-responsive" >
     <tr>
         <td width="8%" colspan="6"><table width="100%" border="0 " class="table table-border table-responsive">
            <tr class="border_none" >
                <td class="border_none" width="150"><strong>Customer Name:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($booking_details['Login_Name'])){echo $booking_details['Login_Name'];}?></strong></td>
                <td class="border_none"  width="248">|&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <?php if(isset($booking_details['EMAIL'])){echo $booking_details['EMAIL'];}?></td>
            </tr>
              <tr class="border_none" >
                <td colspan="2" class="border_none" ><strong>Payment Mode: </strong>asdasd</td>
              </tr>
          </table></td>

        </tr>
      <tr>
          <td width="4%"><strong>Sr ID</strong></td>
          <td width="4%"><strong>Date Of Pay</strong></td>
          <td width="4%"><strong>Slot Of Play</strong></td>
          <td width="4%"><strong>Golf Course 1</strong></td>
          <td width="4%"><strong>Golf Course 2</strong></td>
          <td width="4%"><strong>Total Players</strong></td>
          <td width="1%"><strong>Total Amount</strong></td>
        </tr>


        <tr>
          <td scope="row"><?PHP if(isset($booking_details['BookID'])){echo $booking_details['BookID'];}?></td>
          <td><?php if(isset($booking_details['dateOfPlay'])){echo $booking_details['dateOfPlay'];}?></td>
          <td><?php if(isset($booking_details['slotOfPlay'])){echo $booking_details['slotOfPlay'].',';}?></td>
          <td><?php if(isset($booking_details['GC1'])){echo $booking_details['GC1'].',';}?></td>
          <td><?php if(isset($booking_details['GC2'])){echo $booking_details['GC2'].',';}?></td>
          <td>1</td>
          <td>-</td>
        </tr>
        <tr>
          <td colspan="4" rowspan="2" scope="row" class="table table-responsive" >&nbsp;</td>
          <td>Order Status</td>
          <td><table width="269" border="0" cellpadding="10">
            <tr>
                <?php  if((isset($booking_details['bookingStatus']) && strtolower($booking_details['bookingStatus'])==strtolower("pending"))) {?> 
							<!--<a href="complimentry_update_status.php?Book_ID=<?php echo $booking_details['BookID']?>&action=Pending"><button class="btn btn-revert">Pending</button></a>--> &nbsp;&nbsp;&nbsp;
							<a href="complimentry_update_status.php?Book_ID=<?php echo $booking_details['BookID']?>&action=Cancelled"><button class="btn btn-danger">Revert</button></a>&nbsp;&nbsp;&nbsp;
							<a href="complimentry_update_status.php?Book_ID=<?php echo $booking_details['BookID']?>&service=<?php echo $id;?>&action=Confirmed&gid=<?php echo $booking_details['GID_OPT1']; ?>"><button class="btn btn-success">Confirm GID1</button></a>&nbsp;&nbsp;&nbsp;
                                                        <a href="complimentry_update_status.php?Book_ID=<?php echo $booking_details['BookID']?>&service=<?php echo $id;?>&action=Confirmed&gid=<?php echo $booking_details['GID_OPT2']; ?>"><button class="btn btn-success">Confirm GID2</button></a>

              <?php }elseif((isset($booking_details['bookingStatus']) && strtolower($booking_details['bookingStatus'])==strtolower("Confirmed")))
					{?>
							<a href="complimentry_update_status.php?Book_ID=<?php echo $booking_details['BookID']?>&action=Cancelled&service=<?php echo $id;?>"><button class="btn btn-danger">Revert</button></a>
							
              <?php }else {?>
				  <td width="54"><?php  if(isset($booking_details['bookingStatus'])) {echo "<b>".$booking_details['bookingStatus']."</b>";}?></td>
			 <?php }?>
			  
            </tr>
<!--            <tr>
              <td height="61" colspan="2"><button class="btn btn-default">confirm/ w/o mail</button></td>
              <td>&nbsp;</td>
            </tr>-->
          </table></td>
        </tr>


    </table>
  </div>
        </div>
            <!-- Inner Container End -->

 <?php include 'admin_footer.php';?>
 