@extends('frontend.layouts.main')

@section('content')
    <!-- error-area-start -->
    <div class="error-area pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="error-info text-center">
                        <div class="error-image text-center mb-50">
                            <img src="{{asset('frontend')}}/img/banner/404.png" alt="">
                        </div>
                        <div class="error-content">
                            <h5>Không Tìm Thấy Kết Quả</h5>
                            <p>Xin lỗi , Chúng tôi không tìm thấy kết quả nào, bạn có thể quay lại trang chủ xem sản phẩm khác.</p>
                            <div class="error-button">
                                <a href="{{route('index')}}" class="error-btn"> < Homepage</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- error-area-start -->
@endsection
