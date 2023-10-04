@extends('backend.layouts.main')

{{--Create: Lê Thành Trung--}}
{{--Date : 1/10/2023--}}
{{--Danh Sách order--}}

@section('content')
    <section class="content-header">
        <h1>
            Danh Sách Đăng Ký Sản Phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Danh Sách Đăng Ký Sản Phẩm</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">


            <!-- Bảng ver.2 -->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="form-group" style="width: 150px;float: left;margin: 0">
                            <select class="form-control" id="filter_type" name="filter_type">
                                <option {{ $filter_type == 1 ? 'selected' : '' }} value="1">Tất cả</option>
                                <option {{ $filter_type == 2 ? 'selected' : '' }} value="2">Đang Sử Dụng</option>
                                <option {{ $filter_type == 3 ? 'selected' : '' }} value="3">Thùng rác</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width: 10px">TT</th>
                                <th>Tên Khách Hàng</th>
                                <th>SĐT</th>
                                <th>Địa Chỉ</th>
                                <th>Trạng Thái</th>
                                <th>Nội dung</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider table-divider-color">
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->fullname }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
{{--                                        {{ !empty($item->order_status->name) ? $item->order_status->name : '' }}--}}
                                        @if(($item->order_status->id)==1)
                                            <span class="badge bg-gray">{{$item->order_status->name}}</span>
                                        @elseif(($item->order_status->id)==2)
                                            <span class="badge bg-green">{{$item->order_status->name}}</span>
                                        @else
                                            <span class="badge bg-red">{{$item->order_status->name}}</span>
                                        @endif
                                    </td> {{-- kiểm tra nếu order_status ko null thì show ra order_status name còn ko (?) hiển thị ''--}}

                                    <td>{{ $item->note }}</td>
                                    <td class="action" >
                                        <a href="{{ route('admin.order.edit', ['order' => $item->id]) }}"><span title="Chỉnh sửa" type="button" class="btn btn-flat btn-primary"><i class="fa fa-edit"></i></span></a>
                                        @if($item->deleted_at == null)
                                            <span  data-id="{{ $item->id }}" title="Xóa" class="btn btn-flat btn-danger deleteItem"><i class="fa fa-trash"></i></span>
                                            <span style="display:none;" data-id="{{ $item->id }}" title="Khôi phục" class="btn btn-flat btn-warning restoreItem"><i class="fa fa-refresh"></i></span>
                                        @else
                                            <span style="display:none;" data-id="{{ $item->id }}" title="Xóa" class="btn btn-flat btn-danger deleteItem"><i class="fa fa-trash"></i></span>
                                            <span  data-id="{{ $item->id }}" title="Khôi phục" class="btn btn-flat btn-warning restoreItem"><i class="fa fa-refresh"></i></span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- Bảng ver.2 -end-->
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        $( document ).ready(function() {
            //bắt sự kiện nút xoá
            $('.deleteItem').click(function () {
                var id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Bạn có chắc muốn xóa ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url : '/admin/order/'+id,
                            type: 'DELETE',
                            data: {},
                            success: function (res) {
                                if(res.status) {
                                    $('.item-'+id).remove();

                                    var filter_type = $('#filter_type').val();
                                    window.location.href = "{{ route('admin.order.index') }}?filter_type="+filter_type;
                                } else {
                                    Swal.fire(
                                        'Thông báo !',
                                        res.msg,
                                        'error'
                                    )
                                }
                            },
                            error: function (res) {
                            }
                        });
                    }
                });
            });

            // bắt sự kiện nút khôi phục
            $('.restoreItem').click(function () {
                var id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Bạn có muốn khôi phục ?',
                    text: "Dữ liệu sẽ được khôi phục lại danh sách vai trò",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url : '/admin/order/restore/'+id,
                            type: 'POST',
                            data: {},
                            success: function (res) {
                                if(res.status) {
                                    Swal.fire(
                                        'Thông báo !',
                                        'Khôi phục thành công',
                                        'success'
                                    )

                                    var filter_type = $('#filter_type').val();
                                    window.location.href = "{{ route('admin.order.index') }}?filter_type="+filter_type;

                                } else {
                                    Swal.fire(
                                        'Thông báo !',
                                        'Có lỗi xảy ra',
                                        'error'
                                    )
                                }
                            },
                            error: function (res) {
                            }
                        });
                    }
                });
            });

            // bắt sự kiện combobox filter
            $('#filter_type').change(function () {
                var filter_type = $('#filter_type').val();
                // sử dụng window.location.href để truyền dữ liệu filter và chuyển trang
                window.location.href = "{{ route('admin.order.index') }}?filter_type="+filter_type;
            });

            // bắt sự kiện filter table by colum and search
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            });
        });
    </script>
@endsection
