$(document).ready(function() {
  $("#createGroupBill").submit(function(){
    $.ajax({
      url: "createGroupBill.php",
      type: "POST",
      data: {"billName": $("#groupBillName").val(), "description": $("#description").val(), "originalAmount": $("#originalGroupBillAmount").val(), "groupID": $("#groupID").val()},
      success: function(e){
        if (e == 1){
          alert("error");
          $("#groupBillName").val("");
          $("#description").val("");
          $("#originalGroupBillAmount").val("");
          // window.location.reload();
        }
        else{
          alert("Here");
          $("#groupBillName").val("");
          $("#description").val("");
          $("#originalGroupBillAmount").val("");
          window.location.href = "dashboard.php";
        }
      }
    });
    return false;
  });
});
