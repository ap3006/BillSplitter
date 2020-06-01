$(document).ready(function(){
  console.log(groupUserArray);
  $('#createGroup').submit(function(){
    $.ajax({
      url: "createGroup.php",
      type: "POST",
      data: {groupDescription: $("#groupDescription").val(), groupName: $("#groupName").val(), groupUserArray:groupUserArray},
      success: function(e){
        // alert(e);
        if (e == 1){
          alert("You have not either entered the group name, group description or added any users");
          $("#groupDescription").val("");
          $("#groupName").val("");
        }
        else{
          $("#groupDescription").val("");
          $("#groupName").val("");
          window.location.reload();
        }
      }
    });
    return false;
  });
});
