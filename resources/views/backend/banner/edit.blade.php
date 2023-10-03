@extends('backend.layouts.main')
{{--Create: Lê Thành Trung--}}
{{--Date : 19/9/2023--}}
{{--Trang Update Banner--}}

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            CHỈNH SỬA BANNER
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Quản lý Banner</a></li>
            <li class="active">Chỉnh Sửa Banner</li>
        </ol>
    </section>
    <!-- Content Header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('admin.banner.update', ['banner' =>$model->id])}}" enctype="multipart/form-data"> <!--enctype sử dụng để upload file -->
                        @csrf<!-- phòng chống hack thông qua cookie (quyền chứng thực) -->
                        @method('PUT')
                        <div class="box-body">

                            <div class="form-group">
                                <label for="title">Tiêu Đề <span style="color: red">(*)</span>: </label>
                                <input name="title" class="form-control" id="title" value="{{$model->title}}">
                            </div>

                            <div class="form-group">
                                <label for="image">Chọn hình ảnh <span style="color: red">(*)</span>: </label>
                                <input type="file" name="image" id="image">
                            </div>

                            @if($model->image && file_exists(public_path($model->image)))
                                <img src="{{asset($model->image)}}" width="100px" height="75px" alt="">
                            @else
                                <img src="{{asset('frontend\Img404.png')}}" width="100px" height="75px" alt="">
                            @endif

                            <div class="form-group">
                                <label for="url">URL: </label>
                                <input name="url" class="form-control" id="url" value="{{$model->url}}">
                            </div>

                            <div class="form-group">
                                <label for="target">Chọn Target : </label>
                                <select id="target" name="target" class="form-control">
                                    <option @if($model->target == 0) selected @endif value="0">_self</option>
                                    <option @if($model->target == 1) selected @endif value="1">_blank</option>
                                </select>
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="type">Loại Banner: </label>--}}
{{--                                <select id="type" name="type" class="form-control">--}}
{{--                                    <option @if($model->type == null) selected @endif value=" ">-- Chọn Loại Banner --</option>--}}
{{--                                    <option @if($model->type == 1) selected @endif value="1">Banner bên phải</option>--}}
{{--                                    <option @if($model->type == 2) selected @endif value="2">Banner bên Trái</option>--}}
{{--                                    <option @if($model->type == 3) selected @endif value="3">Banner bên phía trên</option>--}}
{{--                                    <option @if($model->type == 4) selected @endif value="4">Banner bên phía dưới</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}

                            <div class="form-group">
                                <label for="position">Vị trí Banner: </label>
                                <select id="position" name="position" class="form-control">
                                    <option @if($model->type == null) selected @endif value=" ">-- Chọn Vị trí Banner --</option>
                                    @foreach($banpo as $item)
                                        <option @if($model->position_id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="is_active">Trạng Thái Kích Hoạt : </label>
                                <select id="is_active" name="is_active" class="form-control">
                                    <option @if($model->is_active == 0) selected @endif value="0">Tắt</option>
                                    <option @if($model->is_active == 1) selected @endif value="1">Kích Hoạt</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label id="label-description">Mô tả <span style="color: red">(*)</span>:</label>
                                <textarea id="description" name="description" class="form-control" rows="3"
                                          placeholder="Mô Tả Nội Dung ... ">{{$model->description}}</textarea>
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
            CKEDITOR.replace( 'description' );
            $('.btnupdate').click(function () {
                if ($('#title').val() === '') {
                    $('#title').notify('Bạn nhập chưa nhập tiêu đề','error',{ position:"right" });
                    document.getElementById('title').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
                        return false;
                }
                var description = CKEDITOR.instances['description'].getData();
                if (description === '') {
                    $('#label-description').notify('Bạn nhập chưa nhập Nội Dung Bài Viết','error',{ position:"right" });
                    document.getElementById('label-description').scrollIntoView();
                    return false;
                }
            });
        });
    </script>
@endsection
