@extends('frontend.layouts.main')

@section('content')
    <!-- 2 banner lớn & dài__area-start -->
    <section class="banner__area banner__area-d pb-10"  >
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="banner__item p-relative w-img mb-30">
                        <div class="banner__img">
                            <a href="product-details.html"><img src="{{asset('frontend')}}/banner-019.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="banner__item p-relative mb-30 w-img">
                        <div class="banner__img">
                            <a href="product-details.html"><img src="{{asset('frontend')}}/banner-020.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 2 banner lớn & dà__area-end -->

    <!-- topsell [Product Show in here]__area-start ======================================================================== -->
    @foreach($list as $item)
        <section class="topsell__area-2 pt-15">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section__head d-flex justify-content-between mb-10">
                            <div class="section__title">
                                <h5 class="st-titile">{{ $item['category']->name }}</h5>
                            </div>
                            <div class="button-wrap button-wrap-2">
                                <a href="{{ route('category', ['category' => $item['category']->slug ]) }}">Tất cả sản phẩm <i class="fal fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tab-content" id="flast-sell-tabContent">
                            <div class="tab-pane fade active show" id="computer" role="tabpanel" aria-labelledby="computer-tab">
                                <div class="product-bs-slider-2">
                                    <div class="product-slider-2 swiper-container">
                                        <div class="swiper-wrapper">
                                            @foreach($item['products'] as $product)
                                                <div class="product__item swiper-slide">
                                                    <div class="product__thumb fix">
                                                        <div class="product-image w-img">
                                                            <a href="{{ route('product', ['product' => $product->slug]) }}">
                                                                <img src=" @if($product->image && file_exists(public_path($product->image)))
                                                                              {{ asset($product->image) }}
                                                                           @else
                                                                              {{ asset('frontend\img\product\tp-2.jpg') }}
                                                                           @endif
                                                                " width="237px" height="237px" alt="product">
                                                            </a>
                                                        </div>
                                                        <div class="product__offer">
                                                            <span class="discount">{{ !empty($product->category->name) ? $product->category->name : '' }}</span>

                                                        </div>
                                                    </div>
                                                    <div class="product__content">
                                                        <h5><a href="product-details.html">{{ $product->name }}</a></h5>
                                                        <div class="price">
                                                            @if($product->price > 0)
                                                                <span>{{ number_format($product->price,0,",",".") }} đ</span>
                                                            @else
                                                                <span> Liên Hệ </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="product__add-cart text-center">
                                                        <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                            Chi Tiết
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- If we need navigation buttons -->
                                    <div class="bs-button bs2-button-prev"><i class="fal fa-chevron-left"></i></div>
                                    <div class="bs-button bs2-button-next"><i class="fal fa-chevron-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
    <!-- topsell [Product Show in here]__area-end ========================================================================== -->

    <!-- moveing-text-area-start -->
    <section class="moveing-text-area">
        <div class="container">
            <div class="ovic-running">
                <div class="wrap">
                    <div class="inner">
                        <p class="item">Miễn Phí Lắp Đặt Tặng thiết bị Router wifi tốc độ cao</p>
                        <p class="item">Tặng nay 4 tháng cước khi đăng ký gói 12 tháng và 2 tháng khi đăng ký gói 6 tháng</p>
                        <p class="item">Liên hệ tư vấn nhanh chóng thông qua số 0901600668 & 18001090 (miễn phí)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- moveing-text-area-end -->

    <!-- 4 Combo banner__area-start -->
    <section class="banner__area pt-60 pb-25">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="banner__item p-relative w-img mb-30">
                        <div class="banner__img">
                            <a href="product-details.html"><img src="{{asset('frontend')}}/assets/img/banner/mobifiber-banner2.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
                <!-- 2 Combo banner dài nhỏ__area-start -->
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="banner__item p-relative mb-30 w-img">
                        <div class="banner__img">
                            <a href="product-details.html"><img src="{{asset('frontend')}}/assets/img/banner/mobifiber-banner.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="banner__item p-relative mb-30 w-img">
                        <div class="banner__img">
                            <a href="product-details.html"><img src="{{asset('frontend')}}/assets/img/banner/mobifiber-banner3.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 4 Combo banner__area-end -->

    <!-- [Tin Tuc & Khuyen Mai ]-area-start  ========================================================================== -->
        @include('frontend.layouts.blognew')
    <!-- [Tin Tuc & Khuyen Mai ]-area-end    ========================================================================== -->

    <!-- [Nhan Hang] -area-start -->
    <section class="brand-area brand-area-d">
{{--        <div class="container">--}}
{{--            <div class="brand-slider swiper-container pt-50 pb-45">--}}
{{--                <div class="swiper-wrapper">--}}
{{--                    <div class="brand-item w-img swiper-slide">--}}
{{--                        <a href="#"><img src="{{asset('frontend')}}/assets/img/brand/brand-1.jpg" alt="brand"></a>--}}
{{--                    </div>--}}
{{--                    <div class="brand-item w-img swiper-slide">--}}
{{--                        <a href="#"><img src="{{asset('frontend')}}/assets/img/brand/brand-2.jpg" alt="brand"></a>--}}
{{--                    </div>--}}
{{--                    <div class="brand-item w-img swiper-slide">--}}
{{--                        <a href="#"><img src="{{asset('frontend')}}/assets/img/brand/brand-3.jpg" alt="brand"></a>--}}
{{--                    </div>--}}
{{--                    <div class="brand-item w-img swiper-slide">--}}
{{--                        <a href="#"><img src="{{asset('frontend')}}/assets/img/brand/brand-4.jpg" alt="brand"></a>--}}
{{--                    </div>--}}
{{--                    <div class="brand-item w-img swiper-slide">--}}
{{--                        <a href="#"><img src="{{asset('frontend')}}/assets/img/brand/brand-5.jpg" alt="brand"></a>--}}
{{--                    </div>--}}
{{--                    <div class="brand-item w-img swiper-slide">--}}
{{--                        <a href="#"><img src="{{asset('frontend')}}/assets/img/brand/brand-6.jpg" alt="brand"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </section>
    <!-- [Nhan Hang] -area-end -->

@endsection
