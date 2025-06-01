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
                                <form action="{{ route('product-recommendation.search') }}" method="GET">
                                    <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <label>Personal Color</label>
                                            <select class="form-control" name="personal_color_id" required>
                                                <option value="">Select Personal Color</option>
                                                @foreach ($personalColor as $personal)
                                                    <option value="{{ $personal->id_personal_color }}"
                                                        {{ request('personal_color_id') == $personal->id_personal_color ? 'selected' : '' }}>
                                                        {{ $personal->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label>Skin Tone</label>
                                            <select class="form-control" name="skin_tone_id" required>
                                                <option value="">Select Skin Tone</option>
                                                @foreach ($skintone as $skin)
                                                    <option value="{{ $skin->id_skintone }}"
                                                        {{ request('skin_tone_id') == $skin->id_skintone ? 'selected' : '' }}>
                                                        {{ $skin->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="theme-btn btn-style-one w-100">
                                                <span class="btn-title">FIND MATCH</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <!--MixitUp Galery-->
                    <div id="gallery-product-recommendation" class="mixitup-gallery mt-5 mt-lg-0">
                        <div class="filter-list row">
                            @forelse ($recommendations ?? [] as $recommendation)
                                <div class="product-block home-style all mix pantry fruit col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <div class="inner">
                                                <figure class="image mb-0"><a href="javascript:void(0);"><img
                                                            src="{{ asset($recommendation->product->image) }}"
                                                            alt="Image"></a></figure>
                                                @if ($recommendation->product->link_affiliate)
                                                    <div class="icon-box">
                                                        <a class="icon"
                                                            href="{{ $recommendation->product->link_affiliate }}"
                                                            target="_blank" rel="nofollow noopener"
                                                            class="ui-btn add-to-cart">
                                                            <i class="fa-sharp fa-light fa-cart-shopping"></i>
                                                        </a>

                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="content-box">
                                            <div class="inner">
                                                <h3 class="brand">{{ $recommendation->product->brand->name }}</h3>
                                                {{-- <span class="price">Rp. 450.000</span> --}}
                                                <h4 class="title"><a
                                                        href="javascript:void(0);">{{ $recommendation->product->name }}</a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 d-flex justify-content-center align-items-center height-400">
                                    <p>No products found matching your criteria. Try different filters.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div id="gallery-product" class="mixitup-gallery mt-5 mt-lg-0">
                        <div class="filter-list row">
                            <!--Product Block-->
                            @forelse ($productList ?? [] as $product)
                                <div class="product-block home-style all mix pantry fruit col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <div class="inner">
                                                <figure class="image mb-0"><a href="javascript:void(0);"><img
                                                            src="{{ asset($product->image) }}" alt="Image"></a></figure>
                                                @if ($product->link_affiliate)
                                                    <div class="icon-box">
                                                        <a class="icon" href="{{ $product->link_affiliate }}"
                                                            target="_blank" rel="nofollow noopener"
                                                            class="ui-btn add-to-cart">
                                                            <i class="fa-sharp fa-light fa-cart-shopping"></i>
                                                        </a>

                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="content-box">
                                            <div class="inner">
                                                <h3 class="brand">{{ $product->brand->name }}</h3>
                                                {{-- <span class="price">Rp. 450.000</span> --}}
                                                <h4 class="title"><a href="javascript:void(0);">{{ $product->name }}</a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 d-flex justify-content-center align-items-center height-400">
                                    <p>Product not found.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Products -->
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const personalColorId = urlParams.get('personal_color_id');
            const skinToneId = urlParams.get('skin_tone_id');

            const galleryProduct = document.getElementById('gallery-product');
            const galleryRecommendation = document.getElementById('gallery-product-recommendation');

            if (personalColorId && skinToneId) {
                // Show recommendation gallery and hide product gallery
                galleryProduct.style.display = 'none';
                galleryRecommendation.style.display = 'block';
            } else {
                // Show product gallery and hide recommendation gallery
                galleryProduct.style.display = 'block';
                galleryRecommendation.style.display = 'none';
            }

        });
    </script>
@endpush
