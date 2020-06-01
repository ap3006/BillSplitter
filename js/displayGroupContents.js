$(document).ready(function() {
  $(".displayGroup").submit(function() {
    $.ajax({
      url: "displayGroupContents.php",
      type: "POST",
      data: {"groupID" : $($(this).find(".group_id")[0]).val()},
      success: function (e){
        let groupUsers = JSON.parse(e);
        $("#display").html("");
        $("#display").html("<h3>Group Name: "+groupUsers[0].groupName+"</h3><hr><h3>Group Admin: "+groupUsers[0].groupAdminName+"</h3><hr><h3>Group Description: "+groupUsers[0].groupDescription+"</h3><hr><center><table class='displayT' id='groupTable'><tr><th class='displayTable'>Group Members</th></tr></table><center>");
        groupUsers.forEach(function (user){
          $("#groupTable").append("<tr><td class='displayTable'><center>"+user.userName+"<center></td></tr>");
        });
        $("#display").append("<br>");
        $("#display").append("<form method='post' action='groupBillForm.php'><input type='hidden' name='groupID' id='groupID' value="+groupUsers[0].groupID+"><button type='submit' title='Create group bill' id='createGroup'>Create Bill</button></form>")
      }
    });
    return false;
  });
});
