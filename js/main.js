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

    $('.edit-product').on('click', function(e){
        e.preventDefault();
        var id = $(this).data('productid');
        var quant = parseInt($(this).parents('tr').find('#quant').val());
        var sell = parseInt($(this).parents('tr').find('#sell').val());
        window.location.href = "/api.php?action=edit-order&productId=" + id + "&quant=" + quant + "&sell=" + sell;
    });

    $('.order-submit .submit-order').on('click', function(e){
        e.preventDefault();
        $('.return-cash').fadeIn(400);
        $('.return-cash .btn').on('click', function(){
            $('form.order-submit').submit();
        });
        $('.return-cash .close').on('click', function(){
            $('.return-cash').fadeOut(400);
        });
    });
    
    $('.return-cash #currency').on('change', function (e) {
        if($(this).is(':checked')){
            var current = parseInt($('#return').text());
            var usd = current / $(this).data('rate');
            $('#return').html(usd.toFixed(2));
        }else{
            var total = $('.original').data('total');
            var cash = $('.cash').val();
            $('#return').html(cash - total);
        }
    });

    if($('.order-page').length > 0){
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                $('.push.neworders').submit();
            }
        });
    }

});