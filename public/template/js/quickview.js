$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.show-modal').on('click',function(){
    var productId = $(this).data('id');
    console.log(productId);
    $.ajax({
        url:'quickview/'+ productId,
        type:'GET',
        dataType:'JSON',
        success:function(response){
            if(response.success){
                $('#name-product').text(response.data.name);
                if(response.data.price_sale){
                    var priceSaleFormatted = parseInt(response.data.price_sale).toLocaleString('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    });
                    $('#price-product').text(priceSaleFormatted);
                } else {
                    var priceFormatted = parseInt(response.data.price).toLocaleString('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    });
                    $('#price-product').text(priceFormatted);
                }

                $('#img-product').attr('src', response.data.thumb);
                $('#description-product').text(response.data.description)
                
            }
        },
        error:function(xhr, status, error){
            console.error(error);
        }

    })
})