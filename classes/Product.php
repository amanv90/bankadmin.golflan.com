<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author user
 */
class Product extends Dbop {
    //put your code here
    
    //put your code here
    private $dbConn;

    //put your code here
    public function __construct($db = 1) {
        $this->dbConn = $db;
    }

    public function __deconstruct() {
        
    }
    
    public function getFeatureProduct() {
        $query = "select  Title, ROUND(ListPrice,2) ListPrice ,ROUND(OurPrice,2) OurPrice, dealID, Discount, imgURL from proShopMaster ";
	$query .= " order by FeatureRanking asc limit 10";
        $valArr = $this->select($query, '', $this->dbConn);
        return $valArr;
    }
}
