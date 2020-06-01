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
$originalAmount = security($_POST['originalAmount']);
$groupID = security($_POST['groupID']);

$adminID = $_SESSION['id'];
$adminName = $database->querySingle("SELECT * FROM users WHERE id= ".$adminID.";");
$isSaved = 0;

function calculateEqualBill($userarray,$originalamount){
  $arraysize = sizeOf($userarray) + 1;
  return round(($originalamount / $arraysize),2);
}

if (empty($billName) || empty($description) || empty($originalAmount)){
  echo 1;
}
else{
  // $stmt = $database->prepare("INSERT INTO bills VALUES(NULL, :name, :description, :originalAmount, :currentAmount, :isSaved, :adminID)");
  // $stmt->bindValue(':name', $billName, SQLITE3_TEXT);
  // $stmt->bindValue(':description', $description, SQLITE3_TEXT);
  // $stmt->bindValue(':originalAmount', $originalAmount, SQLITE3_INTEGER);
  // $stmt->bindValue(':currentAmount', $originalAmount - calculateEqualBill($userArray,$originalAmount), SQLITE3_INTEGER);
  // $stmt->bindValue(':isSaved', $isSaved, SQLITE3_INTEGER);
  // $stmt->bindValue(':adminID', $adminID, SQLITE3_INTEGER);
  // $results = $stmt->execute();
  // $query = $database->querySingle("SELECT last_insert_rowid()");
  // $billID = $query["last_insert_rowid()"];
  //
  // $isComplete = 0;

  $stmt = $database->prepare("SELECT * FROM userGroup WHERE groupID = :groupID");
  $stmt->bindValue(':groupID',$groupID, SQLITE3_INTEGER);
  $results = $stmt->execute();

  $userArray = array();

  while ($row = $results->fetchArray()){
    $userID = $row['userID'];
    if ($userID != $adminID){
      $smt = $database->prepare("SELECT * FROM users WHERE id= :userID");
      $smt->bindValue(':userID',$userID,SQLITE3_INTEGER);
      $userResult = $smt->execute();
      $userRow = $userResult->fetchArray();

      array_push($userArray,$userRow['email']);
    }
  }
  $stmt = $database->prepare("INSERT INTO bills VALUES(NULL, :name, :description, :originalAmount, :currentAmount, :isSaved, :adminID)");
  $stmt->bindValue(':name', $billName, SQLITE3_TEXT);
  $stmt->bindValue(':description', $description, SQLITE3_TEXT);
  $stmt->bindValue(':originalAmount', $originalAmount, SQLITE3_INTEGER);
  $stmt->bindValue(':currentAmount', round($originalAmount - calculateEqualBill($userArray,$originalAmount),2), SQLITE3_INTEGER);
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
    // echo $adminName['name'];
    $stmt = $database->prepare("INSERT INTO userBills(id, userID, userName, billID, billName, billAdminName, billDescription, originalAmount, currentAmount, isComplete) VALUES (NULL,:userID, :userName, :billID, :billName, :billAdminName, :billDescription, :originalAmount, :currentAmount, :isComplete)");
    $stmt->bindValue(":userID", $row['id'], SQLITE3_INTEGER);
    $stmt->bindValue(":userName", $row['name'], SQLITE3_TEXT);
    $stmt->bindValue(":billID", $billID, SQLITE3_INTEGER);
    $stmt->bindValue(":billName",$billName, SQLITE3_TEXT);
    $stmt->bindValue(":billAdminName",$adminName['name'], SQLITE3_TEXT);
    $stmt->bindValue(":billDescription",$description, SQLITE3_TEXT);
    $stmt->bindValue(":originalAmount",calculateEqualBill($userArray,$originalAmount),SQLITE3_INTEGER);
    $stmt->bindValue(":currentAmount",calculateEqualBill($userArray,$originalAmount), SQLITE3_INTEGER);
    $stmt->bindValue(":isComplete",$isComplete, SQLITE3_INTEGER);
    $results = $stmt->execute();

    $name = $adminName['name'];
    $msg = "$name added you to a bill, log in to check how much you have to owe them!";
    mail($value,"You received a new bill!",$msg);
  }
}

?>
