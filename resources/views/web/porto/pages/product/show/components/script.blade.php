<script src="{{ asset('customer/porto/vendor/common/common.min.js') }}"></script>
<script src="{{ asset('customer/porto/vendor/owl.carousel/owl.carousel.min.js') }}"></script>

<script>

    var addToWishlist = $('#addToWishlist');
    var addToBasket = $('#addToBasket');
    var productVariantOptionId = $('#product_variant_option_id');
    var productVariationOptions = $('#productVariationOptions');

    function check() {
        addToBasket.hide();
        var product_id = '{{ $product->id }}';
        var variantOptions = $('.variant').find(':selected');
        var variants = [];
        $.each(variantOptions, function () {
            variants.push($(this).text());
        });

        $.ajax({
            type: 'get',
            url: '{{ route('api.v1.product_variant_option.check') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: '{{ $product->id }}',
                product_id: product_id,
                variants: variants
            },
            success: function (response, statusText, xhr) {
                productVariantOptionId.val(response.response.id);
                $('#productPrice').html(`₺${parseFloat(response.response.price).toFixed(2)}`);
                addToBasket.show();
            },
            error: function (error) {
                console.log(error.status);
                console.log(error);
                productVariantOptionId.val(null);
            }
        });
    }

    function fetchProduct() {
        $.ajax({
            type: 'get',
            url: '{{ route('api.v1.product.show') }}',
            data: {
                id: '{{ $product->id }}'
            },
            success: function (response) {
                var baseAsset = '{{ asset('') }}';
                $('#productImage').attr('src', baseAsset + response.response.images[0].url);
                $('#productDescription').html(response.response.description);
                $('#productDescriptionForTab').html(response.response.description);
                if (response.response.discount) {
                    $('#productOldPrice').html(`₺${parseFloat(response.response.price).toFixed(2)}`).show();
                    $('#productPrice').html(`₺${parseFloat(response.response.price * (100 - response.response.discount) / 100).toFixed(2)}`).show();
                } else {
                    $('#productOldPrice').hide();
                    $('#productPrice').html(`₺${parseFloat(response.response.price).toFixed(2)}`);
                }
                $.each(response.response.product_variant_options, function (variant) {
                    var optionsString = ``;
                    $.each(response.response.product_variant_options[variant].options, function (option) {
                        optionsString += `<option value="${response.response.product_variant_options[variant].options[option].id}">${response.response.product_variant_options[variant].options[option].name}</option>`;
                    });
                    productVariationOptions.append(`
                    <div class="col-xl-12">
                        <h5>${response.response.product_variant_options[variant].name}</h5>
                        <div class="form-group">
                            <label>
                                <select class="form-control variant">
                                    ${optionsString}
                                </select>
                            </label>
                        </div>
                    </div>
                    `);
                });
                check();
            },
            error: function (error) {
                console.log(error)
            }
        });
    }

    fetchProduct();

    $(document).delegate('.variant', 'change', function () {
        check();
    });

    addToBasket.click(function () {
        var product_variant_option_id = productVariantOptionId.val();

        if (product_variant_option_id == null || product_variant_option_id === '') {
            toastr.warning('Stokta olmayan ürün sepete eklenemez!');
        } else {
            @if(auth()->guard('customer')->check())
            $.ajax({
                type: 'post',
                url: '{{ route('api.v1.basket.add') }}',
                headers: {
                    _token: '{{ auth()->guard('customer')->user()->token() }}'
                },
                data: {
                    _token: '{{ csrf_token() }}',
                    product_variant_option_id: productVariantOptionId.val()
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
                type: 'post',
                url: '{{ route('web.basket.add') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_variant_option_id: productVariantOptionId.val()
                },
                success: function (response) {
                    toastr.success('Sepet güncellendi!');
                    getBasket();
                },
                error: function (error) {
                    console.log(error)
                }
            });
            @endif
        }
    });


</script>
