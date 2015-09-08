<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author user
 */
class Admin extends Dbop{
    private $dbConn;
    public $dbCon;

    //put your code here
    public function __construct($test) {
        //$this->dbConn = $db;
        $this->dbConn = $test;
        session_start();
    }

    public function __deconstruct() {
        
    }
    
    
    public function checkUserExist($userName){
        $test = unserialize(DATABASE_ARRAY);
        foreach ($test as $x => $x_value){
//            switch($x) {
//                case "DB1" :
//             $this->dbConn = $x_value ;
                    
//                break;
//                case "DB2":
//                    $this->dbConn = $x_value ;
//                break;
//            default :
//                $this->dbConn = 1;
//                break;
//            }
            error_log("dbconn value ::;".$x_value);
            $query = "select count(1) as count from internalUserMaster where Email = ?;";
            $valArr = $this->select($query, array($userName), $x_value);
            error_log("test val ue dod ayyaru".$valArr[0]['count']);
            if($valArr[0]['count'] == 1){
                session_start();
                //$this->dbConn = $ter;
                $_SESSION['databasess']['database'][] = $x_value;
                $this->dbCon = $x_value;
                $_SESSION['data'] = $x_value;
            }
        }
        
        return $this->dbCon;
    }

    public function checkAdminExist($email, $password){
        $encryptedPassword = md5($password);
        $query = "select count(1) as count from internalUserMaster where Email = ? AND  PasswordHash = ?;";
        $valArr = $this->select($query, array($email, $encryptedPassword), $_SESSION['data']);
        return $valArr[0]['count'];
    }
    
