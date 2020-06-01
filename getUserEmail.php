<?php
// error_reporting(E_ALL);
// ini_set("display_errors",1);
session_start();
include 'database.php';
include 'security.php';
include 'moreSecurity.php';
$database = new Database();

if(empty($_POST['email'])){
  echo -2;
}
else{
  $stmt = $database->prepare("SELECT * FROM users WHERE email= :email");
  $stmt->bindValue(":email",security($_POST['email']),SQLITE3_TEXT);
  $results = $stmt->execute();
  $row = $results->fetchArray();

  if($row){
    if ($_SESSION['id'] == $row['id']){
      echo -1;
    }
    else{
      echo $row['id'];
    }
  }
  else{
    echo -3;
  }
}

?>
