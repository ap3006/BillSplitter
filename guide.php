<!DOCTYPE html>
<?php
session_start();
include 'security.php';
include 'moreSecurity.php' ?>
<html>
<head>
  <title>Guide</title>
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
      <i class="material-icons" title="Help">help</i>

    </div>

    <div class="textbox" style="height:80%; width:90%;">

      <div class="flexbox">
        <div>
        <h2 style="position: fixed; margin-left: 30%; margin-top: 20%; bottom: 80%;"> This is your Dashboard</h2>
      </div>
      <div class="childTextbox">
        <h3>These are your bills</h3>
        <hr>
        <h4>There will be buttons here, which have the bill name and who you owe. Below is an example<h4><br>
        <button type="button" name="button">bill name: you owe 'this person'</button><br>
        <h4>When you click on it, the bill will be displayed on the 'dashboard' box. You will be able to pay of the bill. Once paid off, don't forget to refresh to check you finally paid off. </h4>

      </div>

      <div class="childTextbox">
        <h3>Here are the bills that you created</h3>
        <hr>
        <h4>This is where all the bills you have created are going to be displayed. They will be a button which has the name of the bill like the button below.<h4><br>
        <button type="button" name="button">'bill name'</button><br>
        <h4>Once the button is clicked on, the dashboard box will show you a table of all the users part of the bill.</h4>

      </div>

      <div class="childTextbox">
        <h3>Here are the groups you're part of</h3>
        <hr>

        <h4>This is where all the groups you are part of are going to be displayed. They will be a button which has the name of the group like the button below.<h4><br>
        <button type="button" name="button">Group Name: 'group name'</button><br>
        <h4>Once the button is clicked on, the dashboard box will show you a table of all the users part of the group. On the dashboard box, any user that is part of the group has the ability to make a bill.</h4>
      </div>


      <div id="display" class="childTextbox">
        <h3>Your Dashboard</h3>
        <hr>
         <h4>This is where the you are able to pay your bills, create a bill with your group, view what bills you have created.</h4>
      </div>
    </div>


    </div>

  </div>

  </div>


    <script src="sidebar.js"></script>
  </body>
  </html>
