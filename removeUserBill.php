<?php
session_start();
include 'database.php';
include 'security.php';
include 'moreSecurity.php';
$database = new Database();

$userID = security($_POST["userID"]);
$stmt=$database->prepare("SELECT * FROM users WHERE id= :userID");
$stmt->bindValue(":userID", $userID, SQLITE3_INTEGER);
$results = $stmt->execute();
$row = $results->fetchArray();
echo $row['email'];
?>
