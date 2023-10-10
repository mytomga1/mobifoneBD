<header class="main-header">
    <!-- Logo -->
    <a href="{{asset('/admin')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>M</b></span>
        <!-- logo for regular state and mobile devices -->
{{--        <span class="logo-lg"><b style="color: #0b3e6f">Mobi</b><b style="color: red">Fone</b></span>--}}
        <span><img src="{{asset('frontend\img\logo\Logo_MobiFone_from_2020.png')}}" height="50px" width="200px" alt=""></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if(\Illuminate\Support\Facades\Auth::check()) {{-- kiểm tra user login chưa--}}
                @php
                    $user = \Illuminate\Support\Facades\Auth::user();
                @endphp


                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if($user->avatar && file_exists(public_path($user->avatar)))
                            <img src="{{ asset($user->avatar) }}" class="img-circle" height="25px" width="25px" alt="">
                        @else
                            <img src="{{ asset('frontend\Img404.png') }}" class="img-circle" height="25px" width="25px"  alt="">
                        @endif

                        <span class="hidden-xs">{{ $user->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            @if($user->avatar && file_exists(public_path($user->avatar)))
                                <img src="{{ asset($user->avatar) }}" class="img-circle" alt="">
                            @else
                                <img src="{{ asset('frontend\Img404.png') }}" class="img-circle" alt="">
                            @endif

                            <p>
                                {{ $user->name }}
                                <small>Chào mừng bạn quay lại</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('admin.user.edit',['user' => $user->id]) }}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Đăng xuất</a>
                            </div>
                        </li>
                    </ul>
                </li>

                @endif

            </ul>
        </div>
    </nav>
</header>
