<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

// include 'security.php';
// include 'moreSecurity.php';
include 'database.php';
$database = new Database();

function assembleJsonArray($arrToConvert)
{
    $jsonStr = '[';
    for($i = 0; $i < count($arrToConvert) - 1; $i++)
    {
        $jsonStr = $jsonStr.$arrToConvert[$i].',';
    }
    return $jsonStr.$arrToConvert[count($arrToConvert) - 1].']';
}

$billID = $_POST['billadminid'];

$stmt = $database->prepare("SELECT * FROM userBills WHERE billID = :billID");
$stmt->bindValue(':billID', $billID, SQLITE3_INTEGER);
$result = $stmt->execute();

$jsonArray = array();

while ($row = $result->fetchArray(SQLITE3_ASSOC)){
  array_push($jsonArray,json_encode($row));
}

echo assembleJsonArray($jsonArray);


?>
