<script>
    var page_index = 0;
    var page_size = 12;
    var orderType = $('#order_type');
    var categoriesSelector = $('#categories');
    var productsSelector = $('#products');
    var filterableVariants = $('#filterableVariants');

    function fetchCategories() {
        var category_id = @if(!empty($categoryId)) {{ $categoryId }} @else null;
        @endif;
        $.ajax({
            async: false,
            type: 'get',
            url: '{{ route('api.v1.category.index') }}',
            data: {
                category_id: category_id
            },
            success: function (response) {
                $.each(response.response, function (category) {
                    categoriesSelector.append(`<option value="${response.response[category].id}">${response.response[category].name}</option>`);
                });
                categoriesSelector.val([category_id]).selectpicker('refresh');
                fetchFilterableVariants();
            },
            error: function (error) {
                console.log(error)
            }
        });
    }

    function fetchFilterableVariants() {
        $.ajax({
            type: 'get',
            url: '{{ route('api.v1.variant.index') }}',
            data: {},
            success: function (response) {
                console.log(response)
                filterableVariants.empty();
                $.each(response.response, function (variant) {
                    var inputString = ``;
                    if (response.response[variant].input_type === 'select') {
                        inputString += `
                        <div class="form-group">
                            <label for="variant_${response.response[variant].id}"></label>
                            <select id="variant_${response.response[variant].id}" class="form-control text-white selectpicker" data-live-search="true" multiple>
                                ${$.map(response.response[variant].options, function (option) { return `<option value="${option.id}">${option.name}</option>`; })}
                            </select>
                        </div>
                        `;
                    }
                    filterableVariants.append(`
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" href="#panel-filter-category">
                                    ${response.response[variant].name}
                                </a>
                            </h4>
                        </div>
                        <div id="panel-filter-category" class="accordion-body collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        ${inputString}
                                    </div>
                                </div>
                            </div>
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

    function fetchProducts() {
        var categories = categoriesSelector.val();

        console.log(categories)

        var keyword = '{{ $keyword }}';
        var order_by = orderType.val();
        var order_type = orderType.find(':selected').data('order');
        var min_price = $('#minPrice').val();
        var max_price = $('#maxPrice').val();
        var showProductUrl = '{{ route('web.product.show') }}';
        $.ajax({
            type: 'get',
            url: '{{ route('api.v1.product.index') }}',
            data: {
                page_index: page_index,
                page_size: page_size,
                order_by: order_by,
                order_type: order_type,
                min_price: min_price,
                max_price: max_price,
                keyword: keyword,
                categories: categories
            },
            success: function (response) {
                console.log(response)
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

    fetchCategories();

    fetchProducts();

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() === $(document).height()) {
            fetchProducts();
        }
    });

    orderType.change(function () {
        page_index = 0;
        page_size = 12;
        productsSelector.html('');
        fetchProducts();
    });

    categoriesSelector.change(function () {
        page_index = 0;
        page_size = 12;
        productsSelector.html('');
        fetchProducts();
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
