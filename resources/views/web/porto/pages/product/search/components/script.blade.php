<script>
    var page_index = 0;
    var page_size = 12;
    var orderType = $('#order_type');

    var productsSelector = $('#products');

    orderType.change(function () {
        page_index = 0;
        page_size = 12;
        productsSelector.html('');
        fetchProducts();
    });

    function fetchProducts() {
        var showProductUrl = '{{ route('web.product.show') }}';
        $.ajax({
            type: 'get',
            url: '{{ route('api.v1.product.index') }}',
            data: {
                page_index: page_index,
                page_size: page_size,
                order_by: orderType.val(),
                order_type: orderType.find(':selected').data('order'),
                min_price: $('#minPrice').val(),
                max_price: $('#maxPrice').val(),
                keyword: '{{ $keyword }}',
                category_id: '{{ $categoryId ?? null }}'
            },
            success: function (response) {
                $.each(response.response, function (product) {
                    productsSelector.append(`
                <li>
                    <div class="product">
                        <figure class="product-image-area">
                            <a href="${showProductUrl}/${response.response[product].id}" title="${response.response[product].long_name}" class="product-image">
                                <img src="${Object.keys(response.response[product].images).length > 0 ? response.response[product].images[0].url : ''}" alt="${response.response[product].long_name}">
                            </a>
                            <a style="cursor: pointer;" class="product-quickview addToWishlist" title="Favorilere Ekle" data-product-id="${response.response[product].id}">
                                <i class="fa fa-heart"></i>
                            </a>
                            ${response.response[product].discount ? `<div class="product-label"><span class="discount">-${response.response[product].discount}%</span></div>` : ``}
                        </figure>
                        <div class="product-details-area">
                            <h2 class="product-name"><a href="#" title="${response.response[product].long_name}">${response.response[product].long_name}</a></h2>
                            <div class="product-ratings">
                                <div class="ratings-box">
                                    <div class="rating" style="width:60%"></div>
                                </div>
                            </div>
                            <div class="product-price-box">
                            ${response.response[product].discount ?
                        `<span class="old-price">
                                   ₺${(response.response[product].price).toFixed(2)}
                                </span>
                                <span class="product-price">
                                   ₺${(response.response[product].price * (100 - response.response[product].discount) / 100).toFixed(2)}
                                </span>` :
                        `<span class="product-price">
                                    ₺${(response.response[product].price).toFixed(2)}
                                </span>`
                    }
                            </div>
                        </div>
                    </div>
                </li>
                `);
                });
                page_index += 1;
            },
            error: function (error) {
                console.log(error)
            }
        });
    }

    fetchProducts();

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() === $(document).height()) {
            fetchProducts();
        }
    });

    $('#minPrice, #maxPrice').on('keypress', function (e) {
        if (e.keyCode === 13) {
            page_index = 0;
            page_size = 12;
            productsSelector.html('');
            fetchProducts();
        }
    });
</script>
