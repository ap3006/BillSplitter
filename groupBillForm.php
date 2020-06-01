<!DOCTYPE html>
<?php
session_start();
include 'security.php';
include 'moreSecurity.php' ?>
<html>
<head>
  <title>Create Group Bill</title>
  <link rel="stylesheet" type="text/css " href="styles.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/displayEmail.js"></script>
  <script src="js/displayGroupEmail.js"></script>
  <script src="js/createBill.js"></script>
  <script src="js/createGroup.js"></script>
  <script src="js/displayBillContents.js"></script>
  <script src="js/payBill.js"></script>
  <script src="js/displayAdminContent.js"></script>
  <script src="js/displayGroupContents.js"></script>
  <script src="js/createGroupBill.js"></script>
  <meta charset="utf-8">
</head>
<body>

  <div id="myNotification" class="sideNotification">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNotification()">&times;</a>
    <hr>
  </div>

  <div id="main">

  <div class="header">
    <span class="menu" style="font-size:30px; cursor:pointer" title="Back" onclick="location.href='dashboard.php'">Back</span>
    <center><h1><div class="">Bill$plitter</div></h1></center>
      <i href="guide.php" class="material-icons" title="Help">help</i>

    </div>

    <div class="textbox" style="height:60%; width:60%; flex-direction: column;">
      <h2>Create a bill for the group</h2>

      <hr>

      <?php
        $groupID = $_POST['groupID'];


      ?>

      <form class="form" id="createGroupBill">
        <b>Name</b><br>
        <input class="inputForm" type="text" name="groupBillName" id="groupBillName" placeholder="Enter the name of the bill" value=""><br>
        <b>Description</b><br>
        <textarea class="inputForm" name="description" maxlength="250" id="description" placeholder="Description of maximum 250 characters" rows="8" cols="70"></textarea><br>
        <b>Amount (£)</b><br>
        <input class="inputForm" type="number" step="0.01" min="0" name="originalGroupBillAmount" id="originalGroupBillAmount" placeholder="Enter the bill amount" value=""><br>
        <input type="hidden" id="groupID" value='<?php echo $_POST['groupID']; ?>'>

        <button type="submit" name="saveBill" id="saveBill">Create Bill</button>

      </form>




    </div>

  </div>


    <script src="sidebar.js"></script>
  </body>
  </html>
