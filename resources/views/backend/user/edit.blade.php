@extends('backend.layouts.main')
{{--Create: Lê Thành Trung--}}
{{--Date : 22/9/2023--}}
{{--Trang Edit user--}}

@section('content')
    <section class="content-header">
        <h1>
            Cập Nhật Thông Tin Tài Khoản
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Cập Nhật Thông Tin Tài Khoản</li>
        </ol>
    </section>

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
                    <div class="box-header with-border">
                        <a href="{{ route('admin.user.index') }}" class="btn btn-info pull-right"><i class="fa fa-list" aria-hidden="true"></i> Danh Sách</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('admin.user.update', ['user' => $model->id ]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input value="{{ $model->name }}" id="name" name="name" type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Avatar</label>
                                <input type="file" name="avatar" id="avatar">
                            </div>

                            @if($model->avatar && file_exists(public_path($model->avatar)))
                                <img src="{{ asset($model->avatar) }}" width="100" height="75" alt="">
                            @else
                                <img src="{{ asset('frontend\Img404.png') }}" width="100" height="75" alt="">
                            @endif

                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input value="{{ $model->email }}" type="email" class="form-control" id="email" name="email" placeholder="" readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật khẩu mới (*)</label>
                                <input value="" type="text" class="form-control" id="password" name="password" placeholder="">

                            </div>

                            @if(\Auth::user()->role_id == 1)
                                <div class="form-group">
                                    <label for="role_id">Vai trò</label>
                                    <select class="form-control" name="role_id" id="role_id">
                                        <option value="">-- Chọn Vai Trò --</option>
                                        @foreach($userRole as $item)
                                            <option @if($model->role_id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input {{ $model->is_active == 1 ? 'checked' : '' }} value="1" type="checkbox" name="is_active" id="is_active"> Kích hoạt
                                    </label>
                                </div>
                            @else
                                <div class="form-group">
                                    <label>Vai trò :&nbsp; {!! $model->role_id == 1 ? '<span class="badge bg-danger">Quản trị viên</span>' : '<span class="badge bg-green">Nhân viên</span>' !!}</label>
                                    <input value="{{ $model->role_id }}" id="role_id" name="role_id" hidden>

                                    <br/>
                                    <label for="exampleInputPassword1">Trạng thái tài khoản :</label>
                                </div>

                                <div class="checkbox">
                                    <label hidden>
                                        <input {{ $model->is_active == 1 ? 'checked' : '' }} value="1" type="checkbox" name="is_active" id="is_active" hidden> Kích hoạt
                                    </label>
                                </div>
                            @endif
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btnCreate">Cập Nhật</button>
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

@section('js')
    <script type="text/javascript">
        $( document ).ready(function() {
            CKEDITOR.replace( 'description' );
            $('.btnCreate').click(function () {
                if ($('#name').val() === '') {
                    $('#name').notify('Bạn nhập chưa nhập tên hiển thị','error');
                    document.getElementById('name').scrollIntoView();
                    return false;
                }
                if ($('#email').val() === '') {
                    $('#email').notify('Bạn nhập chưa nhập email','error');
                    document.getElementById('email').scrollIntoView();
                    return false;
                }
                if ($('#role_id').val() === '0') {
                    $('#role_id').notify('Bạn nhập chưa chọn vai trò tài khoản','error',{ position:"right" });
                    document.getElementById('role_id').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
                        return false;
                }
            });
        });
    </script>
@endsection
