@extends('customer.porto.layouts.master')
@section('title', 'Ürün ' . $id . ' - ')

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
                                Ürün {{ $id }}
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
                                    <span class="old-price">₺99.00</span>
                                    <span class="product-price">₺84.90</span>
                                </div>
                            </div>

                            <div class="product-actions">
                                <div class="product-detail-qty">
                                    <input type="text" value="1" class="vertical-spinner" id="product-vqty">
                                </div>
                                <a href="#" class="addtocart" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Sepete Ekle</span>
                                </a>
                                <div class="actions-right">
                                    <a href="#" class="addtowishlist" title="Favorilere Ekle">
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
                            <div class="collateral-box">
                                <ul class="list-unstyled">
                                    <li>Be the first to review this product</li>
                                </ul>
                            </div>

                            <div class="add-product-review">
                                <h3 class="text-uppercase heading-text-color font-weight-semibold">WRITE YOUR OWN REVIEW</h3>
                                <p>How do you rate this product? *</p>

                                <form action="#">
                                    <table class="ratings-table">
                                        <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>1 star</th>
                                            <th>2 stars</th>
                                            <th>3 stars</th>
                                            <th>4 stars</th>
                                            <th>5 stars</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Quality</td>
                                            <td>
                                                <input type="radio" name="ratings[1]" id="Quality_1" value="1" class="radio">
                                            </td>
                                            <td>
                                                <input type="radio" name="ratings[1]" id="Quality_2" value="2" class="radio">
                                            </td>
                                            <td>
                                                <input type="radio" name="ratings[1]" id="Quality_3" value="3" class="radio">
                                            </td>
                                            <td>
                                                <input type="radio" name="ratings[1]" id="Quality_4" value="4" class="radio">
                                            </td>
                                            <td>
                                                <input type="radio" name="ratings[1]" id="Quality_5" value="5" class="radio">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Value</td>
                                            <td>
                                                <input type="radio" name="value[1]" id="Value_1" value="1" class="radio">
                                            </td>
                                            <td>
                                                <input type="radio" name="value[1]" id="Value_2" value="2" class="radio">
                                            </td>
                                            <td>
                                                <input type="radio" name="value[1]" id="Value_3" value="3" class="radio">
                                            </td>
                                            <td>
                                                <input type="radio" name="value[1]" id="Value_4" value="4" class="radio">
                                            </td>
                                            <td>
                                                <input type="radio" name="value[1]" id="Value_5" value="5" class="radio">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Price</td>
                                            <td>
                                                <input type="radio" name="price[1]" id="Price_1" value="1" class="radio">
                                            </td>
                                            <td>
                                                <input type="radio" name="price[1]" id="Price_2" value="2" class="radio">
                                            </td>
                                            <td>
                                                <input type="radio" name="price[1]" id="Price_3" value="3" class="radio">
                                            </td>
                                            <td>
                                                <input type="radio" name="price[1]" id="Price_4" value="4" class="radio">
                                            </td>
                                            <td>
                                                <input type="radio" name="price[1]" id="Price_5" value="5" class="radio">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <div class="form-group">
                                        <label>Nickname<span class="required">*</span></label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Summary of Your Review<span class="required">*</span></label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-xlg">
                                        <label>Review<span class="required">*</span></label>
                                        <textarea cols="5" rows="6" class="form-control"></textarea>
                                    </div>

                                    <div class="text-right">
                                        <input type="submit" class="btn btn-primary" value="Submit Review">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('customer.porto.pages.product.show.components.style')
@stop

@section('page-script')
    @include('customer.porto.pages.product.show.components.script')
@stop
