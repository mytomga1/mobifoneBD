<!-- Sidebar left======================================================================================================================== -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('backend')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Lê Thành Trung</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Tìm kiếm...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="active treeview">
                <a href="{{route('admin.dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview" style="height: auto;">
                <a href="#">
                    <i class="fa fa-map-o"></i> <span>Banner</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{route('admin.banner.index')}}"><i class="fa fa-circle-o"></i> Quản Lý Banner</a></li>
                    <li><a href="{{route('admin.banner.create')}}"><i class="fa fa-circle-o"></i> Tạo Mới Banner</a></li>
                </ul>
            </li>

            <li class="treeview" style="height: auto;">
                <a href="#">
                    <i class="fa fa-list"></i> <span>Danh mục</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Quản Lý Danh mục</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Quản Lý vị trí Danh mục</a></li>
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
                    <li><a href="#"><i class="fa fa-circle-o"></i> Quản Lý Sản Phẩm</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Quản Lý Nhãn Hiệu</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Quản Lý Nhà Cung Cấp</a></li>
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
                    <li><a href="#"><i class="fa fa-circle-o"></i> Danh Sách Bài Viết</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Thêm Mới Bài Viết</a></li>
                </ul>
            </li>

            <li class="treeview" style="height: auto;">
                <a href="#">
                    <i class="fa fa-address-book-o"></i> <span>Quản Lý Tài Khoản</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Danh Sách Tài Khoản</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Danh Sách Vai Trò Tài Khoản</a></li>
                </ul>
            </li>

            <li class="header">Other</li>

            <li class="treeview" style="height: auto;">
                    <a href="#">
                        <i class="fa fa-cog"></i> <span>Quản Lý Hệ Thống</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu" style="display: none;">
                        <li><a href="#"><i class="fa fa-info-circle"></i> Thay đổi Thông Tin</a></li>
                    </ul>
                </li>

            <li><a href="#"><i class="fa fa-envelope"></i> <span>Liên Hệ</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<!-- End Sidebar left==================================================================================================================== -->
