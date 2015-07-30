<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GolfCourse
 *
 * @author user
 */
class GolfCourse extends Dbop{
    private $dbConn;

    //put your code here
    public function __construct($db = 1) {
        $this->dbConn = $db;
    }

    public function __deconstruct() {
        
    }
    
    public function getGolfCourses($name) {
        $query = "select  GID, GCName, Address, City, Country, Description, ImgURL, CompAvl, PaidAvl from golfCourseMaster ";
	$query .= " where (GCName LIKE '%".$name."%' OR City LIKE '%".$name."%' OR Country LIKE '%".$name."%') AND ((isActive=1 AND CoachingAvil=1) OR (isActive=1 AND CoachingAvil=0)) order by GCName";
        $valArr = $this->select($query, '', $this->dbConn);
        return $valArr;
    }
    
    public function getGolfCourseByID($gid) {
        $query = "select * from golfCourseMaster ";
	$query .= " where GID = ".$gid." order by GCName";
        $valArr = $this->select($query, '', $this->dbConn);
        return $valArr[0];
    }
    
    public function getSlotPrice($gid, $priceName){
        $query = "select gcm.Price, gcm.ListPrice from paidGolfCourseMeta gcm,paidGolfCoursePrice gcp where gcm.GID = ? AND PriceName = ? and gcm.PriceID = gcp.PriceID";
        $valArr = $this->select($query, array($gid, $priceName), $this->dbConn);
        return $valArr[0];
    }
    
    public function checkSlotAvail($userID, $slotType){
        $query = "select count(1) as count from webUserCards where User_ID = ? AND ".$slotType." > 0";
        $valArr = $this->select($query, array($userID), $this->dbConn);
        return $valArr[0]['count'];
    }
    
    function checkAlreadyBooked($gid, $userID, $cardNo, $slottime){
        $query = "select count(1) as count from compGolfCourseBook where GID = ? AND User_ID = ? AND  CardNo = ? AND date(dateOfPlay) = ?";
        $valArr = $this->select($query, array($gid, $userID, $cardNo, $slottime), $this->dbConn);
        return $valArr[0]['count'];
    }
    
    public function bookSlot($gid, $userID, $cardNo, $dateOfPlay){
        $query = "INSERT INTO compGolfCourseBook (GID, USER_ID, CardNo, dateRequest, dateOfPlay, slotOfPlay, bookingStatus) VALUES (?, ?, ?, now(), ?, ?, ?)";
        $valArr = $this->insert($query, array($gid, $userID, $cardNo, $dateOfPlay, $dateOfPlay, "Pending"), $this->dbConn);
        return $valArr;
    }
    
    public function updateAvailGames($slotType, $userID, $cardNo ){
        $query = "UPDATE webUserCards set $slotType = ($slotType - 1) WHERE User_ID = ? AND  CardNo = ?";
        return $this->update($query, array($userID, $cardNo), $this->dbConn);
    }
    
    public function bookPayNPlaySlot($gid, $userID, $tempDate, $time, $tot_amt){
        $book_status = "pending";
        $pay_status = "payment pending";
        $query = "INSERT INTO paidGolfCourseBook (GID, USER_ID, dateRequest, dateOfPlay, slotOfPlay, totAmount, bookingStatus, payStatus) VALUES (?, ?, now(), ?, ?, ?, ?, ?)";
        $valArr = $this->insert($query, array($gid, $userID, $tempDate, $time, $tot_amt, $book_status, $pay_status), $this->dbConn);
        return $valArr;
    }
    
    function checkAlreadyBookedPayNPlay($gid, $userID, $date, $slottime){
        $query = "select count(1) as count from paidGolfCourseBook where GID = ? AND User_ID = ? AND date(dateOfPlay) = ? AND slotOfPlay = ?";
        $valArr = $this->select($query, array($gid, $userID, $date,  $slottime), $this->dbConn);
        return $valArr[0]['count'];
    }
    
    function getDetailsForPayment($book_id){
        $query = "select totAmount from paidGolfCourseBook where BookID = ?";
        $valArr = $this->select($query, array($book_id), $this->dbConn);
        return $valArr[0];
    }
    
    function updateBookingAndPaymentStatus($book_ID){
        $book_status = "booked";
        $pay_status = "payment received";
        $query = "UPDATE paidGolfCourseBook set bookingStatus = ?, payStatus = ? WHERE BookID = ? ";
        return $this->update($query, array( $book_status, $pay_status, $book_ID), $this->dbConn);
    }
    
    
    function getGolfCourseSlots($gid){
        $query = "select * from slotMaster where GID = ?";
        $valArr = $this->select($query, array($gid), $this->dbConn);
        return $valArr;
    }
    
    function getGolferCards(){
        $query = "select * from gCardMaster";
        $valArr = $this->select($query, array($gid), $this->dbConn);
        return $valArr;
    }
    
    function getPayPlayGolfCourseSlots($gid){
        $query = "select * from paidGolfCourseBook where GID = ?";
        $valArr = $this->select($query, array($gid), $this->dbConn);
        return $valArr;
    }
    function insertFourBall($book_ID, $name, $email, $contact, $bookedByUserID){
        $query = "INSERT INTO fourBallMaster (BookID, fourBallName, fourBallEmail, fourBallPhoneNum, bookedByUserID) VALUES (?, ?, ?, ?, ?)";
        $valArr = $this->insert($query, array($book_ID, $name, $email, $contact, $bookedByUserID), $this->dbConn);
        return $valArr;
    }
    
    function updateFourBallIDs($book_ID, $sql){
        $query = "UPDATE paidGolfCourseBook set ".$sql." WHERE BookID = ? ";
        return $this->update($query, array($book_ID), $this->dbConn);
    }
}
