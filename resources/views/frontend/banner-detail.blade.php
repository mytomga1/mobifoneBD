@extends('frontend.layouts.main')

@section('content')
    <!-- page-banner-area-start -->

    <!-- page-banner-area-end -->

    <!-- news-detalis-area-start -->
    <div class="news-detalis-area mt-120 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">

                    <div class="news-detalis-content mb-50">
                        <ul class="blog-meta mb-20">
                            <li><a href="#"><i class="fal fa-calendar-alt"></i>{{ date('d-m-Y', strtotime($banner->created_at))  }}</a></li>
                           </ul>

                        {!! $banner->description!!}

                        <div class="news-info d-sm-flex align-items-center justify-content-between mt-50 mb-50">

                        </div>

                        <div class="news-navigation pt-50 pb-40"></div>

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
                                                    <h4 class="post-comment-form-title mb-40">Liên Hệ</h4>

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

                                                        <button id="input_2" type="submit" class="post-comment form-buttons-center shutter-btn site-btn btnSend"><i class="fal fa-comments"></i>Gửi Liên Hệ</button>

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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- news-detalis-area-end  -->

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
