<?php
include_once 'router.php';
    $username = "";
    if (isset($_COOKIE['username']) &&  ($_COOKIE['username']!='')){
        $username = $_COOKIE['username'];
    }else{
        header('Location: login.php');
    }
    if (!isset($_SESSION)){
        session_start();
    }
    
?>
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/themer.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<title>GolfLan Admin - Dashboard</title>

</head>

<body>

	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<img src="../images/logo.png" alt="mws admin">
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello, <?php echo $username;?>
                    </div>
                    <ul>
                    	<li><a href="#">Profile</a></li>
                        <li><a href="#">Change Password</a></li>
                        <li><a href="javascript:void(0)" onclick="window.location.href='admin.php?action=logout'">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <!-- Searchbox -->
<!--            <div id="mws-searchbox" class="mws-inset">
            	<form action="typography.html">
                    <input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>-->
            
            <!-- Main Navigation -->
<ul id="nav">
   <?php
    $bank_array = unserialize(BANK_NAME_ARRAY);
    $bank_array_menu = unserialize(BANK_NAME_MENU);
    $url_array = unserialize(SERVICE_ARRAY);
    
    //$test = array(1=>'Axix Bank', 2=>'Rakbank');
    foreach ($_SESSION as $key => $value) {
        foreach ($value as $database => $value_2)
        {
            foreach ($value_2 as $value3){ ?>
                <li><a href="#"><?php echo $bank_array[$value3] ?></a>
			<ul>
							<li <?php if($active =="dashboard"){echo 'class="active"'; }?>><a href="dashboard.php"><i class="icon-list"></i><?php echo $bank_array_menu[$value3][0]; ?></a></li>
							<li <?php if($active =="complimentary"){echo 'class="active"'; }?>><a href="complimentary.php?service=<?php echo $url_array[$value3]; ?>"><i class="icon-list"></i> <?php echo $bank_array_menu[$value3][1]; ?></a></li>
							<ul>
							<li> <a href="complimentary_pending.php?service=<?php echo $url_array[$value3]; ?>"><i class="icon-list"></i><?php echo $bank_array_menu[$value3][2]; ?></a> </li>
							</ul>
                                                        <li> <a href="play_booking.php?service=<?php echo $url_array[$value3]; ?>"><i class="icon-list"></i><?php echo $bank_array_menu[$value3][3]; ?></a> </li>
                                                        <li> <a href="learn_booking.php?service=<?php echo $url_array[$value3]; ?>"><i class="icon-list"></i><?php echo $bank_array_menu[$value3][4]; ?></a> </li>
						<!--	<li <?php //if($active =="paynpaly"){echo 'class="active"'; }?>><a href="paynplay.php"><i class="icon-list"></i> Pay N Play</a></li> -->
							  
			</ul>
                </li>
           <?php }
        }
    }
   
 ?>
  <!--	<li><a href="#"><i class="icon-shopping-cart"></i>Proshop</a>
			<ul>
							<li <?php if($active =="ManageCategories"){echo 'class="active"'; }?>><a href="ManageCategories.php"><i class="icon-shopping-cart"></i> Manage Categories</a></li>
							<li <?php if($active =="ManageCategories"){echo 'class="active"'; }?>><a href="ManageAttribute.php"><i class="icon-shopping-cart"></i> Manage Attribute</a></li>
							
							<li <?php if($active =="ManageProducts"){echo 'class="active"'; }?>><a href="ManageProducts.php"><i class="icon-shopping-cart"></i> Manage Products</a></li>
							<li <?php if($active =="Proshop"){echo 'class="active"'; }?>><a href="Proshop_order.php"><i class="icon-shopping-cart"></i> Proshop Order</a></li>
							
			</ul>
	</li><a href="#"><i class="icon-globe"></i>Golfer Card</a>
			<ul>
							<li <?php if($active =="add_card"){echo 'class="active"'; }?>><a href="addnewcard.php"><i class="icon-add-contact"></i> Add New Golfer Card</a></li>
							<li <?php if($active =="link_card"){echo 'class="active"'; }?>><a href="new_link_card.php"><i class="icon-globe"></i> Manage Golfer Card</a></li>
			</ul>		-->
		<!--	<a href="#"><i class="icon-lastfm"></i>Voucher</a>
			<ul>
							<li <?php if($active =="ManageVoucher"){echo 'class="active"'; }?>><a href="ManageVoucher.php"><i class="icon-lastfm"></i> Manage Voucher</a></li>
							<li <?php if($active =="addVoucher"){echo 'class="active"'; }?>><a href="addVoucher.php"><i class="icon-lastfm"></i>Add Voucher</a></li>
			</ul>	-->
  
