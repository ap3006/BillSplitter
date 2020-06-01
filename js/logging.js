$(document).ready(function() {
  $("#login").submit(function(){
    $.ajax({
      url:"logging.php",
      type: "POST",
      data: {"email": $("#email").val(), "password": $("#password").val()},
      success: function(e){
        console.log(e);
        if(e == "1"){
          alert("Please enter email and/or password");
       }else if(e == "2"){
        //  $(".loginError").append("<li> Invalid User </li>");
          alert("Incorrect email or password");
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
