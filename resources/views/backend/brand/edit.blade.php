@extends('backend.layouts.main')
{{--Create: Lê Thành Trung--}}
{{--Date : 26/9/2023--}}
{{--Trang Chỉnh sửa nhãn hiệu--}}

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-fw fa-edit"></i>
            CHỈNH SỬA NHÃN HIỆU
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{asset('/admin')}}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
            <li><a href="{{route('admin.brand.index')}}"><i class="fa fa-dashboard"></i> Quản lý nhãn hiệu</a></li>
            <li class="active">Chỉnh Sửa nhãn hiệu</li>
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
                    <form role="form" method="post" action="{{ route('admin.brand.update', ['brand' => $model->id]) }}" enctype="multipart/form-data"> <!--enctype sử dụng để upload file -->
                        @csrf<!-- phòng chống hack thông qua cookie (quyền chứng thực) -->
                        @method('PUT')
                        <div class="box-body">

                            <div class="form-group">
                                <label for="name">Tên nhãn hiệu (*): </label>
                                <input name="name" class="form-control" id="name" value="{{$model->name}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Chọn ảnh</label>
                                <input type="file" name="image" id="image">
                            </div>

                            @if($model->image && file_exists(public_path($model->image)))
                                <img src="{{ asset($model->image) }}" width="100" height="75" alt="">
                            @else
                                <img src="{{ asset('upload/404.png') }}" width="100" height="75" alt="">
                            @endif

                            <div class="form-group">
                                <label for="exampleInputPassword1">Vị trí</label>
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
                    $('#name').notify('Bạn nhập chưa nhập tên nhãn hiệu','error',{ position:"right" });
                    document.getElementById('name').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
                        return false;
                }

            });
        });
    </script>
@endsection
