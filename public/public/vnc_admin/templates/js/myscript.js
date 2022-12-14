$(document).ready(function(){
	$(".result_msg,.error_msg").delay(3000).slideUp();	
});

function xacnhanxoa(msg){
	if(window.confirm(msg)){
		return true;
	}
	return false;
}

/*$(function () {
    var $element = $('sup');
    function fadeInOut () {
        $element.fadeIn(1000, function () {
            $element.fadeOut(1500, function () {
                $element.fadeIn(1500, function () {
                    setTimeout(fadeInOut, 500);
                });
            });
        });
    }
    fadeInOut();
});*/
function searchProductOption(){

    var url = 'https://' + $(location).attr('host')  + "/vncadmin/productoption/search-product-option";
    $("#id_product_option").select2({
        placeholder: "Tra cứu sản phẩm áp dụng",
        multiple: false,
        minimumInputLength: 0,
        ajax: {
            url: url,
            dataType: 'json',
            // quietMillis: 250,
            data: function(term) {
                return {
                    term
                };
            },
            results: function(data, page) {
                console.log(data)
                $("#mySelect2").select2('data', { id:"elementID", text: "Hello!"});
                return {results: data};
            },
            processResults: function(data) {
                var options = [];
                $.each(data, function (id,data ) {
                    // console.log(JSON.stringify(data)+'==' + id)
                    var obj = {};
                    obj.text = '<p>' + data.name + '</p>'; 
                    obj.id   = data.id; 
                    options.push(obj);
                });
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                    results: options
                };
        
            }
        },
        formatResult: function(data){
            console.log(data)
            return element.text + ' (' + element.id + ')';
        },
        formatSelection: function(data){
            console.log(element)
            return element.text + ' (' + element.id + ')';
        },
        escapeMarkup: function(m) {
            return m;
        }
        
    });
}