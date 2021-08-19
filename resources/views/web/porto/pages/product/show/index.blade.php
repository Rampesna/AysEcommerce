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
                                    <img id="productImage" src="" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="product-details-box col-sm-7">
                            <h1 class="product-name" id="productName"></h1>
                            <div class="product-rating-container">
                                <div class="product-ratings">
                                    <div class="ratings-box">
                                        <div class="rating" style="width:80%" id="productRatingPercent"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-short-desc">
                                <p id="productDescription"></p>
                            </div>
                            <div class="product-short-desc" style="margin-top: 1.25rem">
                                <div class="row" id="productVariationOptions">

                                </div>
                            </div>

                            <div class="product-detail-info">
                                <div class="product-price-box">
                                    <span class="old-price" id="productOldPrice"></span>
                                    <span class="product-price" id="productPrice"></span>
                                </div>
                            </div>

                            <div class="product-actions">
                                <div class="product-detail-qty">
                                    <label>
                                        <input type="number" class="form-control" value="1" id="quantity">
                                    </label>
                                </div>
                                <button class="btn btn-sm btn-success text-white" id="addToCart">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Sepete Ekle</span>
                                </button>
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
                            <a href="#product-features" data-toggle="tab">Özellikler</a>
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
                            <p id="productDescriptionForTab"></p>
                        </div>
                        <div id="product-features" class="tab-pane">
                            <div id="productFeaturesForTab"></div>
                        </div>
                        <div id="product-reviews" class="tab-pane">
                            <div id="productReviewsForTab"></div>
                        </div>
                        <div id="product-questions" class="tab-pane">
                            <div id="productQuestionsForTab"></div>
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
