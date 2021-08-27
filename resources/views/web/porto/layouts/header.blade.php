<div class="header-container container">
    <div class="header-row">
        <div class="header-column">
            <div class="header-logo">
                <a href="{{ route('web.product.index') }}">
                    <img alt="{{ config('app.name') }}" style="width: auto; height: 51px" src="{{ asset('customer/porto/img/demos/shop/logo-white.png') }}">
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
                                <span class="cart-qty" id="basketProductsQuantities"></span>
                            </span>
                        </a>
                        <div class="cart-dropdownmenu right">
                            <div class="dropdownmenu-wrapper">
                                <div class="cart-products" id="basketProducts">

                                </div>

                                <div class="cart-totals">
                                    Toplam: <span id="basketProductsTotalPrice"></span>
                                </div>

                                <div class="cart-actions">
                                    <a href="#" class="btn btn-warning">İncele</a>
                                    <a href="{{ route('web.cart.create') }}" class="btn btn-info">Tamamla</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-search">
                    <form action="{{ route('web.product.search') }}" method="get">
                        <div class="header-search-wrapper">
                            <label for="keyword"></label>
                            <input type="text" class="form-control" autocomplete="off" id="keyword" name="keyword" value="{{ $keyword ?? '' }}" placeholder="Arayın...">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
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
