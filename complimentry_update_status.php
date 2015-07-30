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
	//$update_proshopcategorymaster_table = $admin->update_proshopcategorymaster_table($temp,$parent_cat_id); 
    } elseif ($action == Cancelled) {
            
        $updateComplimentaryStatus = $admin->updateComplimentaryCancelStatus($action, $Book_ID);
    }	 

header('Location: ' . $_SERVER['HTTP_REFERER']);
		
?>