    public function getComplimentaryBookings(){
        $query = "select gcb.*, gcm.GCName confirmedGC, gcm1.GCName GC1, gcm2.GCName GC2, icm.EMAIL ,icm.Login_Name from golfCourseMaster gcm1, golfCourseMaster gcm2,  compGolfCourseBook gcb 
                   left join webUserMaster icm on gcb.User_ID = icm.USER_ID
                   Left join golfCourseMaster gcm on gcb.confirm_GID = gcm.GID 
                   where gcb.GID_OPT1 = gcm1.GID AND gcb.GID_OPT2 = gcm2.GID;";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
    public function getCheckDatabase($key_value, $array ){
        foreach ($array as $key => $value) {
            foreach ($value as $database => $value_2)
            {
                foreach ($value_2 as $value3){
                    if ($value3 == $key_value){
                        return $key_value;
                    }
                }
            }
        }
        return NULL;
    }
    
    public function getPlayBookings(){
         $query = "select gcb.*, gcm.GCName confirmedGC, gcm1.GCName GC1, gcm2.GCName GC2, icm.EMAIL ,icm.Login_Name from golfCourseMaster gcm1, golfCourseMaster gcm2,  compGolfCourseBook gcb 
                   left join webUserMaster icm on gcb.User_ID = icm.USER_ID
                   Left join golfCourseMaster gcm on gcb.confirm_GID = gcm.GID 
                   where gcb.GID_OPT1 = gcm1.GID AND gcb.GID_OPT2 = gcm2.GID AND booking_type = 0; ";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
    
    public function getLearnBookings(){
         $query = "select gcb.*, gcm.GCName confirmedGC, gcm1.GCName GC1, gcm2.GCName GC2, icm.EMAIL ,icm.Login_Name from golfCourseMaster gcm1, golfCourseMaster gcm2,  compGolfCourseBook gcb 
                   left join webUserMaster icm on gcb.User_ID = icm.USER_ID
                   Left join golfCourseMaster gcm on gcb.confirm_GID = gcm.GID 
                   where gcb.GID_OPT1 = gcm1.GID AND gcb.GID_OPT2 = gcm2.GID AND booking_type = 1; ";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	public function getComplimentaryBookingsPending(){
        $query = "select gcb.*, gcm.GCName confirmedGC, gcm1.GCName GC1, gcm2.GCName GC2, icm.EMAIL ,icm.Login_Name from golfCourseMaster gcm1, golfCourseMaster gcm2,  compGolfCourseBook gcb 
                   left join webUserMaster icm on gcb.User_ID = icm.USER_ID
                   Left join golfCourseMaster gcm on gcb.confirm_GID = gcm.GID 
                   where gcb.GID_OPT1 = gcm1.GID AND gcb.GID_OPT2 = gcm2.GID AND gcb.bookingStatus = 0;";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
		
	public function getProShoptrans2($orderID){
        $query = "select * from proshoptrans where orderID=$orderID";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	public function getProShopMaster(){
        $query = "select * from proShopMaster";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	//public function delete_proshopmaster_through_prodID($prod_id){
    //    $query = "delete from proShopMaster WHERE prodID = ? ";
     //   return $this->delete($query, array($prod_id), $this->dbConn);
    //}
	
	public function getProShopMaster1($temp_prodID){
        $query = "SELECT * FROM proShopMaster WHERE prodID LIKE '".$temp_prodID."'";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	public function getProShopAttributePriceMap($temp_prodID){
        $query = "SELECT * FROM proShopAttributePriceMap WHERE prodID LIKE '".$temp_prodID."'";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	public function getProShopAttributePriceMapByPriceMapID($priceMapID){
        $query = "SELECT * FROM proShopAttributePriceMap WHERE priceMapID LIKE '".$priceMapID."'";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	public function setProShopAttributePriceMap8($prodID,$attributeID1,$attributeID2,$attributeID3,$attributeID4,$Description1,$Description2,$Description3,$Description4,$listPrice,$ourPrice,$stockOnHand,$isActive,$dealApplicable,$dealID){
        $query = "INSERT INTO `proShopAttributePriceMap` (prodID,attributeID1,attributeID2,attributeID3,attributeID4,Description1,Description2,Description3,Description4,listPrice,ourPrice,stockOnHand,isActive,dealApplicable,dealID) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";
        $valArr = $this->insert($query, array($prodID,$attributeID1,$attributeID2,$attributeID3,$attributeID4,$Description1,$Description2,$Description3,$Description4,$listPrice,$ourPrice,$stockOnHand,$isActive,$dealApplicable,$dealID), $this->dbConn);
        return $valArr;
    }
	
	//public function delete_proshopattributepricemap_through_priceMapID($priceMapID){
   //     $query = "delete from proShopAttributePriceMap WHERE priceMapID = ? ";
    //    return $this->delete($query, array($priceMapID), $this->dbConn);
    //}
	
	
	public function updateProShopAttributePriceMap2($attributeID1,$Description1,$attributeID2,$Description2,$attributeID3,$Description3,$attributeID4,$Description4,$listPrice,$ourPrice,$dealApplicable,$dealID,$stockOnHand,$isActive,$priceMapID){
        $query = "UPDATE proShopAttributePriceMap set attributeID1 = '".$attributeID1."',Description1='".$Description1."',attributeID2='".$attributeID2."',Description2='".$Description2."',attributeID3='".$attributeID3."',Description3='".$Description3."',attributeID4='".$attributeID4."',Description4='".$Description4."',listPrice='".$listPrice."',ourPrice='".$ourPrice."',dealApplicable='".$dealApplicable."',dealID='".$dealID."',stockOnHand='".$stockOnHand."',isActive='".$isActive."',stockOnHand='".$stockOnHand."',stockOnHand='".$stockOnHand."' WHERE priceMapID = '".$priceMapID."'";
        return $this->update($query, array($attributeID1,$Description1,$attributeID2,$Description2,$attributeID3,$Description3,$attributeID4,$Description4,$listPrice,$ourPrice,$dealApplicable,$dealID,$stockOnHand,$isActive,$priceMapID), $this->dbConn);
    }
	
	
	
	public function setProShopCategoryMaster(){
        $query = "select * from proShopCatgoryMaster";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	public function getProShopMasterTitle ($title){
        $query = "SELECT * FROM proShopMaster WHERE Title LIKE '".$title."'";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	public function updateProShopMaster($Title,$Description,$FeatureRanking,$imgURL,$brandName,$Category,$subCategory,$prodID){
        $query = "UPDATE proShopMaster set Title = '".$Title."',Description='".$Description."',FeatureRanking='".$FeatureRanking."',imgURL='".$imgURL."',brandName='".$brandName."',Category='".$Category."',subCategory='".$subCategory."' WHERE prodID = '".$prodID."'";
        return $this->update($query, array($Title,$Description,$FeatureRanking,$imgURL,$brandName,$Category,$subCategory,$prodID), $this->dbConn);
    }
	
	public function setProShopProducts5($Title,$Description,$FeatureRanking,$brandName,$select1,$isActive){
        $query = "INSERT INTO `proShopMaster` (Title,Description,FeatureRanking,brandName,Category,isActive) VALUES (?,?,?,?,?,?) ";
        $valArr = $this->insert($query, array($Title,$Description,$FeatureRanking,$brandName,$select1,$isActive), $this->dbConn);
        return $valArr;
    }
	
	public function setvouchermaster($VoucherNumber,$Description,$Amount,$issued_Date,$expiry_Date,$voucherType,$LobApplicable,$GIDApplicable,$numTimesAllowed){
        $query = "INSERT INTO `vouchermaster` (VoucherNumber,Description,Amount,issuedDate,expiaryDate,voucherType,LobApplicable,GIDApplicable,numTimesAllowed) VALUES (?,?,?,?,?,?,?,?,?) ";
        $valArr = $this->insert($query, array($VoucherNumber,$Description,$Amount,$issued_Date,$expiry_Date,$voucherType,$LobApplicable,$GIDApplicable,$numTimesAllowed), $this->dbConn);
        return $valArr;
    }
	
	public function getVoucherMaster() {
        $query = "SELECT * FROM VoucherMaster";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	public function getVoucherMasterVoucherID($voucherID) {
        $query = "SELECT * FROM VoucherMaster where voucherID = ".$voucherID."";
        $valArr = $this->select($query, array($voucherID), $this->dbConn);
        return $valArr;
    }
	
	function updateVoucherMaster($VoucherNumber,$Description,$VoucherNumber,$Amount,$LobApplicable,$GIDApplicable,$issuedDate,$expiaryDate,$numTimesAllowed,$numTimesUsed,$Status,$voucherID){
        $query = "UPDATE VoucherMaster set VoucherNumber = '".$VoucherNumber."',Description = '".$Description."',VoucherNumber = '".$VoucherNumber."',Amount = '".$Amount."',LobApplicable = '".$LobApplicable."',GIDApplicable = '".$GIDApplicable."',issuedDate = '".$issuedDate."',expiaryDate = '".$expiaryDate."',numTimesAllowed = '".$numTimesAllowed."',numTimesUsed = '".$numTimesUsed."',Status = '".$Status."' WHERE voucherID = '".$voucherID."'";
        return $this->update($query, array($VoucherNumber,$Description,$VoucherNumber,$Amount,$LobApplicable,$GIDApplicable,$issuedDate,$expiaryDate,$numTimesAllowed,$numTimesUsed,$Status,$voucherID), $this->dbConn);
    }
	

	public function setProShopCategoryMaster1($temp,$cat_name){
        $query = "INSERT INTO proShopCatgoryMaster (isParentCategory,Description) VALUES ('$temp','$cat_name') ";
        $valArr = $this->insert($query, array($temp,$cat_name), $this->dbConn);
        return $valArr;
    }
	
	public function setProShopCategoryMaster4($cat_id,$sub_cat_name){
        $query = "INSERT INTO proShopCatgoryMaster (isParentCategory,isSubCategory,parentCategoryID,Description) VALUES ('0','1','$cat_id','$sub_cat_name') ";
        $valArr = $this->insert($query, array($temp,$cat_name), $this->dbConn);
        return $valArr;
    }
    
	public function getProShopCategoryMaster($cat_id){
        $query = "SELECT * FROM proShopCatgoryMaster WHERE catID LIKE '".$cat_id."'";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	public function updateProShopCategoryMaster($temp,$parent_cat_id){
        $query = "UPDATE proShopCatgoryMaster set Description = ? WHERE catID = ? ";
        return $this->update($query, array($temp,$parent_cat_id), $this->dbConn);
    }
	
	public function deleteProShopCategoryMaster($cat_id){
        $query = "delete from proShopCatgoryMaster WHERE catID = ? ";
        return $this->delete($query, array($cat_id), $this->dbConn);
    }
	
	public function setProShopAttributes(){
        $query = "select * from proShopAttributes";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	public function setProShopAttibutes($Description){
        $query = "INSERT INTO proShopAttributes (Description) VALUES ('$Description') ";
        $valArr = $this->insert($query, array($Description), $this->dbConn);
        return $valArr;
    }
	
	public function updateProShopAttributes($temp,$parent_cat_id){
        $query = "UPDATE proShopAttributes SET Description=? WHERE attributeID=?";
        return $this->update($query, array($temp,$parent_cat_id), $this->dbConn);
    }
	
	public function deleteProShopAttributes($des){
        $query = "delete from proShopAttributes WHERE attributeID = ? ";
        return $this->delete($query, array($des), $this->dbConn);
    }
	
    public function getPayNPlayBookings(){
        $query = "select * from paidGolfCourseBook;";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	public function getpaynplay_support_1($GID){
        $query = "SELECT GCName FROM golfCourseMaster WHERE GID LIKE '".$GID."'";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	public function getpaynplay_support_2($User_ID){
        $query = "SELECT * FROM webUserMaster WHERE User_ID LIKE '".$User_ID."'";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	public function getpaynplay_support_3($cardtype_id){
        $query = "SELECT * FROM gCardMaster WHERE CardTypeID LIKE '".$cardtype_id."'";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
    
    public function getBookingDetailsByID($booking_ID){
        //$query = "select cgcb.*, gcm1.GCName as GC1, gcm2.GCName as GC2, gcm3.GCName as confirmGolfCourse, wum.Login_Name, wum.Email from compGolfCourseBook cgcb, golfCourseMaster gcm1, golfCourseMaster gcm2, webUserMaster wum, golfCourseMaster gcm3  WHERE cgcb.BookID = ? and cgcb.GID_OPT1 = gcm1.GID and cgcb.GID_OPT2 = gcm2.GID AND cgcb.User_ID = wum.User_ID AND gcm3.GID = cgcb.confirm_GID;";
        $query = "SELECT gcb. * , gcm.GCName confirmGolfCourse, gcm1.GCName GC1, gcm2.GCName GC2, icm.EMAIL, icm.Login_Name
                  FROM golfCourseMaster gcm1, golfCourseMaster gcm2, compGolfCourseBook gcb
                  LEFT JOIN webUserMaster icm ON gcb.User_ID = icm.USER_ID
                  LEFT JOIN golfCourseMaster gcm ON gcb.confirm_GID = gcm.GID
                  WHERE gcb.GID_OPT1 = gcm1.GID
                  AND gcb.GID_OPT2 = gcm2.GID
                  AND gcb.BookID =?";
        $valArr = $this->select($query, array($booking_ID), $this->dbConn);
        return $valArr[0];
    }
    
   public function updateComplimentaryStatus($action, $GID_ID, $Book_ID){
        $confirmed = BOOKING_STATUS_CONFIRMED;
        $query = "UPDATE compGolfCourseBook set bookingStatus = ? , confirm_GID = ? WHERE BookID = ? ";
        return $this->update($query, array($confirmed, $GID_ID, $Book_ID), $this->dbConn);
    }
    
   public function updateComplimentaryCancelStatus($action, $Book_ID){
        $confirmed = BOOKING_STATUS_CANCELLED_BY_ADMIN;
        $query = "UPDATE compGolfCourseBook set bookingStatus = ? , confirm_GID = 0 WHERE BookID = ? ";
        return $this->update($query, array($confirmed, $Book_ID), $this->dbConn);
    }
    
    
    
    public function createGolferCard($card_type, $card_number, $valid_from, $valid_to){
        $query = "INSERT INTO webUserCards (CardTypeID, CardNo, ValidFrom, ValidTill) VALUES (?, ?, ?, ?)";
        $valArr = $this->insert($query, array($card_type, $card_number, $valid_from, $valid_to), $this->dbConn);
        return $valArr;
    }
    
    public function getUsersBySearch($name) {
        $query = "select * from webUserMaster ";
		$query .= " where (Email LIKE '%".$name."%' OR Login_Name LIKE '%".$name."%' OR FName LIKE '%".$name."%' OR LName LIKE '%".$name."%')";
        $valArr = $this->select($query, '', $this->dbConn);
        return $valArr;
    }
    
    public function getUsersIDByBookID($bookID) {
        $query = "select USER_ID, confirm_GID, dateOfPlay, slotOfPlay from compGolfCourseBook where BookID = ?; ";
	$valArr = $this->select($query, array($bookID), $this->dbConn);
        return $valArr;
    }
    
    public function getUsersDetails($user_id) {
        $query = "select Email from webUserMaster where User_ID = ?; ";
	$valArr = $this->select($query, array($user_id), $this->dbConn);
        return $valArr;
    }
    
    public function getGolfCourseName($gid) {
        $query = "select GCName, City from golfCourseMaster where GID = ?; ";
	$valArr = $this->select($query, array($gid), $this->dbConn);
        return $valArr;
    }
    
    public function checkCardExist($card_number){
        $query = "select count(1) as count from webUserCards  where CardNo = ?;";
        $valArr = $this->select($query, array($card_number), $this->dbConn);
        return $valArr[0]['count'];
    }
	
	public function getWebUserMaster() {
        $query = "select * from webUserMaster ";
        $valArr = $this->select($query, '', $this->dbConn);
        return $valArr;
    }
	
	public function getWebUserMasterByEmail($email_id) {
        $query = "SELECT * FROM webUserMaster WHERE Email LIKE '".$email_id."'";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	public function getWebUserMasterByCardNo($CardNo) {
        $query = "SELECT * FROM webUserMaster WHERE CardNo LIKE '".$CardNo."'";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	public function getWebUserMasterByUserID($User_id) {
        $query = "SELECT * FROM webUserMaster WHERE User_ID LIKE '".$User_id."'";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	function updateWebUserMaster($LoginName,$FirstName,$LastName,$Email,$Mobile,$City,$State,$ZipCode,$Country,$Address,$Gender,$CardType,$CardNo,$PasswordHash,$Password,$DOB,$UserID){
        $query = "UPDATE webUserMaster set Login_Name = '".$LoginName."',Fname='".$FirstName."',Lname='".$LastName."',Email='".$Email."',Mobile='".$Mobile."',City='".$City."',State='".$State."',ZipCode='".$ZipCode."',Country='".$Country."',Address='".$Address."',Gender='".$Gender."',CardTypeID='".$CardType."',CardNo='".$CardNo."',PasswordHash='".$PasswordHash."',Password='".$Password."',DOB='".$DOB."' WHERE User_ID = '".$UserID."'";
        return $this->update($query, array($LoginName,$FirstName,$LastName,$Email,$Mobile,$City,$State,$ZipCode,$Country,$Address,$Gender,$CardType,$CardNo,$PasswordHash,$Password,$DOB,$UserID), $this->dbConn);
    }
	
	public function setgCardMaster(){
        $query = "select * from gCardMaster";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	public function setWebUserMaster($Login_Name,$FName,$LName,$Email,$Mobile,$City,$State,$ZipCode,$Country,$Address,$Gender,$CardTypeID,$CardNo,$PasswordHash,$Password,$D_O_B){
        $query = "INSERT INTO `webUserMaster` (Login_Name,Fname,Lname,Email,Mobile,City,State,ZipCode,Country,Address,Gender,CardTypeID,CardNo,PasswordHash,Password,DOB) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";
        $valArr = $this->insert($query, array($Login_Name,$FName,$LName,$Email,$Mobile,$City,$State,$ZipCode,$Country,$Address,$Gender,$CardTypeID,$CardNo,$PasswordHash,$Password,$D_O_B), $this->dbConn);
        return $valArr;
    }
	
	public function getWebUserMasterEmail ($Email){
        $query = "SELECT * FROM webUserMaster WHERE Email LIKE '".$Email."'";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	public function setWebUserCards($User,$Card_ID,$Card_No,$Valid_From,$Valid_Till,$AvlCompGames,$AvlLearnSessions,$AvlAssistSessions,$AvlGlobalSessions,$AvlTrophyGames,$isActive,$AvlPNRGames,$Date_Add,$Activated_On,$Renewed_On,$CountryOrigin){
        $query = "INSERT INTO `webUserCards` (User_ID,CardTypeID,CardNo,ValidFrom,ValidTill,AvlCompGames,AvlLearnSessions,AvlAssistSessions,AvlGlobalSessions,AvlTrophyGames,isActive,AvlPNRGames,DateAdded,ActivatedOn,RenewedOn,CountryOrigin) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";
        $valArr = $this->insert($query, array($User,$Card_ID,$Card_No,$Valid_From,$Valid_Till,$AvlCompGames,$AvlLearnSessions,$AvlAssistSessions,$AvlGlobalSessions,$AvlTrophyGames,$isActive,$AvlPNRGames,$Date_Add,$Activated_On,$Renewed_On,$CountryOrigin), $this->dbConn);
        return $valArr;
    }
	
	public function getWebCardByUserID($User_id) {
        $query = "SELECT * FROM webUserCards WHERE User_ID LIKE '".$User_id."'";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	function updateWebUserCards($CardTypeID,$CardNo,$ValidFrom,$ValidTill,$AvlCompGames,$AvlLearnSessions,$AvlAssistSessions,$AvlGlobalSessions,$AvlTrophyGames,$isActive,$DateAdded,$ActivatedOn,$RenewedOn,$CountryOrigin,$UserID){
        $query = "UPDATE webUserCards set CardTypeID = '".$CardTypeID."',CardNo='".$CardNo."',ValidFrom='".$ValidFrom."',ValidTill='".$ValidTill."',AvlCompGames='".$AvlCompGames."',AvlLearnSessions='".$AvlLearnSessions."',AvlAssistSessions='".$AvlAssistSessions."',AvlGlobalSessions='".$AvlGlobalSessions."',AvlTrophyGames='".$AvlTrophyGames."',isActive='".$isActive."',DateAdded='".$DateAdded."',ActivatedOn='".$ActivatedOn."',RenewedOn='".$RenewedOn."',CountryOrigin='".$CountryOrigin."' WHERE User_ID = '".$UserID."'";
        return $this->update($query, array($CardTypeID,$CardNo,$ValidFrom,$ValidTill,$AvlCompGames,$AvlLearnSessions,$AvlAssistSessions,$AvlGlobalSessions,$AvlTrophyGames,$isActive,$DateAdded,$ActivatedOn,$RenewedOn,$CountryOrigin,$UserID), $this->dbConn);
    }
	
	public function getproShopOrderMaster() {
        $query = "SELECT * FROM proShopOrderMaster";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	public function getproShopTrans() {
        $query = "SELECT * FROM proShopTrans";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	public function getproShopTransOrderID($Order_id) {
        $query = "SELECT * FROM proShopTrans where orderID = ".$Order_id."";
        $valArr = $this->select($query, array(), $this->dbConn);
        return $valArr;
    }
	
	PUBLIC function updateproShopTrans($shipStatus,$Renewed_On,$OrderID){
        $query = "UPDATE proShopTrans set shipStatus = '".$shipStatus."',shipDate = '".$Renewed_On."' WHERE orderID = '".$OrderID."'";
        return $this->update($query, array($shipStatus,$Renewed_On,$OrderID), $this->dbConn);
    }
    
    public function sendMail($subject, $body, $to){
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();                                      // Set mailer to use SMTP
        $this->mail->Host = SMTP_HOST;  // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = SMTP_AUTH;                               // Enable SMTP authentication
        $this->mail->Username = SMTP_USERNAME;              // SMTP username
        $this->mail->Password = SMTP_PASSWORD;                           // SMTP password
        $this->mail->SMTPSecure = SMTP_SECURE;                            // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = SMTP_PORT;                                    // TCP port to connect to
        $this->mail->From = FROM_EMAIL_ID;
        $this->mail->FromName = FROM_EMAIL_NAME;
        $this->mail->addReplyTo(SMTP_REPLY_EMAIL_ID, SMTP_REPLY_NAME);
        $this->mail->mailCC =  explode(",", MAIL_CC);
            foreach($this->mail->mailCC as $cc) {
                error_log(trim($cc));
                $this->mail->addCC(trim($cc));
            }
            $this->mail->isHTML(true);  
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
            $this->mail->addAddress($to); // Add a recipient
            $this->mail->send();
    }
}
