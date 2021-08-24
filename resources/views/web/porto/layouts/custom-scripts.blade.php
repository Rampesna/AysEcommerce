<script>
    function getBasket() {
        @if(auth()->guard('customer')->check())
        $.ajax({
            type: 'get',
            url: '{{ route('api.v1.basket.index') }}',
            headers: {
                _token: '{{ auth()->guard('customer')->user()->token() }}'
            },
            data: {},
            success: function (response) {
                var basketProducts = $('#basketProducts');
                var basketProductsQuantities = $('#basketProductsQuantities');
                var basketProductsTotalPrice = $('#basketProductsTotalPrice');
                var totalPrice = 0;
                var quantity = 0;
                basketProducts.empty();
                $.each(response.response, function (product) {
                    quantity += response.response[product].amount;
                    totalPrice += response.response[product].product_variant_option.price * response.response[product].amount;
                    var baseAsset = '{{ asset('') }}';
                    basketProducts.append(`
                        <div class="product product-sm">
                            <a href="#" class="btn-remove removeFromBasket" data-product-variant-option-id="${response.response[product].product_variant_option.id}" title="Sepetten Kaldır">
                                <i class="fa fa-times"></i>
                            </a>
                            <figure class="product-image-area">
                                <a href="#" title="${response.response[product].product_variant_option.product.long_name}" class="product-image">
                                    <img src="${baseAsset + response.response[product].product_variant_option.product.images[0].url}" alt="${response.response[product].product_variant_option.product.long_name}">
                                </a>
                            </figure>
                            <div class="product-details-area">
                                <h2 class="product-name">
                                    <a href="#" title="${response.response[product].product_variant_option.product.long_name}">
                                        ${response.response[product].product_variant_option.product.long_name}
                                    </a>
                                </h2>
                                <div class="cart-qty-price">
                                    ${response.response[product].amount} X
                                    <span class="product-price">₺${parseFloat(response.response[product].product_variant_option.price).toFixed(2)}</span>
                                </div>
                            </div>
                        </div>
                    `);
                });
                basketProductsTotalPrice.html(`₺${parseFloat(totalPrice).toFixed(2)}`);
                basketProductsQuantities.html(quantity);
            },
            error: function (error) {
                console.log(error)
            }
        });
        @else
        $.ajax({
            type: 'get',
            url: '{{ route('web.basket.index') }}',
            data: {},
            success: function (response) {
                console.log(response.response)
                var basketProducts = $('#basketProducts');
                var basketProductsQuantities = $('#basketProductsQuantities');
                var basketProductsTotalPrice = $('#basketProductsTotalPrice');
                var totalPrice = 0;
                var quantity = 0;
                basketProducts.empty();
                $.each(response.response, function (product) {
                    quantity += response.response[product].amount;
                    totalPrice += response.response[product].product_variant_option.price * response.response[product].amount;
                    var baseAsset = '{{ asset('') }}';
                    basketProducts.append(`
                        <div class="product product-sm">
                            <a href="#" class="btn-remove removeFromBasket" data-product-variant-option-id="${response.response[product].product_variant_option.id}" title="Sepetten Kaldır">
                                <i class="fa fa-times"></i>
                            </a>
                            <figure class="product-image-area">
                                <a href="#" title="${response.response[product].product_variant_option.product.long_name}" class="product-image">
                                    <img src="${baseAsset + response.response[product].product_variant_option.product.images[0].url}" alt="${response.response[product].product_variant_option.product.long_name}">
                                </a>
                            </figure>
                            <div class="product-details-area">
                                <h2 class="product-name">
                                    <a href="#" title="${response.response[product].product_variant_option.product.long_name}">
                                        ${response.response[product].product_variant_option.product.long_name}
                                    </a>
                                </h2>
                                <div class="cart-qty-price">
                                    ${response.response[product].amount} X
                                    <span class="product-price">₺${parseFloat(response.response[product].product_variant_option.price).toFixed(2)}</span>
                                </div>
                            </div>
                        </div>
                    `);
                });
                basketProductsTotalPrice.html(`₺${parseFloat(totalPrice).toFixed(2)}`);
                basketProductsQuantities.html(quantity);
            },
            error: function (error) {
                console.log(error)
            }
        });
        @endif
    }

    getBasket();

    $(document).delegate('.removeFromBasket', 'click', function () {
        var product_variant_option_id = $(this).data('product-variant-option-id');
        @if(auth()->guard('customer')->check())
        $.ajax({
            type: 'delete',
            url: '{{ route('api.v1.basket.remove') }}',
            headers: {
                _token: '{{ auth()->guard('customer')->user()->token() }}'
            },
            data: {
                _token: '{{ csrf_token() }}',
                product_variant_option_id: product_variant_option_id
            },
            success: function (response) {
                toastr.success('Sepet güncellendi!');
                getBasket();
            },
            error: function (error) {
                console.log(error)
            }
        });
        @else
        $.ajax({
            type: 'delete',
            url: '{{ route('web.basket.remove') }}',
            data: {
                _token: '{{ csrf_token() }}',
                product_variant_option_id: product_variant_option_id
            },
            success: function () {
                toastr.success('Sepet güncellendi!');
                getBasket();
            },
            error: function (error) {
                console.log(error)
            }
        });
        @endif
    });
</script>
