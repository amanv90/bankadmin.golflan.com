<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author user
 */
class User extends Dbop{
    private $dbConn;

    //put your code here
    public function __construct($db = 1) {
        $this->dbConn = $db;
    }

    public function __deconstruct() {
        
    }
    
    public function checkUserExist($email, $cardNo){
        $query = "select count(1) as count from webUserMaster wum, webUserCards wuc where wum.User_ID = wuc.User_ID AND wum.Email = ? AND wuc.CardNo = ?;";
        $valArr = $this->select($query, array($email, $cardNo), $this->dbConn);
        return $valArr[0]['count'];
    }
    
    public function getUserDetails($email, $cardNo){
        $query = "select wum.User_ID, wum.Login_Name, wum.FName, wum.LName, wum.Email, wuc.CardNo, gcm.CardName from webUserMaster wum, webUserCards wuc, gCardMaster gcm where wum.User_ID = wuc.User_ID AND wuc.CardTypeID = gcm.CardTypeID AND wum.Email = ? AND wuc.CardNo = ?;";
        $valArr = $this->select($query, array($email, $cardNo), $this->dbConn);
        return $valArr[0];
    }
    
    public function checkUserExistByEmail($email){
        $query = "select count(1) as count from webUserMaster wum where wum.Email = ?;";
        $valArr = $this->select($query, array($email), $this->dbConn);
        return $valArr[0]['count'];
    }
    
    public function insertUser($name, $email, $contact) {
        $query = "INSERT INTO webUserMaster (Login_Name, Email, Mobile) VALUES (?, ?, ?)";
        $valArr = $this->insert($query, array($name, $email, $contact), $this->dbConn);
        return $valArr;
    }
    
    public function getUserIdByEmail($email){
        $query = "select wum.User_ID  from webUserMaster wum where wum.Email = ?;";
        $valArr = $this->select($query, array($email), $this->dbConn);
        return $valArr[0]['User_ID'];
    }
    
    public function getUserDetailsByEmail($email){
        $query = "select wum.User_ID, wum.Login_Name, wum.FName, wum.LName, wum.Email from webUserMaster wum, gCardMaster gcm where wum.Email = ?;";
        $valArr = $this->select($query, array($email), $this->dbConn);
        return $valArr[0];
    }
    
    public function checkCardValidity($user_ID, $cardNo){
        $query = "select count(1) as count from webUserCards  as wuc WHERE wuc.User_ID = ? AND wuc.CardNo = ? and now() >= ValidFrom AND ValidTill >= now();";
        $valArr = $this->select($query, array($user_ID, $cardNo), $this->dbConn);
        return $valArr[0]['count'];
    }
    
    public function getUserDetailsByBookingID($book_ID){
        $query = "select wum.* from paidGolfCourseBook pgcb, webUserMaster wum WHERE pgcb.BookID = ? AND pgcb.USER_ID = wum.User_ID;";
        $valArr = $this->select($query, array($book_ID), $this->dbConn);
        return $valArr[0];
    }
}
