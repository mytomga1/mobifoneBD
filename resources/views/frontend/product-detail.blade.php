@extends('frontend.layouts.main')

@section('content')
    <main>
        <!-- breadcrumb__area-start -->
        <section class="breadcrumb__area box-plr-75">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('index')}}">Trang chủ</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('category', ['category' => $product->category->slug]) }}">Danh sách sản phẩm</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phảm: {{ ucfirst($product->name) }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb__area-end -->

        <!-- product-details-start -->
        <div class="product-details">
            <div class="container">
                <div class="row">

                    <div class="col-xl-6">
                        <div class="product__details-nav d-sm-flex align-items-start">
                            <div class="product__details-thumb">
                                <div class="tab-content" id="productThumbContent">
                                    <div class="tab-pane fade show active" id="thumbOne" role="tabpanel" aria-labelledby="thumbOne-tab">
                                        <div class="product__details-nav-thumb w-img">
                                            <img src="
                                                                            @if($product->image && file_exists(public_path($product->image)))
                                                                                {{ asset($product->image) }}
                                                                            @else
                                                                                {{ asset('frontend\Img404.png') }}
                                                                            @endif
                                                                " width="600px" height="600px" title="{{$product->name}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="product__details-content">
                            <h6>{{ $product->name }}</h6>

                            <div class="price mb-10">
                                <span style="color: red">{{ number_format($product->sale,0,",",".") }} đ</span><span> &ensp; - &ensp;<del> {{ number_format($product->price,0,",",".") }} đ</del></span>
                            </div>
                            <div class="features-des mb-20 mt-10">
                                {!! $product->summary !!}
                            </div>
                            <div class="product-stock mb-20">
                                <h5>Tình trạng : <span> {{ $product->stock > 0 ? 'Còn hàng' : 'Hết hàng' }}</span></h5>
                            </div>

                            <!-- khu vực chức năng giỏ hàng -start -->
                            <form action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->sale }}" name="price">
                                <input type="hidden" value="{{ $product->image }}"  name="image">

                                <div class="cart-option mb-15">
                                    <div class="product-quantity mr-20">
                                        <div class="cart-plus-minus p-relative"><input name="quantity" type="text" value="1"><div class="dec qtybutton">-</div><div class="inc qtybutton">+</div></div>
                                    </div>
                                    <button class="cart-btn" type="submit">Thêm vào giỏ hàng</button>
                                </div>
                            </form><!-- khu vực chức năng giỏ hàng -end -->


                            <div class="details-meta">
                                <div class="d-meta-left">
                                    <div class="dm-item mr-20">
                                        <a href="#"><i class="fal fa-heart"></i>Thêm vào danh sách yêu thích</a>
                                    </div>
                                    {{--                                    <div class="dm-item">--}}
                                    {{--                                        <a href="#"><i class="fal fa-layer-group"></i>Compare</a>--}}
                                    {{--                                    </div>--}}
                                </div>
                                <div class="d-meta-left">
                                    <div class="dm-item">
                                        <a href="#"><i class="fal fa-share-alt"></i>Share</a>
                                    </div>
                                </div>
                            </div>

                            <!-- khu vực chức năng tag sp -start -->
                            {{--                            <div class="product-tag-area mt-15">--}}
                            {{--                                <div class="product_info">--}}
                            {{--                                    <span class="sku_wrapper">--}}
                            {{--                                        <span class="title">SKU:</span>--}}
                            {{--                                        <span class="sku">DK1002</span>--}}
                            {{--                                    </span>--}}
                            {{--                                    <span class="posted_in">--}}
                            {{--                                        <span class="title">Categories:</span>--}}
                            {{--                                        <a href="#">iPhone</a>--}}
                            {{--                                        <a href="#">Tablets</a>--}}
                            {{--                                    </span>--}}
                            {{--                                    <span class="tagged_as">--}}
                            {{--                                        <span class="title">Tags:</span>--}}
                            {{--                                        <a href="#">Smartphone</a>,--}}
                            {{--                                        <a href="#">Tablets</a>--}}
                            {{--                                    </span>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <!-- khu vực chức năng tag sp -end -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product-details-end -->

        <!-- product-details-des-start -->
        <div class="product-details-des mt-40 mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="product__details-des-tab">
                            <ul class="nav nav-tabs" id="productDesTab" role="tablist">
                                <!-- tab thông tin sản phẩm -start -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="des-tab" data-bs-toggle="tab" data-bs-target="#des" type="button" role="tab" aria-controls="des" aria-selected="true">Thông tin sản phẩm </button>
                                </li>
                                <!-- tab thông tin sản phẩm -end -->

                                <!-- tab cấu hình sản phẩm -start -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="aditional-tab" data-bs-toggle="tab" data-bs-target="#aditional" type="button" role="tab" aria-controls="aditional" aria-selected="false">Thông tin cấu hình</button>
                                </li>
                                <!-- tab cấu hình sản phẩm -end -->

                                <!-- tab đánh giá sản phẩm -start -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Đánh giá </button>
                                </li>
                                <!-- tab đánh giá sản phẩm -end -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="prodductDesTaContent">
                    <!-- chi tiết tab thông tin sản phẩm -start -->
                    <div class="tab-pane fade active show" id="des" role="tabpanel" aria-labelledby="des-tab">
                        <div class="product__details-des-wrapper">
                            {!! $product->description !!}
                        </div>
                    </div>
                    <!-- chi tiết tab thông tin sản phẩm -end -->

                    <!-- chi tiết tab cấu hình sản phẩm -start -->
                    <div class="tab-pane fade" id="aditional" role="tabpanel" aria-labelledby="aditional-tab">
                        <div class="product__desc-info">
                            {!! $product->summary !!}
                        </div>
                    </div>
                    <!-- chi tiết tab cấu hình sản phẩm -end -->

                    <!-- chi tiết tab đánh giá sản phẩm -start -->
                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <div class="product__details-review">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="review-rate">
                                        <h5>5.00</h5>
                                        <div class="review-star">
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                        </div>
                                        <span class="review-count">01 Review</span>
                                    </div>
                                </div>
                                <div class="col-xl-8">
                                    <div class="review-des-infod">
                                        <h6>1 review for "<span>Wireless Bluetooth Over-Ear Headphones</span>"</h6>
                                        <div class="review-details-des">
                                            <div class="author-image mr-15">
                                                <a href="#"><img src="{{ asset('frontend') }}/img/author/author-sm-1.jpeg" alt=""></a>
                                            </div>
                                            <div class="review-details-content">
                                                <div class="str-info">
                                                    <div class="review-star mr-15">
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                    </div>
                                                    <div class="add-review-option">
                                                        <a href="#">Add Review</a>
                                                    </div>
                                                </div>
                                                <div class="name-date mb-30">
                                                    <h6> admin – <span> May 27, 2021</span></h6>
                                                </div>
                                                <p>A light chair, easy to move around the dining table and about the room. Duis aute irure dolor in reprehenderit in <br> voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="product__details-comment ">
                                        <div class="comment-title mb-20">
                                            <h3>Add a review</h3>
                                            <p>Your email address will not be published. Required fields are marked *</p>
                                        </div>
                                        <div class="comment-rating mb-20">
                                            <span>Overall ratings</span>
                                            <ul>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="comment-input-box">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-xxl-6 col-xl-6">
                                                        <div class="comment-input">
                                                            <input type="text" placeholder="Your Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-xl-6">
                                                        <div class="comment-input">
                                                            <input type="email" placeholder="Your Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-12">
                                                        <textarea placeholder="Your review" class="comment-input comment-textarea"></textarea>
                                                    </div>
                                                    <div class="col-xxl-12">
                                                        <div class="comment-agree d-flex align-items-center mb-25">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    Save my name, email, and website in this browser for the next time I comment.
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-12">
                                                        <div class="comment-submit">
                                                            <button type="submit" class="cart-btn">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- chi tiết tab đánh giá sản phẩm -end -->
                </div>
            </div>
        </div>
    </main>
@endsection
