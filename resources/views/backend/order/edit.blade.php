@extends('backend.layouts.main')
{{--Create: Lê Thành Trung--}}
{{--Date : 04/10/2023--}}
{{--Trang Edit order--}}

@section('content')
    <section class="content-header">
        <h1>
            Cập Nhật Thông Tin Đơn Hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Cập Nhật Thông Tin Đơn Hàng</li>
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
                        <a href="{{ route('admin.order.index') }}" class="btn btn-info pull-right"><i class="fa fa-list" aria-hidden="true"></i> Danh Sách</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('admin.order.update', ['order' => $model->id ]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên khách hàng</label>
                                <input value="{{ $model->fullname }}" id="name" name="name" type="text" class="form-control" placeholder="" readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">số điện thoại</label>
                                <input value="{{ $model->phone }}" type="number" class="form-control" id="phone" name="phone" placeholder="" readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Địa Chỉ</label>
                                <input value="{{ $model->address }}" type="text" class="form-control" id="phone" name="phone" placeholder="" readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input value="{{ $model->email }}" type="email" class="form-control" id="email" name="email" placeholder="" readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội Dung</label>
                                <textarea class="form-control" rows="3" readonly>{{ $model->note }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="order_status">Trạng Thái đơn hàng: </label>
                                <select id="order_status" name="order_status" class="form-control">
                                    @foreach($order_status as $item)
                                        <option @if($model->order_status_id == $item->id) selected @endif value="{{ $item->id }}">{{$item->name}} </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btnCreate">Cập Nhật trạng thái</button>
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
