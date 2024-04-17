$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function loadMore() {
    let page = parseInt($('#page').val()) + 1;
    $.ajax({
        type: 'POST',
        url: 'services/load-product',
        data: { page: page },
        success: function(result) {         
            if (result.html !== '') {
                $('#loadProduct').append(result.html);
                $('#page').val(page); // Cập nhật số trang trên front-end
            } else {
                alert('Không còn sản phẩm để tải');
            }
        },
        error: function() {
            alert('Có lỗi xảy ra khi tải thêm sản phẩm');
        }
    });
}