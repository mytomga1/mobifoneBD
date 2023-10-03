@extends('frontend.layouts.main')

@section('content')
    <!-- page-banner-area-start -->
    <div class="page-banner-area page-banner-height-2" data-background="{{asset('frontend')}}/img/banner/page-banner-4.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">BLOG DETAIL</h4>
                        <div class="breadcrumb-two">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                            <a href="{{route('index')}}"><span>Trang chủ</span></a>
                                        </li>
                                        <li class="breadcrumb-trail">
                                            <a href="{{route('articles')}}"><span>Blog</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>Blog Detail</span>
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
    <div class="news-detalis-area mt-120 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <h3 style="color: red">{{$article->title}}</h3><br/>

                    <div class="news-detalis-content mb-50">
                        <ul class="blog-meta mb-20">
                            <li><a href="#"><i class="fal fa-calendar-alt"></i>{{ date('d-m-Y', strtotime($article->created_at))  }}</a></li>
                            <li><a href="#"><i class="fal fa-pen-nib"></i> {{ !empty($article->Article_user->name) ? $article->Article_user->name : '' }}</a></li>
                        </ul>

                        {!! $article->description!!}

                        <div class="news-info d-sm-flex align-items-center justify-content-between mt-50 mb-50">

                            {{-- khu vực tag - Khi nào rảnh thì làm ;)) --}}
                            <div class="news-tag">
                                <h6 class="tag-title mb-25">Releted Tags</h6>
                                <a href="#">{{ !empty($article->Article_Category->name) ? $article->Article_Category->name : '' }}</a>{{-- khai báo quan hệ trong model--}}
                                {{--                                <a href="#">Desgin</a>--}}
                                {{--                                <a href="#">UX</a>--}}
                            </div>

                            <div class="news-share">
                                <h6 class="tag-title mb-25">Social Share</h6>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fal fa-share-alt"></i></a>
                            </div>
                        </div>
                        <div class="news-navigation pt-50 pb-40">
                            <div class="changes-info">
                                <span><a href="blog-details.html">Prev Post</a></span>
                                <h6 class="changes-info-title"><a href="blog-details.html"> < </a></h6>
                            </div>
                            <div class="changes-info text-md-right">
                                <span><a href="blog-details.html">Next Post</a></span>
                                <h6 class="changes-info-title"><a href="blog-details.html"> > </a></h6>
                            </div>
                        </div>

                        <div class="post-comment-form mt-20">
                            <h4 class="post-comment-form-title mb-40">Post Comment</h4>
                            <form action="#">
                                <div class="input-field">
                                    <i class="fal fa-pencil-alt"></i>
                                    <textarea name="comment" id="comment" placeholder="Type your comments...."></textarea>
                                </div>
                                <div class="input-field">
                                    <i class="fal fa-user"></i>
                                    <input type="text" placeholder="Type your name....">
                                </div>
                                <div class="input-field">
                                    <i class="fal fa-envelope"></i>
                                    <input type="text" placeholder="Type your email....">
                                </div>
                                <div class="input-field">
                                    <i class="fal fa-globe"></i>
                                    <input type="text" placeholder="Type your website....">
                                </div>
                                <button class="post-comment shutter-btn"><i class="fal fa-comments"></i>Post
                                    Comment</button>
                            </form>
                        </div>
                        <!-- page-Comment-area-end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- news-detalis-area-end  -->

@endsection
