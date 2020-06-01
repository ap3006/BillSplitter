<!DOCTYPE html>
<html>
  <head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css " href="styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='js/registration.js'></script>
    <script src="sidebar.js"></script>
    <meta charset="utf-8">
  </head>
  <body>

    <div id="myNotification" class="sideNotification">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNotification()">&times;</a>
      <a href="#">Sign in to receive notifications</a>
      <hr>
    </div>

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="index.php">Register</a>
      <hr>
      <a href="logInPage.php">Login</a>
      <hr>

    </div>

    <div class="header">
      <span class="menu" style="font-size:30px; cursor:pointer" title="Menu" onclick="openNav()">&#9776;</span>
      <center><h1><div class="logo">Bill$plitter<div></h1></center>
      <i class="material-icons" title="Help">help</i>
    </div>

    <div class="textbox" style="flex-direction: column;">
        <center><h2>Register</h2></center>
        <center><p>Please fill the form to register to Bill$plitter.</p></center>
        <div class="">
          <hr>
        </div>
        <form class="form" method="post" id="register">
            <b>Name</b><br>
            <input class="inputForm" type="text" name="name" id="name" placeholder="Enter Name" value=""><br>
            <b>Email</b><br>
            <input class="inputForm" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="email" placeholder="Enter Email" value=""><br>
            <b>Password</b><br>
            <input class="inputForm" type="password" name="password" id="password" placeholder="Enter Password" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
            <b>Confirm Password</b><br>
            <input class="inputForm" type="password" name="confirm_password" id="confirm_password" placeholder="Enter Confirmation Password" value=""pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <hr>
            <button type="submit" title="Register" id="Register" name="Register">Register</button>

        </form>

    </div>

    <!-- <script src="sidebar.js"></script> -->

  </body>
</html>
