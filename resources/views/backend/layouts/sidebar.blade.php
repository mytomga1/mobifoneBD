<aside class="main-sidebar">
    @if(\Illuminate\Support\Facades\Auth::check()) {{-- kiểm tra user login chưa--}}
    @php
        $user = \Illuminate\Support\Facades\Auth::user();
    @endphp
        <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if($user->avatar && file_exists(public_path($user->avatar)))
                    &nbsp;   <img src="{{ asset($user->avatar) }}" class="img-circle" height="25px" width="25px" alt="">
                @else
                    &nbsp;    <img src="{{ asset('frontend\Img404.png') }}" class="img-circle" height="25px" width="25px"  alt="">
                @endif
            </div>
            <div class="pull-left info">
                <p><span class="hidden-xs">{{ $user->name }}</span></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <li class="header"></li>
        <!-- search form -->
        {{--            <form action="" method="post" class="sidebar-form">--}}
        {{--                <div class="input-group">--}}
        {{--                    <input type="text" name="q" class="form-control" placeholder="Search...">--}}
        {{--                    <span class="input-group-btn">--}}
        {{--                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
        {{--                </button>--}}
        {{--              </span>--}}
        {{--                </div>--}}
        {{--            </form>--}}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <!--            <li class="header">MAIN NAVIGATION</li>-->
            <!--            <li class="active treeview">-->
            <!--                <a href="mvc.local/">-->
            <!--                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>-->
            <!--                </a>-->
            <!--            </li>-->
            <li>
                <a href="{{asset('/admin')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            {{--            <li>--}}
            {{--                <a href="{{route('banner.create')}}">--}}
            {{--                    <i class="fa fa-th"></i> <span>Banner</span>--}}
            {{--                    <span class="pull-right-container">--}}
            {{--            </span>--}}
            {{--                </a>--}}
            {{--            </li>--}}

            <li class="treeview" style="height: auto;">
                <a href="#">
                    <i class="fa fa-map-o"></i> <span>Banner</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{route('admin.banner.index')}}"><i class="fa fa-circle-o"></i> Quản Lý Banner</a></li>
                    <li><a href="{{route('admin.bannerposition.index')}}"><i class="fa fa-circle-o"></i> Quản lý Vị Trí Banners</a></li>
                </ul>
            </li>

            {{--                <li><a href="{{route('admin.category.index')}}"><i class="fa fa-list"></i> <span>Quản Lý Danh mục</span></a></li>--}}
            {{--                <li><a href="{{route('admin.position.index')}}"><i class="fa fa-map-marker"></i> <span>Quản Lý vị trí</span></a></li>--}}

            <li class="treeview" style="height: auto;">
                <a href="#">
                    <i class="fa fa-list"></i> <span>Danh mục</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{route('admin.category.index')}}"><i class="fa fa-circle-o"></i> Quản Lý Danh mục</a></li>
                    <li><a href="{{route('admin.position.index')}}"><i class="fa fa-circle-o"></i> Quản Lý vị trí Danh mục</a></li>
                </ul>
            </li>

            <li class="treeview" style="height: auto;">
                <a href="#">
                    <i class="fa fa-mobile"></i> <span>Sản Phẩm</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{route('admin.product.index')}}"><i class="fa fa-circle-o"></i> Quản Lý Sản Phẩm</a></li>
                    <li><a href="{{route('admin.brand.index')}}"><i class="fa fa-circle-o"></i> Quản Lý Nhãn Hiệu</a></li>
                    <li><a href="{{route('admin.vendor.index')}}"><i class="fa fa-circle-o"></i> Quản Lý Nhà Cung Cấp</a></li>
                </ul>
            </li>


            <li class="treeview" style="height: auto;">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i> <span>Quản Lý Bài Viết</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{route('admin.article.index')}}"><i class="fa fa-circle-o"></i> Danh Sách Bài Viết</a></li>
                    <li><a href="{{route('admin.article.create')}}"><i class="fa fa-circle-o"></i> Thêm Mới Bài Viết</a></li>
                </ul>
            </li>
            @if(\Auth::user()->role_id == 1)
                <li class="treeview" style="height: auto;">
                    <a href="#">
                        <i class="fa fa-address-book-o"></i> <span>Quản Lý Tài Khoản</span>
                        <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu" style="display: none;">
                        <li><a href="{{route('admin.user.index')}}"><i class="fa fa-circle-o"></i> Danh Sách Tài Khoản</a></li>
                        <li><a href="{{route('admin.role.index')}}"><i class="fa fa-circle-o"></i> Danh Sách Vai Trò Tài Khoản</a></li>
                    </ul>
                </li>
            @endif

            {{--                <li>--}}
            {{--                    <a href="pages/mailbox/mailbox.html">--}}
            {{--                        <i class="fa fa-envelope"></i> <span>Mailbox</span>--}}
            {{--                        <span class="pull-right-container">--}}
            {{--                        <small class="label pull-right bg-yellow">12</small>--}}
            {{--                        <small class="label pull-right bg-green">16</small>--}}
            {{--                        <small class="label pull-right bg-red">5</small>--}}
            {{--                        </span>--}}
            {{--                    </a>--}}
            {{--                </li>--}}

            <li class="header">Other</li>

            @if(\Auth::user()->role_id == 1)
                <li class="treeview" style="height: auto;">
                    <a href="#">
                        <i class="fa fa-cog"></i> <span>Quản Lý Hệ Thống</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu" style="display: none;">
                        <li><a href="{{route('admin.setting.index')}}"><i class="fa fa-info-circle"></i> Thay đổi Thông Tin</a></li>
                    </ul>
                </li>
            @endif

            <li><a href="{{route('admin.contract.index')}}"><i class="fa fa-envelope"></i> <span>Liên Hệ</span></a></li>

            {{--            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>--}}
            {{--            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>--}}
            {{--            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>--}}
        </ul>
    </section>
    <!-- /.sidebar -->
    @endif
</aside>
