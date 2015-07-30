/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function updateComplimentaryStatus(book_ID, status){
    $.ajax({
        url: "../../admin.php?action=updateComplimentaryStatus&book_ID="+book_ID+"&status="+status,
        type: 'GET',
        dataType: "json",
        success: function (resp) {
            window.location.href = "/admin/complimentary.php";
        }
    });
}

function submitAddcard(){
    var formData = $('#golf-card').serialize();
    if($('#card_number').val()==""){
        alert("Please Enter Card Number");
        return false;
    }
    if($('#valid_from').val()==""){
        alert("Please Enter Card Valid From Date.");
        return false;
    }
    if($('#valid_to').val()==""){
        alert("Please Enter Card Valid To Date.");
        return false;
    }
    $.ajax({
        url: "../../admin.php?action=addGolferCard",
        type: 'POST',
        data: formData,
        dataType: "json",
        success: function (resp) {
//                alert(resp.error);
            if(resp.error == 0){
                $('#card_number').val("");
                $('#valid_from').val("");
                $('#valid_to').val("");
                window.confirm("New Golfer Card has been Created Successfully.");
                //$('.booking-check').text("Your slot has been booked and details are mailed to your registered Email id. \n Happy Golfing!!!");
            }else{
                alert(resp.error_msg);
            }
        }
    });
}