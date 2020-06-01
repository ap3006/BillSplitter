<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

// include 'database.php';
include 'security.php';
include 'moreSecurity.php';
$database = new Database();

$userID = $_SESSION['id'];

$stmt = $database->prepare("SELECT * FROM bills WHERE adminID= :adminID");
$stmt->bindValue(':adminID', $userID, SQLITE3_INTEGER);
$results = $stmt->execute();

while($row = $results->fetchArray()){
  echo '
  <form method="post" class="displayadminbill">
    <input type="hidden" name="useradminid" id="useradminid" value="'.$userID.'">
    <input type="hidden" name"billadminid" class="billadminid" value="'.$row["id"].'">
    <button type="submit">'.$row['name'].'</button>
  </form>';
}

?>
