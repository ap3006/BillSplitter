<?php
// error_reporting(E_ALL);
// ini_set("display_errors",1);
// session_start();
// include 'database.php';
include 'security.php';
include 'moreSecurity.php';
$database = new Database();

$userID = $_SESSION['id'];

// $stmt = $database->prepare("SELECT * FROM userBills WHERE userID= :userID");
// $stmt->bindValue(':userID', $userID, SQLITE3_INTEGER);
$stmt  = $database->prepare("SELECT bills.id, bills.name,bills.adminID,bills.currentAmount FROM bills INNER JOIN userBills ON userBills.billID=bills.id WHERE userBills.userID = :userID");
$stmt->bindValue(':userID', $userID, SQLITE3_INTEGER);
$results = $stmt->execute();

while($row = $results->fetchArray()){
  $adminID = $row['adminID'];
  // echo $adminID;
  $smt = $database->prepare("SELECT * FROM users WHERE id = :adminID");
  // echo 1;
  $smt->bindValue(':adminID',$adminID, SQLITE3_INTEGER);
  // echo "here";
  $adminResults = $smt->execute();
  $adminRow = $adminResults->fetchArray();

  $checkBill = $database->prepare("SELECT * FROM userBills WHERE userID = :userID AND billID = :billID");
  $checkBill->bindValue(':userID', $userID, SQLITE3_INTEGER);
  $checkBill->bindValue(':billID', $row["id"], SQLITE3_INTEGER);
  $checkBillResults = $checkBill->execute();
  $checkBillRow = $checkBillResults->fetchArray();
  // echo "fetch";
  echo '<form method="post" class="displayBillUser" id="'.$row["id"].'">
          <input type="hidden" id="user_id" name="userid" value="'.$userID.'">
          <input type="hidden" id="bill_id" name="billid" value="'.$row["id"].'">
          <input type="hidden" class="bill_currentAmount" id="'.$checkBillRow["currentAmount"].'" name="bill_currentAmount" value="'.$checkBillRow["currentAmount"].'">
          <button type="submit" id="displayButton">'.$row['name'].': You owe '.$adminRow['name'].'</button><br>
        </form>';
}

?>
