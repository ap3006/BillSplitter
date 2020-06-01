<?php
  include 'database.php';
  include 'moreSecurity.php';

  if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["confirm_password"])){
    // header("Location: registrationPage.php");
    echo "1";
  }
  else{
    $name = security($_POST["name"]);
    $email = security($_POST["email"]);
    $password = security($_POST["password"]);
    $confirmPassword = security($_POST["confirm_password"]);
    $database = new Database();
    // $database = new Database();

    $unique = $database->prepare("SELECT * FROM users WHERE email= :email ");
    $unique->bindValue(':email', $email, SQLITE3_TEXT);
    $results = $unique->execute();
    $row = $results->fetchArray();
    if ($row){
      echo "4";
    }
    else{
      if ($password == $confirmPassword) {

        $salt = sha1(time());
        $encryptedPassword = sha1($salt."--".$password);


        $stmt = $database->prepare("INSERT into users VALUES(NULL, :name, :email, :encryptedPassword, :salt)");
        $stmt->bindValue(':name',$name, SQLITE3_TEXT);
        $stmt->bindValue(':email',$email, SQLITE3_TEXT);
        $stmt->bindValue(':encryptedPassword', $encryptedPassword, SQLITE3_TEXT);
        $stmt->bindValue(':salt',$salt,SQLITE3_TEXT);
        $results = $stmt->execute();

        $msg  ="Thanks for registering to BillSplitter,$name";

        mail($email,"Thanks for registering",$msg);

        $stmt = $database->prepare("SELECT * FROM users where email= :email");
        $stmt->bindValue(':email',$email,SQLITE3_TEXT);
        $results = $stmt->execute();

        while($row=$results->fetchArray()){
          session_start();
          $_SESSION['id'] = $row['id'];
          // header('Location: dashboard.php');
          echo "3";
        }

      }
      else{
        // header('Location: registrationPage.php');
        echo "2";
      }
    }

  }
 ?>
