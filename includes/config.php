<?php

DEFINE("DEPLOY_PATH",'localhost');
define('IMG_WEB_PATH', 'localhost');
define('IMG_EMAIL_WEB_PATH', 'localhost');
DEFINE("DB_HOST",'localhost');
DEFINE("DB_NAME_AXIS",'AXISBankGolfLanDB');
DEFINE("DB_NAME_RAKBANK",'RAKBankGolfLanDB');
DEFINE("DB_USER",'root');
DEFINE("DB_PASSWORD",'root@123');
define("DB1", 1);
define("DB2", 2);
define('DATABASE_ARRAY', serialize(array('DB1'=>1,'DB2'=>2)));
$databases = array();
$databases['1'] = array('host' => DB_HOST, 'database' => DB_NAME_AXIS, 'user' => DB_USER, 'password' => DB_PASSWORD);
$databases['2'] = array('host' => DB_HOST, 'database' => DB_NAME_RAKBANK, 'user' => DB_USER, 'password' => DB_PASSWORD);

define('BANK_NAME_ARRAY', serialize(array(1=>'Axix Bank', 2=>'Rakbank')));

define('SERVICE_ARRAY', serialize(array(1 => 'axix' , 2 => 'rak')));

define('BANK_NAME_MENU', serialize(array(1=>array('Dashboard', 'Complimentary', 'Pending Requests', 'Play Booking', 'Learn Booking'), 2=>array('Dashboard', 'Complimentary', 'Pending Requests', 'Play Booking', 'Learn Booking'))));

//define('BANK_ARRAY', serialize(array('Axis Bank'=> array("Dashboard" => "1" , "Pay N Pay" => "1"))) );

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
// mysql_select_db(DB_NAME);

