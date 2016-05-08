$(document).ready(function(){
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
    $('.clientPay').on('click', function(){
        $('.ClientPays').show();
    });
});