<?php

  include 'router.php';
  $id = $_GET['service'];
  $url_array = unserialize(SERVICE_ARRAY);
  $key = array_search($id, $url_array);
  $admin = new Admin($key);
  
    //$active ="ManageCategories";
    //include 'admin_header.php';

	$Book_ID = $_GET['Book_ID'];
        $action = $_GET['action'];
  
    if ($action == Confirmed) {    
        $GID_ID = $_GET['gid'];
	$updateComplimentaryStatus = $admin->updateComplimentaryStatus($action, $GID_ID, $Book_ID);
        $UserID = $admin->getUsersIDByBookID($Book_ID);
        $UserDetails = $admin->getUsersDetails($UserID[0]['USER_ID']);
        $confirmGC = $admin->getGolfCourseName($UserID[0]['confirm_GID']);
            $to = $UserDetails[0]['Email'];
            $subject = "Your Golf Game Request is Confirmed";
            $template = 'booking.html';
            if (file_exists("email_templates/$template")) {
                $tpl_name = "email_templates/$template";
                $buffer = file_get_contents($tpl_name);
                $html = $buffer;
                $html = str_replace("#BOOKING_ID#", $Book_ID, $html);
                $html = str_replace("#GC_NAME#", $confirmGC[0]['GCName'], $html);
                $html = str_replace("#GC_CITY#", $confirmGC[0]['City'], $html);
                $html = str_replace("#SLOT_DATE#", date("d M Y", strtotime($UserID[0]['dateOfPlay'])), $html);
                $html = str_replace("#SLOT_TIME#", $UserID[0]['slotOfPlay'], $html);
            }
            $emailTxt= $html;
          $admin->sendMail($subject, $emailTxt, $to);
	//$update_proshopcategorymaster_table = $admin->update_proshopcategorymaster_table($temp,$parent_cat_id); 
    } elseif ($action == Cancelled) {
            
        $updateComplimentaryStatus = $admin->updateComplimentaryCancelStatus($action, $Book_ID);
        $html = "";
        //------ Send Email ------------------------
        //
        $UserID = $admin->getUsersIDByBookID($Book_ID);
        $UserDetails = $admin->getUsersDetails($UserID[0]['USER_ID']);
            $to = $UserDetails[0]['Email'];
            $subject = "Your Golf Game Request is Cancelled";
            $template = 'cancellation.html';
            if (file_exists("email_templates/$template")) {
                $tpl_name = "email_templates/$template";
                $buffer = file_get_contents($tpl_name);
                $html = $buffer;
                $html = str_replace("#BOOKING_ID#", $Book_ID, $html);
          }
            $emailTxt= $html;
            $admin->sendMail($subject, $emailTxt, $to);
        //$updateComplimentaryStatus = $admin->updateComplimentaryCancelStatus($action, $Book_ID);
    }	 

header('Location: ' . $_SERVER['HTTP_REFERER']);
		
?>


