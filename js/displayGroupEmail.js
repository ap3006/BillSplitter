var groupUserArray = Array();
$(document).ready(function() {
  $("#addGroupUser").click(function() {
    $.ajax({
      url: "getUserEmail.php",
      type: "POST",
      data: {email: $("#groupUserEmail").val()},
      success: function(e){
        if (e == -3){
          alert("The user does not exist");
          $("#groupUserEmail").val("");
        }
        else if(e == -2){
          alert("You need to enter an email to add to the group");
          $("#userGroupEmail").val("");
        }
        else if(e == -1){
          alert("You're already in the group");
        }
        else{
          if(groupUserArray.indexOf($("#groupUserEmail").val()) == -1 ){
            groupUserArray.push($("#groupUserEmail").val());
            $("#groupUser tr:last").after("<tr id='"+e+"'><td><div title='Delete user' id='"+e+"' style='font-size:2vw;' class='groupremove' >&times;</div></td><td style='font-size: 1vw;'>" + $("#groupUserEmail").val().toLowerCase() + "</td></tr>");
            $("#groupUserEmail").val("");
          }
          else{
            alert("user has already been added");
            $("#groupUserEmail").val("");
          }
        }
      }
    });
  });

  $(document).on("click", ".groupremove", function() {
    // alert(event.target.id);
    $("#"+event.target.id).remove();
    $.ajax({
      url: "removeUserBill.php",
      type: "POST",
      data: {userID: event.target.id},
      success: function(e) {
        groupUserArray.splice(groupUserArray.indexOf(e),1);
      }
    });
  });

});
