<?php
  // session_start();
  include "database.php";
  include "moreSecurity.php";
  $database = new Database();
  if(empty($_POST["email"]) || empty($_POST["password"])){
    echo "1";
}else{
  session_start();
  // include "database.php";
  $email = security($_POST["email"]);
  $password = security($_POST["password"]);
  // $database = new Database();
  // $row = $database->querySingle("SELECT * FROM users WHERE email= ");
  $stmt = $database->prepare("SELECT * FROM users WHERE email= :email");
  $stmt->bindValue(':email', $email, SQLITE3_TEXT);
  $results  = $stmt->execute();
  $row = $results->fetchArray();
  if (sha1($row['salt']."--".$password) == $row['encryptedPassword']) {
    $_SESSION['id'] = $row['id'];
    echo "3";
    // header("Location: dashboard.php");
  }
  else{
    echo "2";

  }
}
?>
