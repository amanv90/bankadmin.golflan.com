<?php
    require_once 'router.php';
    $action = $_GET['action'];
//    if(!isset($_SESSION)){
//        session_start();
//        $_SESSION['database'] = DB1;
//    }else {
//        
//    }
//    
    $admin = new Admin(1);
    switch($action) {
        case  "checkAdminExist" :
            $returnArr =array();
            $returnArr["error"] = 0;
            //$name = $_GET['term'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $checkUser = $admin->checkUserExist($username);
            $exist = $admin->checkAdminExist($username, $password);
            if($exist == 0){
                $returnArr['error'] = 1;
                $returnArr['error_msg'] = "";
                echo json_encode($returnArr);
                exit;
            }
            setcookie('username', $username, time() + (86400 * 30), "/");
            unset($_SESSION['data']);
            echo json_encode($returnArr);
            exit;
        break;
        case  "logout" :
            setcookie('username', '', time()-3600);
            //if(!isset($_SESSION)){
                session_destroy();
            //}
            header('Location: login.php');
            break;
        case  "updateComplimentaryStatus" :
            $returnArr =array();
            $returnArr["error"] = 0;
            $book_ID = $_GET['book_ID'];
            $status =$_GET['status'];
            $admin->updateComplimentaryStatus($status, $book_ID);
            echo json_encode($returnArr);
            exit;
            break;
        case  "addGolferCard" :
//            error_log(print_r($_POST,1));
             $returnArr =array();
            $returnArr["error"] = 0;
            $card_type = $_POST['card_type'];
            $card_number = $_POST['card_number'];
            $valid_from = $_POST['valid_from'];
            $valid_to = $_POST['valid_to'];
            $valid_from = date("Y-m-d H:i:s", strtotime($valid_from));
            $valid_to = date("Y-m-d H:i:s", strtotime($valid_to));
            $checkCardExist = $admin->checkCardExist($card_number);
            if($checkCardExist == 1){
                $returnArr['error'] = 1;
                $returnArr['error_msg'] = "This Card Number already exist.\n";
                echo json_encode($returnArr);exit;
            }
            $admin->createGolferCard($card_type, $card_number, $valid_from, $valid_to);
            echo json_encode($returnArr);
            exit;
            break;
        case "getUsersBySearch" :
            $name = $_GET['term'];
            $returnArr =$admin->getUsersBySearch($name);
            header("Content-type: application/json");
            echo json_encode($returnArr);
            break;
     default:
    break;
    } 
?>