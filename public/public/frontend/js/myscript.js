$(document).ready(function () {

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
                    console.log(response);
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
                    console.log(response);
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
        var rowid = $(this).attr('id');
        //window.alert(rowid);
        //var qty = $(this).parent().find(".qty").val();
        var qty = $("input[name='" + rowid + "']").val();
        var token = $("input[name='_token']").val();

        var formData = {_token: token, id: rowid, qty: qty};
        //alert(formData);
        var url = 'cap-nhat/' + rowid + '/' + qty;

        $.ajax({
            url: url,
            type: 'get',
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log('success');
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