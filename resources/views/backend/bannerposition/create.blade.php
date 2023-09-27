@extends('backend.layouts.main')
{{--Create: Lê Thành Trung--}}
{{--Date : 26/9/2023--}}
{{--Date : Thêm Vị Trí Banner--}}

@section('content')
    <section class="content-header">
        <h1>
            Thêm Vị Trí Banner
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Thêm Vị Trí Banner</li>
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
                        <a href="{{ route('admin.bannerposition.index') }}" class="btn btn-info pull-right"><i class="fa fa-list" aria-hidden="true"></i> Danh Sách</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('admin.bannerposition.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Tên Vị Trí: </label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="description">Mô Tả: </label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="">
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input value="1" type="checkbox" name="is_active" id="is_active"> Kích hoạt
                                </label>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btnCreate">Thêm</button>
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
            $('.btnCreate').click(function () {
                if ($('#name').val() === '') {
                    $('#name').notify('Bạn nhập chưa nhập tên Vị trí Banner','error',{ position:"right" });
                    document.getElementById('name').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
                        return false;
                }
            });
        });
    </script>
@endsection
