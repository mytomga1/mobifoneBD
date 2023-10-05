<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $filter_type = $params['filter_type'] ?? 2;

        if ($filter_type == 1) {
            $data = Order::withTrashed()->latest()->get(); // show tất cả dữ liệu nếu $filter_type == 1
            //$data = Banner::withTrashed()->latest()->paginate(10); // show tất cả dữ liệu nếu $filter_type == 1
        } elseif ($filter_type == 2) {
            $data = Order::latest()->get(); // ko show dữ liệu những thằng bị softDelete nếu $filter_type == 2
            //$data = Banner::latest()->paginate(10); // ko show dữ liệu những thằng bị softDelete nếu $filter_type == 2
        } else {
            $data = Order::onlyTrashed()->latest()->get(); // chỉ show dữ liệu những thằng bị softDelete nếu $filter_type == 3
            //$data = Banner::onlyTrashed()->latest()->paginate(10); // chỉ show dữ liệu những thằng bị softDelete nếu $filter_type == 3

            $data = Order::onlyTrashed()->latest()->get();
        }


        $order_status = Order_status::all();

        return view('backend.order.index', ['data' => $data, 'order_status'=>$order_status, 'filter_type' => $filter_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate form
        $request->validate([
            'fullname' => 'required|max:255',
            'phone' => 'required',
            'address' => 'required|max:255',
            'note' => 'required',
        ],[
            'fullname.required' => 'Bạn chưa nhập họ và tên',
            'phone.required' => 'Bạn chưa nhập SĐT',
            'address.required' => 'Bạn chưa nhập địa chỉ',
            'note.required' => 'Bạn chưa nhập gói đăng ký ',
        ]);

        $model = new Order();
        $model->fullname = $request->input('name');
        $model->phone = $request->input('phone');
        $model->address = $request->input('email');
        $model->note = $request->input('content');
        $model->order_status_id = 1;
        $model->save();

        return view('backend.order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order_status = Order_status::all();
        $model = Order::findOrFail($id);

        return view('backend.order.edit', ['model' => $model, 'order_status'=>$order_status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->order_status_id = $request->input('order_status');

        $order->updated_at = date('Y-m-d H:i:s');

        $order->save();

        return redirect()->route('admin.order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::destroy($id);

        return response()->json([
            'status' => true,
            'msg' => 'Xóa thành công'
        ]);
    }

    public function restore($id)
    {
        $Order = Order::onlyTrashed()->findOrFail($id);
        $Order ->restore(); // truyền id đã bị xoá vào hàm khôi phục

        return response()->json([
            'status' => true,
            'msg' => 'Khôi phục thành công'
        ]);
    }
}
