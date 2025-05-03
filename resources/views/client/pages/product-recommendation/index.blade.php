@extends('client.layout.main')
@section('content')
    <!-- Start main-content -->
    <section class="page-title-product-recommendation">
        <div class="auto-container">
            <div class="title-outer text-center">
                <ul class="page-breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li>Products</li>
                    <li>Product Recommendation</li>
                </ul>
                <h1 class="title">
                    Find Your Perfect Match <br /> For Your Beauty Journey
                </h1>
                <div class="leaf-1 d-none d-lg-block bounce-y banner-bg product-header-left-bg"><img
                        src="{{ asset('assets/client/images/resource/background/bg-6.png') }}" alt="">
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
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="shop-sidebar ">
                        <div class="sidebar-widget category-widget sticky-product-recommendation">
                            <div class="widget-title">
                                <h5 class="widget-title">Find Perfect Match</h5>
                            </div>
                            <div class="widget-content">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label>Personal Color</label>
                                        <select class="form-control">
                                            <option>Select Personal Color</option>
                                            <option>Soft Summer</option>
                                            <option>Light Summer</option>
                                            <option>True Summer</option>
                                            <option>Bright Winter</option>
                                            <option>True Winter</option>
                                            <option>Dark Winter</option>
                                            <option>Light Spring</option>
                                            <option>True Spring</option>
                                            <option>Bright Spring</option>
                                            <option>Soft Autumn</option>
                                            <option>True Autumn</option>
                                            <option>Dark Autumn</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label>Skin Tone</label>
                                        <select class="form-control">
                                            <option>Select Skin Tone</option>
                                            <option>Warm Undertone</option>
                                            <option>Neutral to Warm Undertone</option>
                                            <option>Neutral Undertone</option>
                                            <option>Neutral to Cool Undertone</option>
                                            <option>Cool Undertone</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="theme-btn btn-style-one w-100"
                                            name="submit-form"><span class="btn-title">FIND MATCH</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <!--MixitUp Galery-->
                    <div class="mixitup-gallery mt-5 mt-lg-0">
                        <!--Filter-->

                        <div class="filter-list row">
                            <!--Product Block-->
                            <div class="product-block home-style all mix pantry fruit col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <div class="inner">
                                            <figure class="image mb-0"><a href="javascript:void(0);"><img
                                                        src="{{ asset('assets/client/images/resource/product1-1.jpg') }}"
                                                        alt="Image"></a></figure>
                                            <div class="icon-box">
                                                <a class="icon" href="javascript:void(0);" class="ui-btn add-to-cart">
                                                    <i class="fa-sharp fa-light fa-cart-shopping"></i>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-box">
                                        <div class="inner">
                                            <h3 class="brand">Instaperfect</h3>
                                            <span class="price">Rp. 450.000</span>
                                            <h4 class="title"><a href="javascript:void(0);">Glow Facial Cream</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Product Block-->
                            <div class="product-block home-style all mix dairy meat fruit col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <div class="inner">
                                            <figure class="image mb-0"><a href="javascript:void(0);"><img
                                                        src="{{ asset('assets/client/images/resource/product1-2.jpg') }}"
                                                        alt="Image"></a></figure>
                                            <div class="icon-box">
                                                <a class="icon" href="javascript:void(0);" class="ui-btn add-to-cart">
                                                    <i class="fa-sharp fa-light fa-cart-shopping"></i>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-box">
                                        <div class="inner">
                                            <h3 class="brand">Luxcrime</h3>
                                            <span class="price">Rp. 450.000</span>
                                            <h4 class="title"><a href="javascript:void(0);">Hair Treatment</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Product Block-->
                            <div
                                class="product-block home-style all mix pantry fruit vagetables col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <div class="inner">
                                            <figure class="image mb-0"><a href="javascript:void(0);"><img
                                                        src="{{ asset('assets/client/images/resource/product1-3.jpg') }}"
                                                        alt="Image"></a></figure>
                                            <div class="icon-box">
                                                <a class="icon" href="javascript:void(0);" class="ui-btn add-to-cart">
                                                    <i class="fa-sharp fa-regular fa-cart-shopping"></i>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-box">
                                        <div class="inner">
                                            <h3 class="brand">Wardah</h3>
                                            <span class="price">Rp. 450.000</span>
                                            <h4 class="title"><a href="javascript:void(0);">Massage Cream</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Product Block-->
                            <div class="product-block home-style all mix dairy meat vagetables col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <div class="inner">
                                            <figure class="image mb-0"><a href="javascript:void(0);"><img
                                                        src="{{ asset('assets/client/images/resource/product1-4.jpg') }}"
                                                        alt="Image"></a></figure>
                                            <div class="icon-box">
                                                <a class="icon" href="javascript:void(0);" class="ui-btn add-to-cart">
                                                    <i class="fa-sharp fa-regular fa-cart-shopping"></i>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-box">
                                        <div class="inner">
                                            <h3 class="brand">Somethinc</h3>
                                            <span class="price">Rp. 450.000</span>
                                            <h4 class="title"><a href="javascript:void(0);">Body Message Oil</a>
                                            </h4>
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
