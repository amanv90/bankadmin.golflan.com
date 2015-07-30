<?php
include 'router.php';
$admin = new Admin(DB1);
//session_start["cart_item"];
						if((isset($_POST["voucherID"]))&&(!empty($_POST["voucherID"])))
						{
							$voucherID=$_POST['voucherID'];
							//echo $prodID;
							$voucherID = $_POST['voucherID'];
							$Description = $_POST['Description'];
							$VoucherNumber = $_POST['VoucherNumber'];
							$Amount = $_POST['Amount'];
							$LobApplicable = $_POST['LobApplicable'];
							$GIDApplicable = $_POST['GIDApplicable'];
							$issuedDate = $_POST['issuedDate'];
							$expiaryDate = $_POST['expiaryDate'];
							$numTimesAllowed = $_POST['numTimesAllowed'];
							$numTimesUsed = $_POST['numTimesUsed'];
							$Status = $_POST['Status'];
							$updateVoucherMaster = $admin->updateVoucherMaster($VoucherNumber,$Description,$VoucherNumber,$Amount,$LobApplicable,$GIDApplicable,$issuedDate,$expiaryDate,$numTimesAllowed,$numTimesUsed,$Status,$voucherID); 
						}
		
			
	header('Location: ' . 'ManageVoucher.php');		
?>