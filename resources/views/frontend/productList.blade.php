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
                                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb__area-end -->

        <!-- shop-area-start -->
        <div class="shop-area mb-20">
            <div class="container">
                <div class="row">

                    <!-- Category bên trái__area-start -->
                    <div class="col-xl-3 col-lg-4">
                        <div class="product-widget mb-30">
                            <h5 class="pt-title">DANH SÁCH SẢN PHẨM</h5>
                            <div class="widget-category-list mt-20">
                                <form action="#">
                                    @foreach($categories as $item)
                                        @if($item->parent_id == $category->id)
                                            <div class="single-widget-category">
                                                <a href="{{ route('category',['category'=>$item->slug]) }}">{{ $item->name }}</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Category bên trái__area-end -->

                    <div class="col-xl-9 col-lg-8">
                        <div class="shop-banner mb-30">
                            <div class="banner-image">
                                <img class="banner-l" src="@if($banners2[0]->image && file_exists(public_path($banners2[0]->image)))
                                                                                                                    {{ asset($banners2[0]->image) }}
                                                                                                                 @else
                                                                                                                    {{ asset('frontend\img\slider\02-slide-3.jpg') }}
                                                                                                                 @endif" height="250px" width="1050px" alt="">
                            </div>
                        </div>
                        <div class="product-lists-top">
                            <div class="product__filter-wrap">
                                <div class="row align-items-center">
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                        <div class="product__filter d-sm-flex align-items-center">
                                            <div class="product__col">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="FourCol-tab" data-bs-toggle="tab" data-bs-target="#FourCol" type="button" role="tab" aria-controls="FourCol" aria-selected="true">
                                                            <i class="fal fa-th"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product__result pl-60">
                                                <p>Showing 1-20 of 29 relults</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="productGridTabContent">

                            <!-- show sản phẩm dạng danh sách__area-start -->
                            <div class="tab-pane fade  show active" id="FourCol" role="tabpanel" aria-labelledby="FourCol-tab">
                                <div class="tp-wrapper">
                                    <div class="row g-0">
                                        @foreach($products as $product)
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                                <div class="product__item product__item-d">
                                                    <div class="product__thumb fix">
                                                        <div class="product-image w-img">
                                                            <a href="{{ route('product', ['product' => $product->slug]) }}">
                                                                <img src="

                                                                            @if($product->image && file_exists(public_path($product->image)))
                                                                                {{ asset($product->image) }}
                                                                            @else
                                                                                {{ asset('frontend\Img404.png') }}
                                                                            @endif

                                                                         " height="239px" width="239px" title="{{$product->name}}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product__content-3">
                                                        <br/>
                                                        <h6 style="color: red"><strong><a href="{{ route('product', ['product' => $product->slug]) }}">{{ substr($product->name,0,30) }}</a></strong></h6>

                                                        <div class="price mb-10">
                                                            @if($product->price > 0)
                                                                <strong><span>{{ number_format($product->price,0,",",".") }} đ</span></strong>
                                                            @else
                                                                <i class="fa fa-phone-square"></i><strong><span> Liên Hệ</span></strong>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <div class="product__add-cart-s text-center">
                                                        <button type="button" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                            <a href="{{ route('product', ['product' => $product->slug]) }}">Chi tiết</a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- show sản phẩm dạng danh sách__area-start -->

                        </div>
                        <div class="tp-pagination text-center">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class=" pt-30 pb-30">
                                        {!! $products->links('vendor.pagination.custom')!!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- shop-area-end -->

    </main>
@endsection

@section('my_javascript')
    <script type="text/javascript">
        var pathname = window.location.pathname; // danh-muc/dien-thoai , /danh-muc/tablet
        var urlParams = new URLSearchParams(window.location.search); // khoi tao

        $(document).on('click', '.filter_category', function () {
            var slug = $(this).data('text');
            // check nếu là tất cả
            if (slug === 'tat-ca') {
                urlParams.delete('thuong-hieu');
            } else {
                var inputCategories = $('.filter_category');
                var str_slug = '';
                // vòng lặp từ 1, để loại bỏ tất-cả
                for(var i = 1; inputCategories[i]; ++i) {
                    if (inputCategories[i].checked) {
                        str_slug += inputCategories[i].getAttribute('data-text') + ',';
                    }
                } // xiaomi,dell,
                // Xóa ký tự "," cuối cùng sau khi nối chuỗi ở trên
                if(str_slug && str_slug.slice(-1) === ',') {
                    var indexPath = str_slug.lastIndexOf(',');
                    str_slug = str_slug.substring(0, indexPath);
                }
                urlParams.set('thuong-hieu', str_slug);
            }
            // chuyển hướng trang
            window.location.href = pathname + "?" + decodeURIComponent(urlParams.toString());
        });

        $( document ).ready(function() {
            // SET Checked cho thuong hieu
            var arr_filter_brands = {{ $arr_filter_brands }};
            if (arr_filter_brands && arr_filter_brands.length) {
                var inputCategories = $('.filter_category');
                for(var i=0; inputCategories[i]; ++i) {
                    // remove checked
                    inputCategories[i].removeAttribute('checked');
                    var valueInput = inputCategories[i].getAttribute('value');
                    valueInput = parseInt(valueInput);
                    if(arr_filter_brands.indexOf(valueInput) >= 0) {
                        inputCategories[i].setAttribute('checked', 'checked');
                    }
                }
            }
        });
    </script>
@endsection
