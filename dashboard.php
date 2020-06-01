<!DOCTYPE html>
<?php
session_start();
include 'security.php';
include 'moreSecurity.php' ?>
<html>
<head>
  <title>Dashboard</title>
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
  <meta charset="utf-8">
</head>
<body>

  <div id="myNotification" class="sideNotification">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNotification()">&times;</a>
    <hr>
  </div>

  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#" title="Create a new bill" id="modalBtn" style="font-size: 1vw;">Bill+</a>
    <hr>
    <a href="#" title="Create a new group" id="modalBtnTwo" style="font-size: 1vw;">Group+</a>
    <hr>
    <a href="logout.php" title="Logout" style="font-size: 1vw;" >Logout</a>
    <hr>
  </div>

  <div id="main">

  <div class="header">
    <span class="menu" style="font-size:30px; cursor:pointer" title="Menu" onclick="openNav()">&#9776;</span>
    <center><h1><div class="">Bill$plitter</div></h1></center>
    <i onclick="location.href = 'guide.php';" class="material-icons" title="Help">help</i>

    </div>

    <div class="modal" id="simpleModal">
      <div class="modal-content">
        <div class="closebtn" id="closebtnOne">
          &times;
        </div>

        <center><h2>Create a new bill</h2></center>
        <hr>
        <form class="form" id="creatBill">
          <b>Name</b><br>
          <input class="inputForm" type="text" name="billName" id="billName" placeholder="Enter the name of the bill" value=""><br>
          <b>Description</b><br>
          <textarea class="inputForm" name="description" maxlength="250" id="description" placeholder="Description of maximum 250 characters" rows="8" cols="70"></textarea><br>
          <b>Amount (£)</b><br>
          <input class="inputForm" type="number" step="0.01" min="0" name="originalBillAmount" id="originalBillAmount" placeholder="Enter the bill amount" value=""><br>
          <b>User's email</b><br>
          <input class="inputForm" type="email" name="userGroupEmail" id="userGroupEmail" placeholder="Enter the email of user you want to add to the bill" value=""><br>
          <!-- <input type="hidden" name="bill_id" id="billID" value=""> -->
          <button type="button" title="addUser" name="addUser" id="addUser">Add user or group to the bill</button> <br>

          <center><table id="user"><tr></tr></table></center>

          <button type="submit" name="saveBill" id="saveBill">Create Bill</button>

        </form>

      </div>

    </div>

    <div class="modal" id="simpleModalTwo">
      <div class="modal-content">
        <div class="closebtn" id="closebtnTwo">
          &times;
        </div>

        <center><h2>Create a new group</h2> </center>
        <hr>
        <form class="form" id="createGroup">
          <b>Group Name</b><br>
          <input class="inputForm" type="text" name="groupName" id="groupName" placeholder="Enter the name of the group" value=""><br>
          <b>Description of the group</b><br>
          <textarea class="inputForm" name="description" id="groupDescription" maxlength="250" placeholder="Description of maximum 250 characters" rows="8" cols="70"></textarea><br>
          <b>User's email</b><br>
          <input class="inputForm" type="email" name="groupUserEmail" id="groupUserEmail" placeholder="Enter the email of the user you want to add to the group" value=""><br>
          <button type="button" title="addGroupUser" name="addGroupUser" id="addGroupUser">Add user to the group</button> <br>

          <center><table id="groupUser"><tr></tr></table></center>

          <button type="submit" name="saveGroup" id="saveGroup ">Create Group</button>


        </form>
      </div>

    </div>

    <div class="textbox" style="height:80%; width:90%;">

    <!-- </div> -->
      <div class="flexbox">
        <div>
        <h2 style="position: fixed; margin-left: 30%; margin-top: 20%; bottom: 80%;"> Welcome <?php include 'displayName.php'; ?></h2>
      </div>
      <div class="childTextbox">
        <h3>The$e are your bill$</h3>
        <hr>
        <!-- style="left: 2%; height:100%;" -->
        <?php include 'displayBills.php'; ?>

      </div>

      <div class="childTextbox">
        <h3>Here are the bill$ that you created</h3>
        <hr>
        <!-- style="left: 26%; bottom: 29%; height:100%; -->
        <?php include 'displayAdminsBills.php'; ?>
      </div>

      <div class="childTextbox">
        <h3>Here are the groups you're part of</h3>
        <hr>
        <?php include 'displayGroup.php' ?>
        <!-- style="left: 51%; bottom: 58%; height:100%;" -->
      </div>


      <div id="display" class="childTextbox">
        <h3>Your Da$hboard</h3>
        <hr>
         <!-- style="left: 75%; bottom: 24%; height:70%;" -->
      </div>
    </div>


    </div>

  </div>


    <script src="sidebar.js"></script>
  </body>
  </html>
