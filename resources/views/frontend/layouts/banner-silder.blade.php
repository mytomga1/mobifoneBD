<!-- BANNER slider-area-start========================================================================== -->
<div class="slider-area">
    <div class="swiper-container slider__active">
        <div class="slider-wrapper swiper-wrapper">
            @foreach($banners as $key => $banner)
                <div class="single-slider swiper-slide slider-height d-flex align-items-center" data-background="@if($banner->image && file_exists(public_path($banner->image)))
                                                                                                                    {{ asset($banner->image) }}
                                                                                                                 @else
                                                                                                                    {{ asset('frontend\img\slider\02-slide-3.jpg') }}
                                                                                                                 @endif
                                                                                                                " title="{{$banner->name}}" alt="{{$banner->title}}">
                    <div class="container">
                        <div class="row">
                            {{--                            <div class="col-xl-5">--}}
                            {{--                                <div class="slider-content">--}}
                            {{--                                    <div class="slider-top-btn" data-animation="fadeInLeft" data-delay="1.5s">--}}
                            {{--                                        <a href="product-details.html" class="st-btn b-radius">HOT DEALS</a>--}}
                            {{--                                    </div>--}}
                            {{--                                    <h2 data-animation="fadeInLeft" data-delay="1.7s" class="pt-15 slider-title pb-5">SALE 30% OFF <br> FUTURE FOOTBALL BOOTS</h2>--}}
                            {{--                                    <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.9s">Discount 30% On Products & Free Shipping</p>--}}
                            {{--                                    <div class="slider-bottom-btn mt-75">--}}
                            {{--                                        <a data-animation="fadeInUp" data-delay="1.15s" href="shop.html" class="st-btn-b b-radius">Discover now</a>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div><!-- /single-slider -->
            @endforeach
            <div class="main-slider-paginations"></div>
        </div>
    </div>
</div>
<!-- BANNER slider-area-end ============================================================================-->
