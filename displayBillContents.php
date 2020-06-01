<?php
// error_reporting(E_ALL);
// ini_set("display_errors",1);
session_start();
include 'database.php';
include 'security.php';
include 'moreSecurity.php';
$database = new Database();

$userID = security($_POST["userid"]);
$billID = security($_POST["billid"]);
$currentAmount = security($_POST["currentAmount"]);
// echo($userID);
// echo("break");
// echo($billID);
// echo $currentAmount;

if ($currentAmount == 0){
  $stmt = $database->prepare("UPDATE userBills SET isComplete = :isComplete WHERE userID= :userID AND billID = :billID");
  $stmt->bindValue(':isComplete', 1, SQLITE3_INTEGER);
  $stmt->bindValue(':userID', $userID, SQLITE3_INTEGER);
  $stmt->bindValue(':billID', $billID, SQLITE3_INTEGER);
  $result = $stmt->execute();
  echo -1;
}
else{
  $stmt = $database->prepare("SELECT * FROM userBills WHERE userID= :userID AND billID= :billID");
  $stmt->bindValue(':userID', $userID, SQLITE3_INTEGER);
  $stmt->bindValue(':billID', $billID, SQLITE3_INTEGER);
  $results = $stmt->execute();
  $row = $results->fetchArray();

  // echo $row;
  echo json_encode($row);
}
?>
