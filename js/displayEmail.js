var userArray = Array();
$(document).ready(function() {
  $("#addUser").click(function() {
    $.ajax({
      url: "getUserEmail.php",
      type: "POST",
      data: {email: $("#userGroupEmail").val()},
      success: function(e){
        // alert(e);
        if (e == -3){
          alert("The user does not exist");
          $("#userGroupEmail").val("");
        }
        else if(e == -2){
          alert("You need to enter an email to add to the bill");
          $("#userGroupEmail").val("");
        }
        else if(e == -1){
          alert("You cannot enter yourself into the bill");
        }
        else{
          if(userArray.indexOf($("#userGroupEmail").val()) == -1 ){
            userArray.push($("#userGroupEmail").val());
            $("#user tr:last").after("<tr id='"+e+"'><td><div title='Delete user' id='"+e+"' style='font-size:2vw;' class='remove' >&times;</div></td><td style='font-size: 1vw;'>" + $("#userGroupEmail").val().toLowerCase() + "</td></tr>");
            $("#userGroupEmail").val("");
          }
          else {
            alert("User has already been added");
            $("#userGroupEmail").val("");
          }
        }
      }
    });
  });
    // return false;

    $(document).on("click", ".remove", function() {
      // alert(event.target.id);
      $("#"+event.target.id).remove();
      $.ajax({
        url: "removeUserBill.php",
        type: "POST",
        data: {userID: event.target.id},
        success: function(e) {
          // console.log(userArray);
          // alert(userArray);
          userArray.splice(userArray.indexOf(e),1);
          // console.log(userArray);
          // alert(userArray);
        }
      });
    });

});
