<?php
include 'database.php';
$database = new Database();

$stmt = $database->prepare("SELECT * FROM users WHERE id= :id");
$stmt->bindValue(':id',$_SESSION['id'], SQLITE3_INTEGER);
$results = $stmt->execute();


while($row = $results->fetchArray()){
  echo $row["name"];
}

?>
