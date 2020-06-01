<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

include 'security.php';
include 'moreSecurity.php';
$database = new Database();

$userID = $_SESSION['id'];

$stmt = $database->prepare("SELECT groups.id, groups.groupName,groups.groupAdminID, groups.description FROM groups INNER JOIN userGroup ON userGroup.groupID = groups.id WHERE userGroup.userID = :userID  ");
$stmt->bindValue(':userID',$userID,SQLITE3_INTEGER);
$results = $stmt->execute();

while($row = $results->fetchArray()){

  echo '<form method="post" class="displayGroup" id="'.$row["id"].'">
          <input type="hidden" class="group_id" name="groupid" value="'.$row["id"].'">
          <button type="submit" id="displayButton">Group Name: '.$row['groupName'].'</button><br>
        </form>';
}


?>
