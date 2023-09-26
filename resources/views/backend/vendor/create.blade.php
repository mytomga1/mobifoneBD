@extends('backend.layouts.main')
{{--Create: Lê Thành Trung--}}
{{--Date : 25/9/2023--}}
{{--Thêm mới nhà cung cấp--}}

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            THÊM MỚI CUNG CẤP
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{asset('/admin')}}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
            <li><a href="{{route('admin.vendor.index')}}"><i class="fa fa-dashboard"></i> Quản lý nhà cung cấp</a></li>
            <li class="active">Tạo mới nhà cung cấp</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Error Message -->
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Cảnh Báo !</h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div><!-- End Error Message -->

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('admin.vendor.store')}}" enctype="multipart/form-data"> <!--enctype sử dụng để upload file -->
                        @csrf<!-- phòng chống hack thông qua cookie (quyền chứng thực) -->
                        <div class="box-body">

                            <div class="form-group">
                                <label for="name">Tên nhà cung cấp (*): </label>
                                <input name="name" class="form-control" id="name" placeholder="Nhập tên nhà cung cấp">
                            </div>

                            <div class="form-group">
                                <label for="image">Chọn hình ảnh (*): </label>
                                <input type="file" name="image" id="image">
                            </div>

                            <div class="form-group">
                                <label for="email">email (*): </label>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Nhập email">
                            </div>

                            <div class="form-group">
                                <label for="phone">số điện thoại (*):</label>
                                <input min="0" type="number" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại nhà cung cấp">
                            </div>

                            <div class="form-group">
                                <label for="address">Địa Chỉ nhà cung cấp (*): </label>
                                <input name="address" class="form-control" id="address" placeholder="Nhập địa chỉ nhà cung cấp">
                            </div>

                            <div class="form-group">
                                <label for="website">Website (*): </label>
                                <input name="website" class="form-control" id="website" placeholder="Nhập website nhà cung cấp">
                            </div>

                            <div class="form-group">
                                <label for="position">Vị trí</label>
                                <input min="0" type="number" class="form-control" id="position" name="position" placeholder="0">
                            </div>

                            <div class="form-group">
                                <label for="is_active">Trạng Thái Kích Hoạt: </label>
                                <select id="is_active" name="is_active" class="form-control">
                                    <option selected value="0">Tắt</option>
                                    <option value="1">Kích Hoạt</option>
                                </select>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btnCreate">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

{{--Tạo Validate theo kiểu JS--}}
@section('js')
    <script type="text/javascript">
        $( document ).ready(function() {
            $('.btnCreate').click(function () {
                if ($('#name').val() === '') {
                    $('#name').notify('Bạn nhập chưa nhập tên Nhà cung cấp','error',{ position:"right" });
                    document.getElementById('name').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
                        return false;
                }

                if ($('#image').val() === '') {
                    $('#image').notify('Bạn nhập chưa chọn ảnh ','error',{ position:"right" });
                    document.getElementById('image').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
                        return false;
                }

                if ($('#email').val() === '') {
                    $('#email').notify('Bạn nhập chưa nhập email','error',{ position:"right" });
                    document.getElementById('name').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
                        return false;
                }

                if ($('#phone').val() === '') {
                    $('#phone').notify('Bạn nhập chưa nhập số điện thoại','error',{ position:"right" });
                    document.getElementById('name').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
                        return false;
                }

                if ($('#address').val() === '') {
                    $('#address').notify('Bạn nhập chưa nhập địa chỉ','error',{ position:"right" });
                    document.getElementById('name').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
                        return false;
                }

                if ($('#website').val() === '') {
                    $('#website').notify('Bạn nhập chưa nhập  website','error',{ position:"right" });
                    document.getElementById('name').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
                        return false;
                }

            });
        });
    </script>
@endsection
