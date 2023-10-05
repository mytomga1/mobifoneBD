<!-- phân trang default start-->
{{--    @if ($paginator->hasPages())--}}
{{--        <nav aria-label="Page navigation example">--}}
{{--            <ul class="pagination justify-content-center">--}}
{{--                @if ($paginator->onFirstPage())--}}
{{--                    <li class="page-item disabled">--}}
{{--                        <a class="page-link" href="#" tabindex="-1">Previous</a>--}}
{{--                    </li>--}}
{{--                @else--}}
{{--                    <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a></li>--}}
{{--                @endif--}}

{{--                @foreach ($elements as $element)--}}
{{--                    @if (is_string($element))--}}
{{--                        <li class="page-item disabled">{{ $element }}</li>--}}
{{--                    @endif--}}

{{--                    @if (is_array($element))--}}
{{--                        @foreach ($element as $page => $url)--}}
{{--                            @if ($page == $paginator->currentPage())--}}
{{--                                <li class="page-item active">--}}
{{--                                    <a class="page-link">{{ $page }}</a>--}}
{{--                                </li>--}}
{{--                            @else--}}
{{--                                <li class="page-item">--}}
{{--                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                @endforeach--}}

{{--                @if ($paginator->hasMorePages())--}}
{{--                    <li class="page-item">--}}
{{--                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>--}}
{{--                    </li>--}}
{{--                @else--}}
{{--                    <li class="page-item disabled">--}}
{{--                        <a class="page-link" href="#">Next</a>--}}
{{--                    </li>--}}
{{--                @endif--}}
{{--            </ul>--}}
{{--    @endif--}}
<!-- phân trang default end-->

<!-- phân trang 2 start-->
<div class="tp-pagination text-center">
    <div class="row">
        <div class="col-xl-12">
            <div class="basic-pagination pt-30 pb-30">

                @if ($paginator->hasPages())
                    <nav>
                        <ul>
                            @if ($paginator->onFirstPage())
                                <li class="page-item disabled">
                                    <a><i class="fal fa-angle-double-left"></i></a>
                                </li>
                            @else
                                <li><a href="{{ $paginator->previousPageUrl() }}" class="active"><i class="fal fa-angle-double-left"></i></a></li>
                            @endif

                            @foreach ($elements as $element)
                                @if (is_string($element))
                                    <li class="page-item disabled">{{ $element }}</li>
                                @endif

                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($page == $paginator->currentPage())
                                            <li class="page-item active">
                                                <a class="active">{{ $page }}</a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                            @if ($paginator->hasMorePages())
                                <li>
                                    <a href="{{ $paginator->nextPageUrl() }}"><i class="fal fa-angle-double-right"></i></a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a href="#"><i class="fal fa-angle-double-right"></i></a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- phân trang 2 end-->
