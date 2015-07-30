

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<link rel="stylesheet" type="text/css" href="css/boostarp-admin.css" media="screen">
	<?php

//    include 'router.php';
//    $admin = new Admin(DB1);
//    $compBookingsArr = $admin->getComplimentaryBookings();
//    echo "<pre>";
//    print_r($compBookingsArr);
?>

<?php
    $active ="link_card";
    include 'admin_header.php';
?>

        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">

        	<!-- Inner Container Start -->
        <div class="container" style="padding-top: 2%">

            <div class="mws-panel mws-panel-margin-bot  grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i> Link Golfer Card</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-datatable mws-table">

                            <div class="bs-example-back-color1 col-lg-12 padding-off " data-example-id="condensed-table">

    <div class="bs-example" data-example-id="simple-horizontal-form">
    <form class="form-horizontal">
     <div class="col-sm-10  col-sm-offset-2 h4-padding-bot"><h5><strong>Choose User And Then Press Tab</strong></h5></div>

	 <div class="clearfix"></div>
	 <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label ">Choose User</label>
        <div class="col-sm-10 ">
          <input type="text" class="form-control" id="user" placeholder="Start Typing User Name Or Email ID">
          <input type="hidden" value="" id="user_id" name="user_id">
        </div>
      </div>
	</form>
  </div>


  </div>


                        </table>
                    </div>

                </div>
			<div class="col-lg-6 bs-example-back-color1 width-table-b1  padding-off " data-example-id="condensed-table">

    <div class="bs-example" data-example-id="simple-horizontal-form">
    <div class="">
<!--		<div class="col-lg-2 image-top-p"><img src=" "   width="150" height="150"/></div>-->



<div class="">

<div class="col-lg-8">
<div class="text-style"><strong>Name: </strong><span id="name">Sagnik kanjilal</span></div>
<div class="text-style"><strong>Email: </strong><span id="email">sagnikkanjilal@gmail.com</span></div>
<div class="text-style"><strong>Member Since: </strong> 12 April 2014</div>
<div class="text-style"><strong>GolferCard No: </strong>RCS00752</div>
<div class="text-style"><strong>Golfer Card Expiry: </strong>19 jan 2016</div>
<div class="col-lg-5 padding-link-b text-style"><strong>Enter Card No: </strong></div><div class="col-lg-4 padding-link-b"><input type="text" class="" id="inputEmail3" placeholder="" style="width: 110px;"></div><div class="col-lg-2 padding-link-b col-lg-push-1"><button class="btn btn-default"> Link Card</button></div>
</div>

</div>


</div>
  </div>


  </div>
                <!-- Panels End -->
            </div>
            <!-- Inner Container End -->

 <?php include 'admin_footer.php';?>
<script>
    $("#user").autocomplete({
        source: "admin.php?action=getUsersBySearch&name='"+$('#user').val()+"'",
//                minLength: 0,
        select: function(event, ui) {
            event.preventDefault();
            $('#user').val(ui.item.Email);
            $('#user_id').val(ui.item.User_ID);
            $('#name').html(ui.item.FName +" "+ui.item.LName);
            $('#email').html(ui.item.Email);
        }
    })
        .data("uiAutocomplete")._renderItem = function(ul, item) {
                    return $("<li></li>")
            .data("item.autocomplete", item)
            .append("<a>" + item.Email + "</a>")
            .appendTo(ul);
        }
</script>