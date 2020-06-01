<?php
// error_reporting(E_ALL);
// ini_set("display_errors",1);
session_start();
include 'database.php';
include 'security.php';
include 'moreSecurity.php';

$database = new Database();
$groupName = security($_POST['groupName']);
$groupDescription = security($_POST['groupDescription']);

$adminID = $_SESSION['id'];

$adminName = $database->querySingle("SELECT * FROM users WHERE id= ".$adminID.";");
// echo $adminName['name'];
$groupUserArray = $_POST['groupUserArray'];

if (empty($groupName) || empty($groupDescription) || $groupUserArray == false){
  echo 1;
}
else {
  $stmt = $database->prepare("INSERT INTO groups VALUES(NULL, :groupName, :groupAdminID, :description)");
  $stmt->bindValue(':groupName',$groupName,SQLITE3_TEXT);
  $stmt->bindValue(':groupAdminID', $adminID, SQLITE3_INTEGER);
  $stmt->bindValue(':description',$groupDescription,SQLITE3_TEXT);
  $results = $stmt->execute();
  $query = $database->querySingle("SELECT last_insert_rowid()");
  $groupID = $query["last_insert_rowid()"];

  $stmt = $database->prepare("INSERT INTO userGroup(id, userID, userName, groupID, groupName, groupDescription, groupAdminName) VALUES(NULL,:userID, :userName,:groupID,:groupName, :groupDescription, :groupAdminName)");
  $stmt->bindValue(":userID", $adminID, SQLITE3_INTEGER);
  $stmt->bindValue(":userName",$adminName['name'], SQLITE3_TEXT);
  $stmt->bindValue(":groupID", $groupID, SQLITE3_INTEGER);
  $stmt->bindValue(":groupName", $groupName, SQLITE3_TEXT);
  $stmt->bindValue(":groupDescription",$groupDescription, SQLITE3_TEXT);
  $stmt->bindValue(":groupAdminName",$adminName['name'], SQLITE3_TEXT);
  $results = $stmt->execute();

  foreach ($groupUserArray as &$value) {
    $stmt = $database->prepare("SELECT * FROM users where email= :email");
    $stmt->bindValue(':email', $value, SQLITE3_TEXT);
    $results = $stmt->execute();
    $row = $results->fetchArray();
    // echo $groupName;
    $stmt = $database->prepare("INSERT INTO userGroup(id, userID, userName, groupID, groupName, groupDescription, groupAdminName) VALUES(NULL,:userID, :userName,:groupID, :groupName, :groupDescription, :groupAdminName)");
    $stmt->bindValue(":userID", $row['id'], SQLITE3_INTEGER);
    $stmt->bindValue(":userName",$row['name'], SQLITE3_TEXT);
    $stmt->bindValue(":groupID", $groupID, SQLITE3_INTEGER);
    $stmt->bindValue(":groupName", $groupName, SQLITE3_TEXT);
    $stmt->bindValue(":groupDescription", $groupDescription, SQLITE3_TEXT);
    $stmt->bindValue(":groupAdminName",$adminName['name'], SQLITE3_TEXT);
    $results = $stmt->execute();

    $name = $adminName['name'];
    $msg  = "$name added you to a group, log in to check it out!";

    mail($value,"You've been added to a group!",$msg);


  }
}

?>
