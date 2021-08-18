<script src="{{ asset('customer/porto/vendor/common/common.min.js') }}"></script>
<script src="{{ asset('customer/porto/vendor/owl.carousel/owl.carousel.min.js') }}"></script>

<script>
    $('#addToCart').click(function () {
        $.ajax({
            type: 'post',
            url: '{{ route('web.addToCart') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: '{{ $product->id }}',
                quantity: $('#quantity').val()
            },
            success: function (response) {
                console.log(response)
            },
            error: function (error) {
                console.log(error)
            }
        });
    });
</script>
