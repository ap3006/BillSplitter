<!DOCTYPE html>
<html>
  <head>
    <title>Log in</title>
    <link rel="stylesheet" type="text/css " href="styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='js/logging.js'></script>
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
      <center><h1>Bill$plitter</h1></center>
      <i class="material-icons" title="Help">help</i>

    </div >

    <div class="textbox" id="login" style="flex-direction: column;">
        <center><h2>Login</h2></center>
        <center><p>Sign in to your Bill$plitter acccount.</p></center>
        <div class="">
          <hr>
        </div>
        <form class="form" method="post" id="login">
            <b>Email</b><br>
            <input class="inputForm" type="email" name="email" id="email" placeholder="Enter Email" value=""><br>
            <b>Password</b><br>
            <input class="inputForm" type="password" name="password" id="password" placeholder="Enter Password" value=""><br>
            <hr>
            <button type="submit" title="Login" name="login" id="loginSubmit">Login</button><br>
            <b>or</b><br>
            <button onclick="window.location.href='index.php'" type="button" title="" name="RegisterRedirect">Haven't got an account? Why not register now!</button>
        </form>


    </div>




  </body>
</html>
