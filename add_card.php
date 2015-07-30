

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<link rel="stylesheet" type="text/css" href="css/boostarp-admin.css" media="screen">
	<?php

    include 'router.php';
    $golfCourse = new GolfCourse(DB1);
    $golfCards = $golfCourse->getGolferCards();
//    echo "<pre>";
//    print_r($golfCards);
?> 

<?php
    $active ="add_card";
    include 'admin_header.php';
?>

        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">

        	<!-- Inner Container Start -->
        <div class="container" style="padding-top: 2%">

            <div class="mws-panel  grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i> Add New Golfer Card</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-datatable mws-table">

                            <div class="bs-example-back-color col-lg-12 padding-off " data-example-id="condensed-table">

    <div class="bs-example" data-example-id="simple-horizontal-form">
        <form class="form-horizontal" id="golf-card">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Golfer Card Number</label>
              <div class="col-sm-10 ">
                <input type="text" class="form-control" id="card_number" name="card_number" placeholder="Golfer Card Number">
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Select Golf Card Category</label>
                <div class="col-sm-4">
                    <select class="form-control" id='card_type' name='card_type'>
                        <?php foreach ($golfCards as $card) {?>
                            <option value="<?php echo $card['CardTypeID'];?>"><?php echo $card['CardName'];?></option>
                        <?php }?>
                    </select>
                </div>

      <!--    <div class="col-sm-4">
             <select class="form-control" >
              <option>sdf</option>
              <option>sdf</option>
              <option>sdf</option>
              <option>sdf</option>
            </select>
          </div>-->
        </div>

        <div class="clearfix"></div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Valid Form</label>
            <div class="col-sm-4">
              <input type="text" style="cursor: pointer" readonly class="form-control" id="valid_from" name="valid_from" placeholder="Valid Form">
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Valid Till</label>
            <div class="col-sm-4">
              <input type="text" style="cursor: pointer" readonly class="form-control" id="valid_to" name="valid_to" placeholder="Valid Till">
            </div>
            <div class="col-sm-offset-0 col-sm-12 bottom-button" align="right">
                <button type="button" class="btn btn-default" onclick="submitAddcard();">Submit</button>
            </div>
        </div>
        <div class="clearfix"></div>

        </form>
  </div>


  </div>
                        </table>
                    </div>
                </div>
                <!-- Panels End -->
            </div>
            <!-- Inner Container End -->

 <?php include 'admin_footer.php';?>

<script>
    $(document).ready(function() {
        $('#valid_from').datepicker({
            minDate :new Date(),
            inline :true
        });
        $('#valid_to').datepicker({
            minDate :new Date(),
            inline :true
        });
    });
</script>