function displayAmount() {
    $.ajax({
      url: "payBill.php",
      type: "POST",
      data: {userId: $("#userId").val(),"billId": $("#billId").val(), "currentamount": $("#current_amount").val(), "payBill": $("#payBill").val()},
      success: function (e){
        alert(e);
        if (e == -1){
          alert("You cannot pay more than the amount you actually have to pay!");
        }
        else if (e == -2){
          alert("You have not entered any amount")
        }
        else{
          // alert("Here");
          let row = JSON.parse(e);
          $("#display").html("");
          $("#display").append("<h3>Bill name: "+row.billName+"</h3><hr><h3>Description: "+row.billDescription+"</h3><hr><h3>Status: Pending</h3><hr><h3>You have to pay: <div class='currentAmount' id="+row.billID+">£"+row.currentAmount+"</div> to "+row.billAdminName+" </h3><br><form onsubmit='return displayAmount()' method='POST' class='payAmount' id="+row.billID+"><input type='number' class='inputForm' name='payBill' id='payBill' step='0.01' min='0'  placeholder='Enter the amount you are going to pay (£)' type='number'><input type='hidden' id='userId' name='userId' value="+row.userID+"> <input type='hidden' id='billId' name='billId' value="+row.billID+"><input type='hidden' id='current_amount' name='current_amount' value="+row.currentAmount+"><br><button type='submit' >Pay "+row.billAdminName+"</button></form>");
        }
      }
    });
    return false;
}
