@extends('frontend.layouts.main')

@section('content')

    <!-- 3 banner__area-start ========================================================================== -->
    <section class="banner__area pt-20 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="banner__item p-relative w-img mb-30">
                        <div class="banner__img">
                            <a href="product-details.html"><img src="{{asset('frontend')}}/assets/img/banner/banner-1.jpg" alt=""></a>
                        </div>
                        <div class="banner__content">
                            <h6><a href="product-details.html">Intelligent <br> New Touch Control</a></h6>
                            <p>Discount  20% On Products</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="banner__item p-relative mb-30 w-img">
                        <div class="banner__img">
                            <a href="product-details.html"><img src="{{asset('frontend')}}/assets/img/banner/banner-2.jpg" alt=""></a>
                        </div>
                        <div class="banner__content">
                            <h6><a href="product-details.html">On-sale <br> Best Prices</a></h6>
                            <p>Limited Time: Online Only!</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="banner__item p-relative mb-30 w-img">
                        <div class="banner__img">
                            <a href="product-details.html"><img src="{{asset('frontend')}}/assets/img/banner/banner-3.jpg" alt=""></a>
                        </div>
                        <div class="banner__content">
                            <h6><a href="product-details.html">Hot Sale <br> Super Laptops 2022 </a></h6>
                            <p>Free Shipping All Order</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 3 banner__area-end   ========================================================================== -->

    <!-- topsell [Product Show in here]__area-start ======================================================================== -->
    <section class="topsell__area-2 pt-15">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section__head d-flex justify-content-between mb-10">
                        <div class="section__title">
                            <h5 class="st-titile">Top Selling Products</h5>
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
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-1.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product__offer">
                                                    <span class="discount">-15%</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Epple iPad Pro 10.5-inch Cellular 64G</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$105-$110</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-2.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Men Size Yellow Basketball Jerseys</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$105-$150</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-3.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product__offer">
                                                    <span class="discount">-9%</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Xbox Wireless Game Controller Pink</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$200-$280</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-4.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Wireless Bluetooth Over-Ear Headphones</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$100-$180</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-5.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product__offer">
                                                    <span class="discount">-10%</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Solo3 Wireless On-Ear Headphones</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span><del>$270</del> $200</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-6.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Vifa Bluetooth Portable Wireless Speaker</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$150-$270</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- If we need navigation buttons -->
                                <div class="bs-button bs2-button-prev"><i class="fal fa-chevron-left"></i></div>
                                <div class="bs-button bs2-button-next"><i class="fal fa-chevron-right"></i></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="samsung" role="tabpanel" aria-labelledby="samsung-tab">
                            <div class="product-bs-slider-2">
                                <div class="product-slider-2 swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-1.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product__offer">
                                                    <span class="discount">-15%</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Epple iPad Pro 10.5-inch Cellular 64G</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$105-$110</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-4.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Wireless Bluetooth Over-Ear Headphones</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$100-$180</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-5.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product__offer">
                                                    <span class="discount">-10%</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Solo3 Wireless On-Ear Headphones</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span><del>$270</del> $200</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-6.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Vifa Bluetooth Portable Wireless Speaker</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$150-$270</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-2.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Men Size Yellow Basketball Jerseys</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$105-$150</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-3.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product__offer">
                                                    <span class="discount">-9%</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Xbox Wireless Game Controller Pink</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$200-$280</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- If we need navigation buttons -->
                                </div>
                                <div class="bs-button bs2-button-prev"><i class="fal fa-chevron-left"></i></div>
                                <div class="bs-button bs2-button-next"><i class="fal fa-chevron-right"></i></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="htc" role="tabpanel" aria-labelledby="htc-tab">
                            <div class="product-bs-slider-2">
                                <div class="product-slider-2 swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-4.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Wireless Bluetooth Over-Ear Headphones</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$100-$180</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-5.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product__offer">
                                                    <span class="discount">-10%</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Solo3 Wireless On-Ear Headphones</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span><del>$270</del> $200</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-6.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Vifa Bluetooth Portable Wireless Speaker</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$150-$270</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-1.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product__offer">
                                                    <span class="discount">-15%</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Epple iPad Pro 10.5-inch Cellular 64G</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$105-$110</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-2.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Men Size Yellow Basketball Jerseys</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$105-$150</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-3.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product__offer">
                                                    <span class="discount">-9%</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Xbox Wireless Game Controller Pink</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$200-$280</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- If we need navigation buttons -->
                                <div class="bs-button bs2-button-prev"><i class="fal fa-chevron-left"></i></div>
                                <div class="bs-button bs2-button-next"><i class="fal fa-chevron-right"></i></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nokia" role="tabpanel" aria-labelledby="nokia-tab">
                            <div class="product-bs-slider-2">
                                <div class="product-slider-2 swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-1.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product__offer">
                                                    <span class="discount">-15%</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Epple iPad Pro 10.5-inch Cellular 64G</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$105-$110</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-2.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Men Size Yellow Basketball Jerseys</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$105-$150</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-3.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product__offer">
                                                    <span class="discount">-9%</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Xbox Wireless Game Controller Pink</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$200-$280</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-4.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Wireless Bluetooth Over-Ear Headphones</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$100-$180</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-5.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product__offer">
                                                    <span class="discount">-10%</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Solo3 Wireless On-Ear Headphones</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span><del>$270</del> $200</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-6.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Vifa Bluetooth Portable Wireless Speaker</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$150-$270</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- If we need navigation buttons -->
                                <div class="bs-button bs2-button-prev"><i class="fal fa-chevron-left"></i></div>
                                <div class="bs-button bs2-button-next"><i class="fal fa-chevron-right"></i></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cell" role="tabpanel" aria-labelledby="cell-tab">
                            <div class="product-bs-slider-2">
                                <div class="product-slider-2 swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-1.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product__offer">
                                                    <span class="discount">-15%</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Epple iPad Pro 10.5-inch Cellular 64G</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$105-$110</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-2.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Men Size Yellow Basketball Jerseys</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$105-$150</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-3.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product__offer">
                                                    <span class="discount">-9%</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Xbox Wireless Game Controller Pink</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$200-$280</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-4.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Wireless Bluetooth Over-Ear Headphones</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$100-$180</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-5.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product__offer">
                                                    <span class="discount">-10%</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Solo3 Wireless On-Ear Headphones</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span><del>$270</del> $200</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('frontend')}}/assets/img/product/tp-6.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="product-details.html">Vifa Bluetooth Portable Wireless Speaker</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$150-$270</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
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
    <!-- topsell [Product Show in here]__area-end ========================================================================== -->

    <!-- 2 banner__area-start -->
    <section class="banner__area banner__area-d pb-10">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="banner__item p-relative w-img mb-30">
                        <div class="banner__img">
                            <a href="product-details.html"><img src="{{asset('frontend')}}/assets/img/banner/banner-4.jpg" alt=""></a>
                        </div>
                        <div class="banner__content">
                            <span>Bestseller Products</span>
                            <h6><a href="product-details.html">PC & Docking Station</a></h6>
                            <p>Discount 20% Off, Top Quality Products</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="banner__item p-relative mb-30 w-img">
                        <div class="banner__img">
                            <a href="product-details.html"><img src="{{asset('frontend')}}/assets/img/banner/banner-5.jpg" alt=""></a>
                        </div>
                        <div class="banner__content">
                            <span>Featured Products</span>
                            <h6><a href="product-details.html">Accessories iPhone</a></h6>
                            <p>Free Shipping All Order Over $99</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 2 banner__area-end -->

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
                            <a href="product-details.html"><img src="{{asset('frontend')}}/assets/img/banner/banner-6.jpg" alt=""></a>
                        </div>
                        <div class="banner__content banner__content-sd text-center">
                            <div class="banner-button mb-20">
                                <a href="product-details.html" class="st-btn">HOT DEALS</a>
                            </div>
                            <h6><a href="product-details.html">Sale 30% Off <br> Top Computer Case Gaming</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="banner__item p-relative mb-30 w-img">
                                <div class="banner__img">
                                    <a href="product-details.html"><img src="{{asset('frontend')}}/assets/img/banner/banner-7.jpg" alt=""></a>
                                </div>
                                <div class="banner__content banner__content-sd text-center">
                                    <h6><a href="product-details.html">Electronic Deals</a></h6>
                                    <p>Laptop, Computer, Smartphone, Gampad</p>
                                    <div class="banner-button mt-20 d-none d-sm-block">
                                        <a href="product-details.html" class="st-btn-3 b-radius">Shop Deals</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="banner__item p-relative w-img mb-30">
                                <div class="banner__img">
                                    <a href="product-details.html"><img src="{{asset('frontend')}}/assets/img/banner/banner-8.jpg" alt=""></a>
                                </div>
                                <div class="banner__content">
                                    <h6><a href="product-details.html">Hot Products <br> Laptop Ultra 4K 16”</a></h6>
                                    <p>Discount  20% On Products</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="banner__item p-relative mb-30 w-img">
                        <div class="banner__img">
                            <a href="product-details.html"><img src="{{asset('frontend')}}/assets/img/banner/banner-9.jpg" alt=""></a>
                        </div>
                        <div class="banner__content banner__content-sd text-center">
                            <div class="banner-button mb-20">
                                <a href="product-details.html" class="st-btn">HOT DEALS</a>
                            </div>
                            <h6><a href="product-details.html">Sport Edition <br> Best Choice of The Year</a></h6>
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
