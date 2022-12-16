$(document).ready(function () {
    // console.log($("#getCartOrderComplete")[0]);
    if($("#getCartOrderComplete")[0] != undefined){
        $("#getCartOrderComplete")[0].reset(); //<-- Should return all input elements in that specific form.
    }

    $('.input_number').keyup(function (event) {
        // skip for arrow keys
        if (event.which >= 37 && event.which <= 40) return;

        // format number
        $(this).val(function (index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                ;
        });
    });

    $('.btn_update_price').on('input', function (e) {
        if (e.which >= 37 && e.which <= 40) return;

        let frm = $(this).attr('frm');

        var dealer = parseInt($("#" + frm + " input[id='dealer']").val());
        var yprice = parseInt($("#" + frm + " input[id='yprice']").val().replace(/,/g, ""));

        var url = $('#' + frm).attr('data-action');

        if (!isNaN(yprice) && yprice >= dealer) {
            $('#' + frm + ' #alert_yprice').addClass("d-none");
            $.ajax({
                url: url,
                method: "POST",
                data: $('#' + frm).serialize(),
                success: function (response) {
                    getTotalCart()
                    $(`#summary_${response['rowId']}`).html(response['summary'].toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
                },
                error: function (response) {
                    ;
                }
            });
        } else {
            $('#' + frm + ' #alert_yprice').removeClass("d-none");

        }

    });

    $('.btn_update_qty').on('input', function (e) {
        let frm = $(this).attr('frm');

        var url = $('#' + frm).attr('data-action');
        var txtQty = parseInt($("#" + frm + " input[id='txtQty']").val());
        var txtqty_max = parseInt($("#" + frm + " input[id='txtqty_max']").val());


        if (!isNaN(txtQty) && txtQty <= txtqty_max) {
            $.ajax({
                url: url,
                method: "POST",
                data: $('#' + frm).serialize(),
                success: function (response) {
                    $(`#qty_${response['rowId']}`).html(response['qty']);
                    $(`#summary_${response['rowId']}`).html(response['summary'].toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
                    getTotalCart()
                },
                error: function (response) {
                    ;
                }
            });
        }

    });

    $('.btn_update').click(function (e) {
        var dealer = parseInt($("input[id='dealer']").val());
        var yprice = parseInt($("input[id='yprice']").val());

        if (yprice < dealer) {
            $("tr[id='alert']").removeClass("d-none");
            return false;
        }
        return true;

    });

    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });
    $('.updatecart').click(function (e) {
        // console.log('updatecart');
        var rowid = $(this).attr('id');
        var qty = $("input[name='" + rowid + "']").val();
        var token = $("input[name='_token']").val();

        var formData = {_token: token, id: rowid, qty: qty};
        var url = 'cap-nhat/' + rowid + '/' + qty;

        $.ajax({
            url: url,
            type: 'get',
            data: formData,
            dataType: 'json',
            success: function (data) {
                window.location = "gio-hang"
            },
            error: function (data) {
                console.log('error');
            }
        });
    });
    $(".qty").keypress(function (e) {
        if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
    });
});

$(".qty").change(function () {
    alert("Handler for .change() called.");
});


function getTotalCart(e)
{
        let frm = $(e).attr('frm');

        var url = $('#urlGetTotalCart').val();

            $.ajax({
                url: url,
                method: "POST",
                data: $('#' + frm).serialize(),
                success: function (response) {
                    $(`#span_total`).html(response['summary'].toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
                },
                error: function (response) {
                    ;
                }
            });

}


$(".voucher-code").keypress(function (e) {
    // applyVoucher(e);
});

$(".voucher-code").change(function (e) {
    applyVoucher(e);
});

// $(".txtQty1").change(function (e) {
   
//     let frm = $(this).attr('frm');

//     var url = $('#' + frm).attr('data-action');
//     var txtQty = parseInt($("#" + frm + " input[id='txtQty']").val());
//     var txtqty_max = parseInt($("#" + frm + " input[id='txtqty_max']").val());


//     if (!isNaN(txtQty) && txtQty <= txtqty_max) {
//         $.ajax({
//             url: url,
//             method: "POST",
//             data: $('#' + frm).serialize(),
//             success: function (response) {
//                 $(`#qty_${response['rowId']}`).html(response['qty']);
//                 $(`#summary_${response['rowId']}`).html(response['summary'].toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
//                 getTotalCart()
//             },
//             error: function (response) {
//                 ;
//             }
//         });
//     }

// });

function applyVoucher(e)
{

        var element = $(e).attr('currentTarget');
        let frm = $(element).attr('frm');
        var rowid = $(element).attr("id")
        var voucher = $(element).val()
        var url = 'cap-nhat-voucher/' + rowid + '/' + voucher;


            $.ajax({
                url: url,
                method: "POST",
                data: $('#' + frm).serialize(),
                success: function (response) {
                    console.log(response);
                    if(!response['success']){
                        console.log(`error_des_${response['rowId']}`);
                        $(`#error_des_${response['rowId']}`).css('color', 'red');
                        $(`#error_des_${response['rowId']}`).html(response['description']);
                    }else{
                        $(`#error_des_${response['rowId']}`).css('color', '#5bc0de');
                        $(`#summary_${response['rowId']}`).html(response['summary'].toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
                        $(`#error_des_${response['rowId']}`).html(response['description']);
                        getTotalCart()
                        $('#' + frm + ' #alert_yprice').removeClass("d-none");
                        $("#alert_yprice_1").css("display", "block")
                        $("#txtQty").prop('disabled', true);
                        $("#yprice").prop('disabled', true);
                    }
                    // $(`#span_total`).html(response['summary'].toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
                },
                error: function (response) {
                    ;
                }
            });

}