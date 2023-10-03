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
                                <span style="color: red">{{ number_format($product->sale,0,",",".") }} đ</span>
                            </div>
                            <div class="features-des mb-20 mt-10">
                                {!! $product->summary !!}
                            </div>

                            <!-- khu vực chức năng giỏ hàng -start -->
                            <form action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->sale }}" name="price">
                                <input type="hidden" value="{{ $product->image }}"  name="image">

                                <div class="cart-option mb-15">
                                    <button class="cart-btn" type="submit">Liên Hệ</button>
                                </div>
                            </form><!-- khu vực chức năng giỏ hàng -end -->


                            <div class="details-meta">
                                <div class="d-meta-left">
                                </div>
                                <div class="d-meta-left">
                                    <div class="dm-item">
                                        <a href="#"><i class="fal fa-share-alt"></i>Share</a>
                                    </div>
                                </div>
                            </div>

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
                                    <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Liên Hệ </button>
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
                                <div class="col-xl-8">
                                    <div class="review-des-infod">
                                        <h3>ĐĂNG KÝ GÓI CƯỚC</h3>
                                        <br/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="product__details-comment ">
                                        <div class="comment-input-box">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-xxl-6 col-xl-6">
                                                        <div class="comment-input">
                                                            <input type="text" placeholder="Họ và Tên">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-xl-6">
                                                        <div class="comment-input">
                                                            <input type="number" placeholder="số điện thoại">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-12">
                                                        <div class="comment-input">
                                                            <input type="text" placeholder="Địa chỉ đang ở">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-12">
                                                        <textarea placeholder="Ghi chú gói cước muốn đăng ký" class="comment-input comment-textarea"></textarea>
                                                    </div>
                                                    <div class="col-xxl-12">
                                                        <div class="comment-submit">
                                                            <button type="submit" class="cart-btn">Đăng ký</button>
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
        <!-- product-details-des-End -->

        <!-- Contact Form Begin -->
        <div class="container">
            @if (session('msgContact'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact__form__title">
                            <h3 style="color: green">{{ session('msgContact') }}</h3>
                        </div>
                        <a href="/"><i class="fa fa-backward" aria-hidden="true"></i> Quay về trang chủ</a>
                    </div>
                </div>
            @else
                <div class="news-detalis-area mt-120 mb-70">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="post-comment-form mt-20">
                                    <h4 class="post-comment-form-title mb-40">Đăng ký gói cước</h4>

                                    <form class="jotform-form" action="{{ route('contactPost') }}" method="POST" id="contact" accept-charset="utf-8">
                                        @csrf <!-- {{ csrf_field() }} -->
                                        <input type="hidden" name="formID" value="222183629415456" />
                                        <input type="hidden" id="JWTContainer" value="" />
                                        <input type="hidden" id="cardinalOrderNumber" value="" />

                                        <div class="input-field">
                                            <i class="fal fa-user"></i>
                                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                                   placeholder="Họ và tên....">
                                            @error('name')
                                            <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="input-field">
                                            <i class="fal fa-phone"></i>
                                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                                   placeholder="Số Điện Thoại .....">
                                            @error('phone')
                                            <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="input-field">
                                            <i class="fal fa-envelope"></i>
                                            <input type="text" name="email" id="email" value="{{ old('email') }}"
                                                   placeholder="Địa chỉ .....">
                                            @error('email')
                                            <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="input-field">
                                            <i class="fal fa-pencil-alt"></i>
                                            <textarea name="content" id="content"  placeholder="Ghi chú gói cước mong muốn đăng ký ...."></textarea>
                                            @error('content')
                                            <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <button id="input_2" type="submit" class="post-comment form-buttons-center shutter-btn"><i class="fal fa-comments"></i>Gửi Liên Hệ</button>

                                        <li style="display:none">
                                            Should be Empty:
                                            <input type="text" name="website" value="" />
                                        </li>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <!-- Contract us-area-end -->
    </main>
@endsection

@section('js')
    <script type="text/javascript">
        $( document ).ready(function() {
            $('.btnSend').click(function () {
                if ($('#name').val() === '') {
                    $('#name').notify('Bạn  chưa nhập tên','error');
                    document.getElementById('name').scrollIntoView();
                    return false;
                }
                if ($('#email').val() === '') {
                    $('#email').notify('Bạn chưa nhập email','error');
                    document.getElementById('email').scrollIntoView();
                    return false;
                }
                if ($('#phone').val() === '') {
                    $('#phone').notify('Bạn  chưa nhập phone','error');
                    document.getElementById('email').scrollIntoView();
                    return false;
                }
                if ($('#content').val() === '') {
                    $('#content').notify('Bạn chưa nhập tin nhắn','error');
                    document.getElementById('email').scrollIntoView();
                    return false;
                }
            });
        });
    </script>
@endsection
