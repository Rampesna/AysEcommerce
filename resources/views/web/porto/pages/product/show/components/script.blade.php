<script src="{{ asset('customer/porto/vendor/common/common.min.js') }}"></script>
<script src="{{ asset('customer/porto/vendor/owl.carousel/owl.carousel.min.js') }}"></script>

<script>

    var productVariationOptions = $('#productVariationOptions');

    function check() {
        $('#addToCart').prop('disabled', true);
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
                $('#productPrice').html(`₺${parseFloat(response.response.price).toFixed(2)}`);
                $('#addToCart').prop('disabled', false);
            },
            error: function (error) {
                console.log(error.status)
                console.log(error.response)
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
                $.each(response.response.product_variant_options, function (variant) {
                    var optionsString = ``;
                    $.each(response.response.product_variant_options[variant].options, function (option) {
                        optionsString = optionsString + `<option value="${response.response.product_variant_options[variant].options[option].id}">${response.response.product_variant_options[variant].options[option].name}</option>`;
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
</script>
