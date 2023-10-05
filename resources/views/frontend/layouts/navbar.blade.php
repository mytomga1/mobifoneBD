<!-- Thanh Menu Nav -start 1========================================================================== -->
<div class="header__bottom">
    <div class="container">
        <div class="row g-0 align-items-center">
            <div class="col-lg-3">
                <div class="cat__menu-wrapper side-border d-none d-lg-block">
                    <div class="cat-toggle">
                        <button type="button" class="cat-toggle-btn cat-toggle-btn-1"><i class="fal fa-bars"></i> Danh Mục Mua Sắm</button>
                        <div class="cat__menu">
                            <nav id="mobile-menu" style="display: block;">
                                <ul>
                                    <li>
                                        <a href="shop.html">Tất Cả Danh Mục <i class="far fa-angle-down"></i></a>
                                        <ul class="mega-menu">
                                            @foreach($categories as $category)
                                                <li><a href="{{ route('category', ['category' => $category->slug ]) }}">{{$category->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @foreach($categories as $category)
                                        @if($category->parent_id == 0)
                                            <li><a href="{{ route('category', ['category' => $category->slug ]) }}">{{$category->name}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-3">
                <div class="header__bottom-left d-flex d-xl-block align-items-center">
                    <div class="side-menu d-lg-none mr-20">
                        <button type="button" class="side-menu-btn offcanvas-toggle-btn"><i class="fas fa-bars"></i></button>
                    </div>
                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul>
                                <li>
                                    <a href="{{route('index')}}" class="active">TRANG CHỦ</a>
                                </li>

                                <li><a href="{{route('articles')}}">Khuyến Mãi</a></li>
                                <li><a href="{{route('contact')}}">Liên Hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-9">
                <div class="shopeing-text text-sm-end">
                    <p>MobiFiber – Internet cáp quang tốc độ cao</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Thanh Menu Nav-End    ========================================================================== -->
