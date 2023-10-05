@extends('frontend.layouts.main')

@section('content')
    <main>
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height-2" data-background="{{asset('frontend')}}/img/banner/page-banner-4.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">BLOG</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                    <nav class="breadcrumb-trail breadcrumbs">
                                        <ul class="breadcrumb-menu">
                                            <li class="breadcrumb-trail">
                                                <a href="{{route('index')}}"><span>Trang chủ</span></a>
                                            </li>
                                            <li class="trail-item">
                                                <span>Blog</span>
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

        <!-- news-detalis-area-start -->
        <div class="blog-area mt-120 mb-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="row">
                            @foreach($articles as $article)
                                <div class="col-xl-4">
                                    <div class="single-smblog mb-30">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="{{ route('article-detail', ['slug' =>$article->slug]) }}"> {{-- add chuyển trang chi tiết bài viết theo link slug--}}
                                                    @if($article->image && file_exists(public_path($article->image)))
                                                        <img src="{{ asset($article->image) }}" width="450" height="281" alt="">
                                                    @else
                                                        <img src="{{ asset('frontend') }}/img/blog/sm-b2-2.jpg" alt="">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">{{ !empty($article->Article_Category->name) ? $article->Article_Category->name : '' }}</a>{{-- khai báo quan hệ trong model--}}
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6><a href="{{ route('article-detail', ['slug' =>$article->slug]) }}">{{$article->title}}</a></h6>
                                            <span class="author mb-10">posted by <a href="#">{{ !empty($article->Article_user->name) ? $article->Article_user->name : '' }}</a></span>{{-- khai báo quan hệ trong model--}}

                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    {{-- add chuyển trang chi tiết bài viết theo link slug--}}
                                                    <a href="{{ route('article-detail', ['slug' =>$article->slug]) }}"> Đọc thêm >> <span class="icon"></span></a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">{{ date('d-m-Y', strtotime($article->created_at))  }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="basic-pagination text-center pt-30 pb-30">
                                    <div class=" pt-30 pb-30">
                                        {!! $articles->links('vendor.pagination.custom') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- news-detalis-area-end  -->

    </main>
@endsection
