@extends('layouts.site')

@section('content')

    <div>
        <!-- banner start -->
        <div class="banner-area banner-area-2 banner-area-bg" style="background: url(assets/img/banner/2.png);">
            <div class="main-search-area">
                <div class="container">
                    <form class="main-search-inner pl-0 pr-0">
                        <div class="row no-gutters">
                            <div class="col-lg-3 col-md-4">
                                <div class="single-check-inner text-lg-center">
                                    <label>
                                        <input name="cl-one" type="radio">
                                        <span>Rent</span>
                                    </label>
                                    <label>
                                        <input name="cl-one" type="radio">
                                        <span>Buy</span>
                                    </label>
                                    <label>
                                        <input name="cl-one" type="radio">
                                        <span>Sold</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-4">
                                <div class="single-input-inner">
                                    <input type="text" placeholder="Enter Keyword">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="single-select-inner">
                                    <select>
                                        <option>Office</option>
                                        <option value="1">Office 1</option>
                                        <option value="2">Office 2</option>
                                        <option value="3">Office 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-base w-md-auto w-100" href="#">Search</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container">
                <div class="banner-area-inner">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="banner-inner text-center">
                                <p>Lorem ipsum dolor sit amet, consecteLorem ipsum dolor sit amet,</p>
                                <div class="line"></div>
                                <h2>The Best Way To Find Your Perfect Home</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner end -->

        <!-- product area start -->
        <div class="product-area pd-top-118 pd-bottom-90">
            <div class="container">
                <div class="section-title text-center">
                    <h6>We are offring the best real estate</h6>
                    <h2>Best House For You</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product-wrap">
                            <div class="thumb">
                                <img src="assets/img/product/1.png" alt="img">
                                <div class="btn-area">
                                    <a class="btn btn-base btn-sm" href="#">BUY</a>
                                    <a class="btn btn-blue btn-sm" href="#">RENT</a>
                                </div>
                            </div>
                            <div class="product-wrap-details">
                                <div class="media">
                                    <div class="author">
                                        <img src="assets/img/author/1.png" alt="img">
                                    </div>
                                    <div class="media-body">
                                        <h6><a href="#">Owner Name</a></h6>
                                        <p><img src="assets/img/icon/location-alt.png" alt="img">New York real estate
                                        </p>
                                    </div>
                                    <a class="fav-btn float-right" href="#"><i class="far fa-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product-wrap">
                            <div class="thumb">
                                <img src="assets/img/product/2.png" alt="img">
                                <div class="btn-area">
                                    <a class="btn btn-base btn-sm" href="#">BUY</a>
                                    <a class="btn btn-blue btn-sm" href="#">RENT</a>
                                </div>
                            </div>
                            <div class="product-wrap-details">
                                <div class="media">
                                    <div class="author">
                                        <img src="assets/img/author/2.png" alt="img">
                                    </div>
                                    <div class="media-body">
                                        <h6><a href="#">Owner Name</a></h6>
                                        <p><img src="assets/img/icon/location-alt.png" alt="img">New York real estate
                                        </p>
                                    </div>
                                    <a class="fav-btn float-right" href="#"><i class="far fa-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product-wrap">
                            <div class="thumb">
                                <img src="assets/img/product/3.png" alt="img">
                                <div class="btn-area">
                                    <a class="btn btn-base btn-sm" href="#">BUY</a>
                                    <a class="btn btn-blue btn-sm" href="#">RENT</a>
                                </div>
                            </div>
                            <div class="product-wrap-details">
                                <div class="media">
                                    <div class="author">
                                        <img src="assets/img/author/3.png" alt="img">
                                    </div>
                                    <div class="media-body">
                                        <h6><a href="#">Owner Name</a></h6>
                                        <p><img src="assets/img/icon/location-alt.png" alt="img">New York real estate
                                        </p>
                                    </div>
                                    <a class="fav-btn float-right" href="#"><i class="far fa-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product area end -->
    </div>
@endsection
