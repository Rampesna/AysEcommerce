<div class="header-container container">
    <div class="header-row">
        <div class="header-column">
            <div class="header-logo">
                <a href="#">
                    <img alt="Porto" width="111" height="51" src="{{ asset('customer/porto/img/demos/shop/logo-shop-white.png') }}">
                </a>
            </div>
        </div>
        <div class="header-column">
            <div class="row">
                <div class="cart-area">
                    <div class="cart-dropdown">
                        <a href="#" class="cart-dropdown-icon">
                            <i class="minicart-icon"></i>
                            <span class="cart-info">
                                <span class="cart-qty">2</span>
                            </span>
                        </a>
                        <div class="cart-dropdownmenu right">
                            <div class="dropdownmenu-wrapper">
                                <div class="cart-products">
                                    <div class="product product-sm">
                                        <a href="#" class="btn-remove" title="Remove Product">
                                            <i class="fa fa-times"></i>
                                        </a>
                                        <figure class="product-image-area">
                                            <a href="#" title="Product Name" class="product-image">
                                                <img src="{{ asset('customer/porto/img/demos/shop/products/thumbs/cart-product1.jpg') }}" alt="Product Name">
                                            </a>
                                        </figure>
                                        <div class="product-details-area">
                                            <h2 class="product-name"><a href="#" title="Product Name">Ürün 1</a></h2>

                                            <div class="cart-qty-price">
                                                1 X
                                                <span class="product-price">₺65.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product product-sm">
                                        <a href="#" class="btn-remove" title="Remove Product">
                                            <i class="fa fa-times"></i>
                                        </a>
                                        <figure class="product-image-area">
                                            <a href="#" title="Product Name" class="product-image">
                                                <img src="{{ asset('customer/porto/img/demos/shop/products/thumbs/cart-product2.jpg') }}" alt="Product Name">
                                            </a>
                                        </figure>
                                        <div class="product-details-area">
                                            <h2 class="product-name"><a href="#" title="Product Name">Ürün 2</a></h2>

                                            <div class="cart-qty-price">
                                                1 X
                                                <span class="product-price">₺39.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="cart-totals">
                                    Toplam: <span>₺104.00</span>
                                </div>

                                <div class="cart-actions">
                                    <a href="#" class="btn btn-primary">Sepeti İncele</a>
                                    <a href="#" class="btn btn-primary">Alışverişi Tamamla</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-search">
                    <a href="#" class="search-toggle"><i class="fa fa-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper">
                            <input type="text" class="form-control" name="q" id="q" placeholder="Arayın..." required>
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>

                <a href="#" class="mmenu-toggle-btn" title="Toggle menu">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
    </div>
</div>
