@extends('backend.layouts.main')
{{--Create: Lê Thành Trung--}}
{{--Date : 25/9/2023--}}
{{--Trang cập nhật nhà cung cấp --}}

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-fw fa-edit"></i>
            CHỈNH SỬA NHÀ CUNG CẤP
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{asset('/admin')}}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
            <li><a href="{{route('admin.vendor.index')}}"><i class="fa fa-dashboard"></i> Quản lý nhà cung cấp</a></li>
            <li class="active">Chỉnh Sửa nhà cung cấp</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('admin.vendor.update', ['vendor' => $model->id]) }}" enctype="multipart/form-data"> <!--enctype sử dụng để upload file -->
                        @csrf<!-- phòng chống hack thông qua cookie (quyền chứng thực) -->
                        @method('PUT')
                        <div class="box-body">

                            <div class="form-group">
                                <label for="name">Tên nhà cung cấp (*): </label>
                                <input name="name" class="form-control" id="name" value="{{$model->name}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Chọn ảnh</label>
                                <input type="file" name="image" id="image">
                            </div>

                            @if($model->image && file_exists(public_path($model->image)))
                                <img src="{{ asset($model->image) }}" width="100" height="75" alt="">
                            @else
                                <img src="{{ asset('frontend\Img404.png') }}" width="100" height="75" alt="">
                            @endif

                            <div class="form-group">
                                <label for="email">email (*): </label>
                                <input value="{{ $model->email }}" name="email" type="email" class="form-control" id="email" placeholder="Nhập email">
                            </div>

                            <div class="form-group">
                                <label for="phone">số điện thoại (*):</label>
                                <input value="{{ $model->phone }}" min="0" type="number" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại nhà cung cấp">
                            </div>

                            <div class="form-group">
                                <label for="address">Địa Chỉ nhà cung cấp (*): </label>
                                <input value="{{ $model->address }}" name="address" class="form-control" id="address" placeholder="Nhập địa chỉ nhà cung cấp">
                            </div>

                            <div class="form-group">
                                <label for="website">Website (*): </label>
                                <input value="{{ $model->website }}" name="website" class="form-control" id="website" placeholder="Nhập website nhà cung cấp">
                            </div>

                            <div class="form-group">
                                <label for="position">Vị trí</label>
                                <input value="{{ $model->position }}" min="0" type="number" class="form-control" id="position" name="position" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="is_active">Trạng Thái Kích Hoạt: </label>
                                <select id="is_active" name="is_active" class="form-control">
                                    <option @if($model->is_active == 0) selected @endif value="0">Tắt</option>
                                    <option @if($model->is_active == 1) selected @endif value="1">Kích Hoạt</option>
                                </select>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btnupdate">Cập Nhật</button>
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
            $('.btnupdate').click(function () {
                if ($('#name').val() === '') {
                    $('#name').notify('Bạn nhập chưa nhập tên nhà cung cấp','error',{ position:"right" });
                    document.getElementById('name').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
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
