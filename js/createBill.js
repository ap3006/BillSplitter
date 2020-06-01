$(document).ready(function(){
  console.log(userArray);
  $('#creatBill').submit(function(){
    $.ajax({
      url: "createBill.php",
      type: "POST",
      data: {description: $("#description").val(), billName: $("#billName").val(), billAmount: $("#originalBillAmount").val(), userArray:userArray},
      success: function(e){
        // alert(e);
        if (e == 1){
          alert("You have either not entered any users, a bill name, a bill description or bill amount");
          $("#description").val("");
          $("#billName").val("");
          $("#originalBillAmount").val("");
          // window.location.reload();
        }
        else{
          // alert("Here");
          // alert(e);
          $("#description").val("");
          $("#billName").val("");
          $("#originalBillAmount").val("");
          window.location.reload();
        }
      }
    });
    return false;
  });
});
