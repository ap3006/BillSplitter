$(document).ready(function() {
  $(".displayadminbill").submit(function(){
    $.ajax({
      url: "displayAdminContent.php",
      type: "POST",
      data: {"billadminid": $($(this).find(".billadminid")[0]).val()},
      success: function (e){
        // alert(e);
        let users = JSON.parse(e);
        $("#display").html("");
        $("#display").html("<h3>Here is the bill that you created</h3><hr><h3>Description: "+users[0].billDescription+"</h3><hr><h3>You already paid £"+users[0].originalAmount+" </h3><hr><center><table class='displayT' id='billTable'><tr><th class='displayTable'>Name</th><th class='displayTable'>Amount they have to pay (£)</th><th class='displayTable'>Have they paid?</th></tr></table><center>");
        users.forEach(function (user){
          if (user.isComplete == 1){
            $("#billTable").append("<tr><td class='displayTable'><center>"+user.userName+"</center></td class='displayTable'><td class='displayTable'><center>"+user.currentAmount+"</center></td><td class='displayTable'><center>Yes</center></td><tr>");
          }
          else{
            $("#billTable").append("<tr><td class='displayTable'><center>"+user.userName+"</center></td><td class='displayTable'><center>"+user.currentAmount+"</center></td><td class='displayTable'><center>No</center></td><tr>");
          }
          // $("#billTable").append("<tr><center><td>"+user.userID+"</td></center><center><td>"+user.currentAmount+"</td></center><tr>");
        });
      }
    });
    return false;
  });
});
