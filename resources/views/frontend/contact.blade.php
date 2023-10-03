@extends('frontend.layouts.main')

@section('content')
    <link href="https://cdn01.jotfor.ms/static/formCss.css?3.3.34988" rel="stylesheet" type="text/css" />
    <style type="text/css">@media print{.form-section{display:inline!important}.form-pagebreak{display:none!important}.form-section-closed{height:auto!important}.page-section{position:initial!important}}</style>
    <link type="text/css" rel="stylesheet" href="https://cdn02.jotfor.ms/css/styles/nova.css?3.3.34988" />
    <link type="text/css" rel="stylesheet" href="https://cdn03.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=58c6459d9a11c7136a8b4567"/>
    <link type="text/css" rel="stylesheet" href="https://cdn01.jotfor.ms/css/styles/payment/payment_feature.css?3.3.34988" />
    <link rel="stylesheet" href="{{asset('frontend')}}/css/contractUS.css">
    <script src="https://cdn02.jotfor.ms/static/prototype.forms.js?3.3.34988" type="text/javascript"></script>
    <script src="https://cdn03.jotfor.ms/static/jotform.forms.js?3.3.34988" type="text/javascript"></script>
    <script src="{{asset('frontend')}}/js/contractUS.js"></script>

    <main>
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height" data-background="{{asset('frontend')}}/img/banner/page-banner-3.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">Liên Hệ</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                    <nav class="breadcrumb-trail breadcrumbs">
                                        <ul class="breadcrumb-menu">
                                            <li class="breadcrumb-trail">
                                                <a href="index.html"><span>Home</span></a>
                                            </li>
                                            <li class="trail-item">
                                                <span>Contact Us</span>
                                            </li>
                                        </ul>
                                    </nav>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-banner-area-end -->

        <!-- location-area-start -->
                <div class="location-area pt-70 pb-25">
                    <div class="container">
                        <div class="row mb-25">
                            <div class="col-xl-12">
                                <div class="abs-section-title text-center">
                                    <span>MOBIFONE BÌNH DƯƠNG</span>
                                    <h4>MOBIFIBER TRUY CẬP INTERNET TỐC ĐỘ CAO</h4>
                                    <p>Với mong muốn mang lại cho người dân cả nước có điều kiện tốt nhất tiếp cận internet với tốc độ "siêu nhanh" và giá ưu đãi, MobiFone đã xây dựng đường
                                        <br> trục truyền dẫn cáp quang riêng với tốc độ 300Gbps và kết hợp với cổng kết nối quốc tế riêng biệt ILL để tạo ra Làn gió mới trên thị trường Internet cáp quang
                                    </p>
                                    <br/>
                                    <br/>
                                    <!-- 2 banner lớn & dài__area-start -->
                                    <section class="banner__area banner__area-d pb-10"  >
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-12">
                                                    <div class="banner__item p-relative w-img mb-30">
                                                        <div class="banner__img">
                                                            <a href="#"><img src="{{asset('frontend')}}/banner-019.jpg" alt=""></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-12">
                                                    <div class="banner__item p-relative mb-30 w-img">
                                                        <div class="banner__img">
                                                            <a href="#"><img src="{{asset('frontend')}}/banner-020.jpg" alt=""></a>
                                                        </div>
                                                        {{--                        <div class="banner__content">--}}
                                                        {{--                            <span>Featured Products</span>--}}
                                                        {{--                            <h6><a href="product-details.html">Accessories iPhone</a></h6>--}}
                                                        {{--                            <p>Free Shipping All Order Over $99</p>--}}
                                                        {{--                        </div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- 2 banner lớn & dà__area-end -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-3 col-md-6">
                                <div class="location-item mb-30">
                                    <div class="location-image w-img mb-20">
                                        <img src="assets/img/location/location-1.jpg" alt="">
                                    </div>
                                    <h6>Chi nhánh Đồng Nai</h6>
                                    <div class="sm-item-loc sm-item-border mb-20">
                                        <div class="sml-icon mr-20">
                                            <i class="fal fa-map-marker-alt"></i>
                                        </div>
                                        <div class="sm-content">
                                            <span>Địa Chỉ</span>
                                            <p>{{$setting -> address2}}  </p>
                                        </div>
                                    </div>
                                    <div class="sm-item-loc sm-item-border mb-20">
                                        <div class="sml-icon mr-20">
                                            <i class="fal fa-phone-alt"></i>
                                        </div>
                                        <div class="sm-content">
                                            <span>mobile</span>
                                            <p><a href="#">{{$setting -> hotline}}</a></p>
                                        </div>
                                    </div>
                                    <div class="sm-item-loc mb-20">
                                        <div class="sml-icon mr-20">
                                            <i class="fal fa-envelope"></i>
                                        </div>
                                        <div class="sm-content">
                                            <span>Mail</span>
                                            <p><a href="{{$setting -> email}}">{{$setting -> email}}</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-3 col-md-6">
                                <div class="location-item mb-30">
                                    <div class="location-image w-img mb-20">
                                        <img src="assets/img/location/location-2.jpg" alt="">
                                    </div>
                                    <h6>Chi nhánh Bình Dương</h6>
                                    <div class="sm-item-loc sm-item-border mb-20">
                                        <div class="sml-icon mr-20">
                                            <i class="fal fa-map-marker-alt"></i>
                                        </div>
                                        <div class="sm-content">
                                            <span>Địa Chỉ</span>
                                            <p>{{$setting -> address}}</p>
                                        </div>
                                    </div>
                                    <div class="sm-item-loc sm-item-border mb-20">
                                        <div class="sml-icon mr-20">
                                            <i class="fal fa-phone-alt"></i>
                                        </div>
                                        <div class="sm-content">
                                            <span>mobile</span>
                                            <p><a href="#">(+84) {{$setting -> phone}}</a></p>
                                        </div>
                                    </div>
                                    <div class="sm-item-loc mb-20">
                                        <div class="sml-icon mr-20">
                                            <i class="fal fa-envelope"></i>
                                        </div>
                                        <div class="sm-content">
                                            <span>Mail</span>
                                            <p><a href="{{$setting -> email}}">{{$setting -> email}}</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        <!-- location-area-end -->

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
                                    <h4 class="post-comment-form-title mb-40">Thông tin liên hệ</h4>

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
                                            <i class="fal fa-envelope"></i>
                                            <input type="text" name="email" id="email" value="{{ old('email') }}"
                                                   placeholder="Nhập Email .....">
                                            @error('email')
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
                                            <i class="fal fa-pencil-alt"></i>
                                            <textarea name="content" id="content" placeholder="Thông Tin Phản Hồi ...."></textarea>
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

        <!-- cmamps-area-start -->
        <div class="cmamps-area">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d244.8038925353316!2d106.66514137908734!3d10.973766168470657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1696220697347!5m2!1svi!2s"></iframe>
        </div>
        <!-- cmamps-area-end -->
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
