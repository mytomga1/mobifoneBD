@extends('backend.layouts.main')
{{--Create: Lê Thành Trung--}}
{{--Date : 22/9/2023--}}
{{--Trang edit category--}}

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-fw fa-edit"></i>
            CHỈNH SỬA DANH MỤC
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{asset('/admin')}}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
            <li><a href="{{route('admin.category.index')}}"><i class="fa fa-dashboard"></i> Quản lý Danh Mục</a></li>
            <li class="active">Chỉnh Sửa Danh Mục</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Lỗi !</h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('admin.category.update', ['category' => $model->id]) }}" enctype="multipart/form-data"> <!--enctype sử dụng để upload file -->
                        @csrf<!-- phòng chống hack thông qua cookie (quyền chứng thực) -->
                        @method('PUT')
                        <div class="box-body">

                            <div class="form-group">
                                <label for="name">Tên Danh Mục (*): </label>
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
                                <label for="">Chọn Danh Mục Cha</label>
                                <select class="form-control" name="parent_id" id="parent_id">
                                    <option value="0">-- Chọn --</option>
                                    @foreach($data as $item)
                                        <option {{ $item->id == $model->parent_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="position">Vị trí danh mục</label>
                                <select class="form-control" name="position" id="position">
                                    <option value="0">---Chọn vị trí danh mục---</option>
                                    @foreach($positions  as $item)
                                        <option @if($model->position == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="type">Loại Danh Mục</label>
                                <select class="form-control" name="type" id="type" required>
                                    <option value="">-- chọn --</option>
                                    <option @if($model->type == 1) selected @endif value="1">Danh mục Sản Phẩm</option>
                                    <option @if($model->type == 2) selected @endif value="2">Danh mục Tin Tức</option>
                                </select>
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
                            <button type="submit" class="btn btn-primary btnSave">Lưu lại</button>
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
            $('.btnSave').click(function () {
                if ($('#name').val() === '') {
                    $('#name').notify('Bạn nhập chưa nhập tên danh mục','error',{ position:"right" });
                    document.getElementById('name').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
                        return false;
                }
                if ($('#type').val() === '') {
                    $('#type').notify('Bạn chưa chọn Loại danh mục','error');
                    document.getElementById('vendor_id').scrollIntoView();
                    return false;
                }
            });
        });
    </script>
@endsection
