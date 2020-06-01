<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
session_start();
include 'database.php';
include 'security.php';
include 'moreSecurity.php';
$database = new Database();
$payAmount = security($_POST['payBill']);

$billID = security($_POST['billId']);
$userID = security($_POST['userId']);
$currentAmount = security($_POST['currentamount']);


if ($payAmount > $currentAmount){
  echo -1; //If the user tries to pay more than they need to.
}
else if (empty($payAmount)){
  echo - 2; //If the user doesn't enter anything in the pay input.
}
else{
  $currentAmount = round(($currentAmount - $payAmount),2);
  // echo $currentAmount;
  $stmt = $database->prepare("UPDATE userBills SET currentAmount = :currentAmount WHERE userID = :userID AND billID = :billID");
  $stmt->bindValue(':currentAmount', $currentAmount, SQLITE3_BLOB);
  $stmt->bindValue(':userID',$userID, SQLITE3_INTEGER);
  $stmt->bindValue(':billID', $billID, SQLITE3_INTEGER);
  $payResult = $stmt->execute();

  $billCurrentAmount = $database->prepare("SELECT * FROM bills WHERE id = :billID");
  $billCurrentAmount->bindValue(':billID', $billID, SQLITE3_INTEGER);
  $billCurrentAmountResult = $billCurrentAmount->execute();
  $bill = $billCurrentAmountResult->fetchArray();
  $updateCurrentAmount = $bill['currentAmount'] - $payAmount;
  // echo $updateCurrentAmount;
  $updateBill = $database->prepare("UPDATE bills SET currentAmount = :currentAmount WHERE id = :billID");
  $updateBill->bindValue(':currentAmount', $updateCurrentAmount, SQLITE3_INTEGER);
  $updateBill->bindValue(':billID',$billID, SQLITE3_INTEGER);
  $billResult = $updateBill->execute();

  $smt = $database->prepare("SELECT * FROM userBills WHERE userID = :userID AND billID= :billID");
  $smt->bindValue(':userID', $userID, SQLITE3_INTEGER);
  $smt->bindValue(':billID', $billID, SQLITE3_INTEGER);
  $result = $smt->execute();
  $row = $result->fetchArray();

 echo json_encode($row);

}
?>
