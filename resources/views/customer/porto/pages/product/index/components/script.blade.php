<script>
    var productsSelector = $('#products');

    function fetchProducts() {
        for(counter = 1; counter <= 12; counter++) {
            productsSelector.append(`
                <li>
                    <div class="product">
                        <figure class="product-image-area">
                            <a href="{{ route('web.customer.show') }}/${counter}" title="Product Name" class="product-image">
                                <img src="{{ asset('customer/porto/img/demos/shop/products/product1.jpg') }}" alt="Product Name">
                                <img src="{{ asset('customer/porto/img/demos/shop/products/product1-2.jpg') }}" alt="Product Name" class="product-hover-image">
                            </a>

                            <a href="#" class="product-quickview">
                                <i class="fa fa-share-square-o"></i>
                                <span>Önizleme</span>
                            </a>
                            <div class="product-label"><span class="discount">-15%</span></div>
                            <div class="product-label"><span class="new">Yeni</span></div>
                        </figure>
                        <div class="product-details-area">
                            <h2 class="product-name"><a href="#" title="Product Name">Ürün ${ counter }</a></h2>
                            <div class="product-ratings">
                                <div class="ratings-box">
                                    <div class="rating" style="width:60%"></div>
                                </div>
                            </div>
                            <div class="product-price-box">
                                <span class="old-price">₺${counter * 20}.00</span>
                                <span class="product-price">₺${counter * 17 }.00</span>
                            </div>
                            <div class="product-actions">
                                <a href="#" class="addtowishlist" title="Favorilere Ekle">
                                    <i class="fa fa-heart"></i>
                                </a>
                                <a href="#" class="addtocart" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Sepete Ekle</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                `);
        }
    }

    fetchProducts();

    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() === $(document).height()) {
            fetchProducts();
        }
    });
</script>
