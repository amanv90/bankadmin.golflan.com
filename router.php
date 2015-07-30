<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 */
require_once 'includes/config.php';
require_once 'includes/constants.php';

function __autoload($sClassName) {
    if (file_exists('classes/' . $sClassName . '.php')) {
        require_once('classes/' . $sClassName . '.php');
    } else if (file_exists(DEPLOY_PATH . 'classes/' . $sClassName . '.php')) {
        require_once(DEPLOY_PATH . 'classes/' . $sClassName . '.php');
    }
}

function closeDBConnections() {
    //DbConn::closeConnections();
}

register_shutdown_function('closeDBConnections');