</ul>
            <div id="mws-navigation">

		
			
			
			
			
             <!-- <ul>
				 <li class="dropdown">
                        <a href="admin_header.php"><span class="icon-home"></span> Booking</a>
                        <ul style="display: block;">
                     <li <?php if($active =="dashboard"){echo 'class="active"'; }?>><a href="dashboard.php"><i class="icon-list"></i> Dashboard</a></li>
                    <li <?php if($active =="complimentary"){echo 'class="active"'; }?>><a href="complimentary.php"><i class="icon-list"></i> Complimentary</a></li>
                    <li <?php if($active =="paynpaly"){echo 'class="active"'; }?>><a href="paynplay.php"><i class="icon-list"></i> Pay N Play</a></li></ul>
                       
                    </li> </ul>
				<!--	<ul>
				 <li class="active">
                        <a href><i class="icon-shopping-cart"></i> Proshop</a>
                        <ul> -->
                  <!--  <li <?php if($active =="ManageCategories"){echo 'class="active"'; }?>><a href="ManageCategories.php"><i class="icon-home"></i> Manage Categories</a></li>
					<li <?php if($active =="ManageCategories"){echo 'class="active"'; }?>><a href="ManageAttribute.php"><i class="icon-home"></i> Manage Attribute</a></li>
					<li <?php if($active =="ManageCategories"){echo 'class="active"'; }?>><a href="AddProducts.php"><i class="icon-home"></i> Add Product</a></li> </ul>
                       
                                 </li> </ul> -->
                  <!--  <li <?php if($active =="dashboard"){echo 'class="active"'; }?>><a href="dashboard.php"><i class="icon-home"></i> Dashboard</a></li>
                    <li <?php if($active =="complimentary"){echo 'class="active"'; }?>><a href="complimentary.php"><i class="icon-home"></i> Complimentary</a></li>
                    <li <?php if($active =="paynpaly"){echo 'class="active"'; }?>><a href="paynplay.php"><i class="icon-home"></i> Pay N Play</a></li></ul>
					<ul> -->
                <!--    <li <?php if($active =="add_card"){echo 'class="active"'; }?>><a href="add_card.php"><i class="icon-home"></i> Add New Golfer Card</a></li>
                    <li <?php if($active =="link_card"){echo 'class="active"'; }?>><a href="link_card.php"><i class="icon-home"></i> Link Golfer Card</a></li>
                                        <li <?php if($active =="ManageCategories"){echo 'class="active"'; }?>><a href="ManageCategories.php"><i class="icon-home"></i> Manage Categories</a></li>
					<li <?php if($active =="ManageCategories"){echo 'class="active"'; }?>><a href="ManageAttribute.php"><i class="icon-home"></i> Manage Attribute</a></li>
					<li <?php if($active =="ManageCategories"){echo 'class="active"'; }?>><a href="AddProducts.php"><i class="icon-home"></i> Add Product</a></li>
					
					 
					 -->
					
					<!--                   


 <li><a href="charts.html"><i class="icon-graph"></i> Charts</a></li>
                    <li><a href="calendar.html"><i class="icon-calendar"></i> Calendar</a></li>
                    <li><a href="files.html"><i class="icon-folder-closed"></i> File Manager</a></li>
                    <li><a href="table.html"><i class="icon-table"></i> Table</a></li>
                    <li>
                        <a href="#"><i class="icon-list"></i> Forms</a>
                        <ul>
                            <li><a href="form_layouts.html">Layouts</a></li>
                            <li><a href="form_elements.html">Elements</a></li>
                            <li><a href="form_wizard.html">Wizard</a></li>
                        </ul>
                    </li>
                    <li><a href="widgets.html"><i class="icon-cogs"></i> Widgets</a></li>
                    <li><a href="typography.html"><i class="icon-font"></i> Typography</a></li>
                    <li><a href="grids.html"><i class="icon-th"></i> Grids &amp; Panels</a></li>
                    <li><a href="gallery.html"><i class="icon-pictures"></i> Gallery</a></li>
                    <li><a href="error.html"><i class="icon-warning-sign"></i> Error Page</a></li>
                    <li>
                        <a href="icons.html">
                            <i class="icon-pacman"></i> 
                            Icons <span class="mws-nav-tooltip">2000+</span>
                        </a>
                    </li>-->
                </ul>
            </div> 
			
        </div>
	
 <!-- JavaScript Plugins -->
    <script src="js/libs/jquery-1.8.3.min.js"></script>
    <script src="js/libs/jquery.mousewheel.min.js"></script>
    <script src="js/libs/jquery.placeholder.min.js"></script>
    <script src="custom-plugins/fileinput.js"></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script src="jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="jui/jquery-ui.custom.min.js"></script>
    <script src="jui/js/jquery.ui.touch-punch.js"></script>
    <script src="jui/js/timepicker/jquery-ui-timepicker.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="plugins/imgareaselect/jquery.imgareaselect.min.js"></script>
    <script src="plugins/jgrowl/jquery.jgrowl-min.js"></script>
    <script src="plugins/validate/jquery.validate-min.js"></script>
    <script src="plugins/colorpicker/colorpicker-min.js"></script>

    <!-- Core Script -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="js/demo/demo.widget.js"></script>

		<!-- JavaScript Plugins -->
    <script src="js/libs/jquery-1.8.3.min.js"></script>
    <script src="js/libs/jquery.mousewheel.min.js"></script>
    <script src="js/libs/jquery.placeholder.min.js"></script>
    <script src="custom-plugins/fileinput.js"></script>

    <!-- jQuery-UI Dependent Scripts -->
  
    <!-- Plugin Scripts -->
     
		</body>
			
</html>
<script>
$(document).ready(function () {
  $('#nav > li > a').click(function(){
    if ($(this).attr('class') != 'active'){
      $('#nav li ul').slideUp();
      $(this).next().slideToggle();
      $('#nav li a').removeClass('active');
      $(this).addClass('active');
    }
  });
});
</script>
