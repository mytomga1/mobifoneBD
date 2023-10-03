<!-- [Tin Tuc & Khuyen Mai ]-area-start  ========================================================================== -->
<section class="recomand-product-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section__head d-flex justify-content-between mb-10">
                    <div class="section__title">
                        <h5 class="st-titile">TIN TỨC & KHUYẾN MÃI</h5>
                    </div>
                    <div class="button-wrap">
                        <a href="{{ route('articles')}}">Xem Thêm <i class="fal fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-0">
            <div class="product-bs-slider-2">
                <div class="product-slider-3 swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($articles as $article)
                            <div class="product__item mb-20 swiper-slide">
                                <div class="product__thumb fix">
                                    <div class="blog-image w-img">
                                        <a href="{{ route('article-detail', ['slug' =>$article->slug]) }}"> {{-- add chuyển trang chi tiết bài viết theo link slug--}}
                                            @if($article->image && file_exists(public_path($article->image)))
                                                <img src="{{ asset($article->image) }}" width="277" height="173" title="{{$article->title}}" alt="">
                                            @else
                                                <img src="{{ asset('frontend') }}/img/blog/sm-b2-2.jpg" title="{{$article->title}}" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product__offer">
                                        <span class="discount">{{ !empty($article->Article_Category->name) ? $article->Article_Category->name : '' }}</span>
                                    </div>
                                </div>
                                <div class="product__content">
                                    <h5><a href="#" title="{{$article->title}}">{!! substr($article->title,0,45)!!}...</a></h5>
                                    <div class="smblog-foot pt-15">
                                        <div class="post-date">
                                            <span class="author mb-10">posted by <a href="#">{{ !empty($article->Article_user->name) ? $article->Article_user->name : '' }}</a></span><br/>
                                            <a href="#">{{ date('d-m-Y', strtotime($article->created_at))  }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product__add-cart text-center">
                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                        Đọc Thêm
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- [Tin Tuc & Khuyen Mai ]-area-end    ========================================================================== -->
