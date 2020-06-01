<?php
// error_reporting(E_ALL);
// ini_set("display_errors",1);
session_start();
include 'database.php';
include 'security.php';
include 'moreSecurity.php';

$database = new Database();
$billName = security($_POST['billName']);
$description = security($_POST['description']);
$originalAmount = security($_POST['billAmount']);
// $currentAmount = security($_POST["billAmount"]);
$adminID = $_SESSION['id'];
//echo $adminID;
$adminName = $database->querySingle("SELECT * FROM users where id= ".$adminID.";");
// echo $adminName['name'];
$isSaved = 0;
// $userEmail = security($_POST["userGroupEmail"]);
// $billID = security($_POST["bill_id"]);
// $database = new Database();
$userArray = $_POST['userArray'];
// echo $userArray;


function calculateEqualBill($userarray,$originalamount){
  $arraysize = sizeOf($userarray) + 1;
  return round(($originalamount / $arraysize),2);
}

if (empty($billName) || empty($description) || empty($originalAmount) || $userArray == false){
  echo 1;
}
else{
  // echo(calculateEqualBill($userArray,$originalAmount));
  $stmt = $database->prepare("INSERT INTO bills VALUES(NULL, :name, :description, :originalAmount, :currentAmount, :isSaved, :adminID)");
  $stmt->bindValue(':name', $billName, SQLITE3_TEXT);
  $stmt->bindValue(':description', $description, SQLITE3_TEXT);
  $stmt->bindValue(':originalAmount', $originalAmount, SQLITE3_BLOB);
  $stmt->bindValue(':currentAmount', round($originalAmount - calculateEqualBill($userArray,$originalAmount),2), SQLITE3_BLOB);
  $stmt->bindValue(':isSaved', $isSaved, SQLITE3_INTEGER);
  $stmt->bindValue(':adminID', $adminID, SQLITE3_INTEGER);
  $results = $stmt->execute();
  $query = $database->querySingle("SELECT last_insert_rowid()");
  $billID = $query["last_insert_rowid()"];

  $isComplete = 0;

  foreach ($userArray as &$value) {
    $stmt = $database->prepare("SELECT * FROM users WHERE email= :email");
    $stmt->bindValue(':email',$value, SQLITE3_TEXT);
    $results = $stmt->execute();
    $row = $results->fetchArray();
    $stmt = $database->prepare("INSERT INTO userBills(id, userID, userName, billID, billName, billAdminName, billDescription, originalAmount, currentAmount, isComplete) VALUES (NULL,:userID, :userName, :billID, :billName, :billAdminName, :billDescription, :originalAmount, :currentAmount, :isComplete)");
    $stmt->bindValue(":userID", $row['id'], SQLITE3_INTEGER);
    $stmt->bindValue(":userName", $row['name'], SQLITE3_TEXT);
    $stmt->bindValue(":billID", $billID, SQLITE3_INTEGER);
    $stmt->bindValue(":billName",$billName, SQLITE3_TEXT);
    $stmt->bindValue(":billAdminName",$adminName['name'], SQLITE3_TEXT);
    $stmt->bindValue(":billDescription",$description, SQLITE3_TEXT);
    $stmt->bindValue(":originalAmount",calculateEqualBill($userArray,$originalAmount),SQLITE3_BLOB);
    $stmt->bindValue(":currentAmount",calculateEqualBill($userArray,$originalAmount), SQLITE3_BLOB);
    $stmt->bindValue(":isComplete",$isComplete, SQLITE3_INTEGER);
    $results = $stmt->execute();

    $name = $adminName['name'];
    $msg = "$name added you to a bill, log in to check how much you have to owe them!";
    mail($row['email'],"You received a new bill!",$msg);

  }

}
?>
