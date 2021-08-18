@extends('web.porto.layouts.master')
@section('title', $product->long_name . ' - ')

@section('content')

    <div class="container mt-lg">
        <div class="row">
            <div class="product-view">
                <div class="product-essential">
                    <div class="row">
                        <div class="product-img-box col-sm-5">
                            <div class="product-img-box-wrapper">
                                <div class="product-img-wrapper">
                                    <img id="product-zoom" src="{{ asset('customer/porto/img/demos/shop/products/single/product1.jpg') }}" data-zoom-image="../img/demos/shop/products/single/product1.jpg" alt="Product main image">
                                </div>
                                <a href="#" class="product-img-zoom" title="Zoom">
                                    <span class="glyphicon glyphicon-search"></span>
                                </a>
                            </div>
                        </div>

                        <div class="product-details-box col-sm-7">
                            <h1 class="product-name">
                                {{ $product->long_name }}
                            </h1>

                            <div class="product-rating-container">
                                <div class="product-ratings">
                                    <div class="ratings-box">
                                        <div class="rating" style="width:60%"></div>
                                    </div>
                                </div>
                                <div class="review-link">
                                    <a href="#" class="review-link-in" rel="nofollow"> <span class="count">1</span> değerlendirme</a>
                                </div>
                            </div>

                            <div class="product-short-desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>

                            <div class="product-detail-info">
                                <div class="product-price-box">
                                    @if($product->discount)
                                        <span class="old-price">₺{{ number_format($product->price, 2) }}</span>
                                        <span class="product-price">₺{{ number_format($product->price * (100 - $product->discount) / 100, 2) }}</span>
                                    @else
                                        <span class="product-price">₺{{ number_format($product->price, 2) }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="product-actions">
                                <div class="product-detail-qty">
                                    <label>
                                        <input type="number" class="form-control" value="1" id="quantity">
                                    </label>
                                </div>
                                <a href="#" class="addtocart" id="addToCart" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Sepete Ekle</span>
                                </a>
                                <div class="actions-right">
                                    <a href="#" class="addtowishlist" id="addToWishlist" title="Favorilere Ekle">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product-share-box">
                                <div class="addthis_inline_share_toolbox"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tabs product-tabs">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#product-desc" data-toggle="tab">Açıklamalar</a>
                        </li>
                        <li>
                            <a href="#product-add" data-toggle="tab">Özellikler</a>
                        </li>
                        <li>
                            <a href="#product-reviews" data-toggle="tab">Yorumlar</a>
                        </li>
                        <li>
                            <a href="#product-questions" data-toggle="tab">Sorular</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="product-desc" class="tab-pane active">
                            <div class="product-desc-area">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <ul>
                                    <li>Simple, Configurable (e.g. size, color, etc.), Bundled and Grouped Products</li>
                                    <li>Downloadable/Digital Products, Virtual Products</li>
                                    <li>Inventory Management with Backordered items</li>
                                    <li>Customer Personalized Products - upload text for embroidery, monogramming, etc.</li>
                                    <li>Create Store-specific attributes on the fly</li>
                                    <li>Advanced Pricing Rules and support for Special Prices</li>
                                    <li>Tax Rates per location, customer group and product type</li>
                                </ul>
                            </div>
                        </div>
                        <div id="product-add" class="tab-pane">
                            <table class="product-table">
                                <tbody>
                                <tr>
                                    <td class="table-label">Color</td>
                                    <td>Black</td>
                                </tr>
                                <tr>
                                    <td class="table-label">Size</td>
                                    <td>16mx24mx18m</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="product-reviews" class="tab-pane">
                            <div class="product-desc-area">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                        <div id="product-questions" class="tab-pane">
                            <div class="product-desc-area">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('web.porto.pages.product.show.components.style')
@stop

@section('page-script')
    @include('web.porto.pages.product.show.components.script')
@stop
