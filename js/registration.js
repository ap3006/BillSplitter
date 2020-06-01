$(document).ready(function() {
  $("#register").submit(function(){
    $.ajax({
      url:"registering.php",
      type: "POST",
      data: {"name": $("#name").val(), "email": $("#email").val(), "password": $("#password").val(), "confirm_password": $("#confirm_password").val()},
      success: function(e){
        // console.log(e);
        if(e == "1"){
          alert("Please fill in all the fields");
       }else if(e == "2"){
        //  $(".loginError").append("<li> Invalid User </li>");
          alert("The password you entered does not match with the confirmation password.");
       }else if(e == "4"){
         alert("The email has already been registered");
       }
       else if(e == "-1"){
         alert("The email entered is invalid");
       }
       else{
        //  alert("This is fine");
         window.location = "dashboard.php";
      }
    }

    });
    return false;
  });

});
