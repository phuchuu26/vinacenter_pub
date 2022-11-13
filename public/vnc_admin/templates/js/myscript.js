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