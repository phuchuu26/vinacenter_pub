$(document).ready(function () {

    $('.btn_option_update').click(function (e) {
        var amount = parseInt($("input[id='amount']").val());
        var txtamount = parseInt($("input[id='txtamount']").val());

        if (amount > txtamount) {
            $("div[id='alert']").removeClass("d-none");
            return false;
        }
        return true;
    });
});