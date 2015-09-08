<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

DEFINE("FROM_EMAIL_ID",'customer.care@golflan.com');
DEFINE("MAIL_CC",'dhruv@golflan.com, neha.sharma@golflan.com, manish.rastogi@golflan.com, anjani.mishra@golflan.com');
//DEFINE("MAIL_CC",'');

// --------[INDIA]------------
DEFINE("INDIA_PremiumAndRegular",0);
DEFINE("INDIA_TrophyPrice",4000);
DEFINE("INDIA_TrophyPlusPrice",6000);
DEFINE("INDIA_NoDaysAdvance",4);
// --------- [UAE] -----------
        

DEFINE("MERCHANT_ID",'M_ver19164_19164');
DEFINE("CURRENT_WORKING_KEY",'9cvoxs1u21ct1tftj2');
DEFINE("REDIRECT_URL",'http://www.golflan.com/redirecturl.php');
DEFINE("CHECK_ONLY_COMP_GAMES_INDIA", true);


DEFINE("VOUCHER_ACTIVE", 1);
DEFINE("VOUCHER_REEDEMED", 2);
DEFINE("VOUCHER_APPLICABLE_TO_ALL_GOLFCOURSES", 0);


//----- Status ---------//
define('BOOKING_STATUS_PENDING', 0);
define('BOOKING_STATUS_CONFIRMED', 1);
define('BOOKING_STATUS_CANCELLED_BY_ADMIN', 2);
define('BOOKING_STATUS_CANCELLED_BY_USER', 3);