$(document).ready(function() {
  // console.log("file running");
  $(".displayBillUser").submit(function() {
    // var id = $(this).attr("id");
    // console.log(id);
    $.ajax({
      url: "displayBillContents.php",
      type: "POST",
      data: {"userid": $("#user_id").val(), "billid": $(this).attr("id"), "currentAmount": $($(this).find(".bill_currentAmount")[0]).val() },
      success: function (e){
          // alert(e);
          if (e == -1){
            // alert("Here");
            $("#display").html("");
            $("#display").append("<h3>Well done! You've paid your bill</h3>");
            // alert("done");
          }
          else{
            let row = JSON.parse(e);
            console.log(row);
            $("#display").html("");
            $("#display").append("<h3>Bill name: "+row.billName+"</h3><hr><h3>Description: "+row.billDescription+"</h3><hr><h3>Status: Pending</h3><hr><h3>You have to pay: <div class='currentAmount' id="+row.billID+">£"+row.currentAmount+"</div> to "+row.billAdminName+" </h3><br><form onsubmit='return displayAmount()' method='POST' class='payAmount' id="+row.billID+"><input class='inputForm' name='payBill' id='payBill' step='0.01' min='0'  placeholder='Enter the amount you are going to pay (£)' type='number'><input type='hidden' id='userId' name='userId' value="+row.userID+"> <input type='hidden' id='billId' name='billId' value="+row.billID+"><input type='hidden' id='current_amount' name='current_amount' value="+row.currentAmount+"><br><button type='submit' >Pay "+row.billAdminName+"</button></form>");
          }
      }
    });
    return false;

  });


});

// function False() {
//   return false;
// }
