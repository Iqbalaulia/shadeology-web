@extends('client.layout.main')
@section('content')
    <!-- Start main-content -->
    <section class="page-title-product-recommendation">
        <div class="auto-container">
            <div class="title-outer text-center">
                <ul class="page-breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li>Products</li>
                    <li>Shade Hunt</li>
                </ul>
                <h1 class="title">
                    Discover Your Perfect Shade <br /> Find Beauty That Matches You
                </h1>
                <div class="leaf-1 d-none d-lg-block bounce-y banner-bg-shade-hunt hunt-header-left-bg"><img
                        src="{{ asset('assets/client/images/resource/background/bg-7.png') }}" alt="">
                </div>
                <div class="leaf-1 d-none d-lg-block bounce-y banner-bg product-header-bg"><img
                        src="{{ asset('assets/client/images/resource/background/bg-5.png') }}" alt="">
                </div>
            </div>

        </div>
    </section>
    <!-- end main-content -->

    <!-- Featured Products -->
    <section class="featured-products">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-12 col-sm-12 col-md-12 shop-sidebar">
                    <div class="shop-sidebar ">
                        <div class="sidebar-widget category-widget sticky-product-recommendation">
                            <div class="widget-content">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group w-100">
                                            <label>Data L*</label>
                                            <input type="number" class="form-control" name="data_l" placeholder="Data L*"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group w-100">
                                            <label>Data a*</label>
                                            <input type="number" class="form-control" name="data_a" placeholder="Data a*"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group w-100">
                                            <label>Data b*</label>
                                            <input type="number" class="form-control" name="data_b" placeholder="Data b*"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group w-100">
                                            <label>Data LRV</label>
                                            <input type="number" class="form-control" name="data_lrv"
                                                placeholder="Data LRV" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <div class="form-group">
                                            <button type="submit" class="theme-btn btn-style-one w-100"
                                                name="submit-form"><span class="btn-title">SHADE HUNT</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured-products pt-0">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                    <!--MixitUp Galery-->
                    <div class="mixitup-gallery mt-5 mt-lg-0">
                        <!--Filter-->
                        <div class="filters clearfix">
                            <ul class="filter-tabs filter-btns clearfix">
                                <li class="active filter" data-role="button" data-filter="all">Skin Match</li>
                                <li class="filter" data-role="button" data-filter=".dairy">Light Shade</li>
                                <li class="filter" data-role="button" data-filter=".pantry">More Light Shade</li>
                            </ul>
                        </div>

                        <div class="filter-list row">
                            <!--Product Block-->
                            <div
                                class="shade-hunt product-block home-style all mix pantry fruit col-lg-3 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <div class="inner">
                                            <figure class="image mb-0"><a href="javascript:void(0);"><img
                                                        src="{{ asset('assets/client/images/resource/product1-1.jpg') }}"
                                                        alt="Image"></a></figure>
                                            <div class="icon-box">
                                                <a class="icon" href="shop-cart.html" class="ui-btn add-to-cart">
                                                    <i class="fa-sharp fa-light fa-cart-shopping"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-box">
                                        <div class="inner">
                                            <span class="title text-left"><a class="font-weight-bold "
                                                    href="javascript:void(0);">Glow
                                                    Facial Cream</a>
                                            </span>
                                            <span class="price font-weight-bold">N240</span>
                                            <h3 class="title font-weight-bold"><a href="javascript:void(0);">Wardah</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Product Block-->
                            <div class="product-block home-style all mix dairy meat fruit col-lg-3 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <div class="inner">
                                            <figure class="image mb-0"><a href="javascript:void(0);"><img
                                                        src="{{ asset('assets/client/images/resource/product1-1.jpg') }}"
                                                        alt="Image"></a></figure>
                                            <div class="icon-box">
                                                <a class="icon" href="shop-cart.html" class="ui-btn add-to-cart">
                                                    <i class="fa-sharp fa-light fa-cart-shopping"></i>
                                                </a>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-box">
                                        <div class="inner">
                                            <span class="title text-left"><a class="font-weight-bold "
                                                    href="javascript:void(0);">Glow
                                                    Facial Cream</a>
                                            </span>
                                            <span class="price font-weight-bold">N240</span>
                                            <h3 class="title font-weight-bold"><a href="javascript:void(0);">Wardah</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Product Block-->
                            <div
                                class="product-block home-style all mix pantry fruit vagetables col-lg-3 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <div class="inner">
                                            <figure class="image mb-0"><a href="javascript:void(0);"><img
                                                        src="{{ asset('assets/client/images/resource/product1-1.jpg') }}"
                                                        alt="Image"></a></figure>
                                            <div class="icon-box">
                                                <a class="icon" href="shop-cart.html" class="ui-btn add-to-cart">
                                                    <i class="fa-sharp fa-regular fa-cart-shopping"></i>
                                                </a>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-box">
                                        <div class="inner">
                                            <span class="title text-left"><a class="font-weight-bold "
                                                    href="javascript:void(0);">Glow
                                                    Facial Cream</a>
                                            </span>
                                            <span class="price font-weight-bold">N240</span>
                                            <h3 class="title font-weight-bold"><a href="javascript:void(0);">Wardah</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Products -->
@endsection
