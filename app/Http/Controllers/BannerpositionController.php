<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Bannerposition;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BannerpositionController extends Controller
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

        // if check admin
        if (Auth::user()->role_id == 1) { // nếu user là admin thì show combobox filter dữ liệu
            if ($filter_type == 1) {
                //$data = Role::withTrashed()->latest()->paginate(10); // show tất cả dữ liệu nếu $filter_type == 1
                $data = Bannerposition::withTrashed()->latest()->get(); // show tất cả dữ liệu nếu $filter_type == 1
            } elseif ($filter_type == 2) {
                //$data = Role::latest()->paginate(10); // ko show dữ liệu những thằng bị softDelete nếu $filter_type == 2
                $data = Bannerposition::latest()->get(); // ko show dữ liệu những thằng bị softDelete nếu $filter_type == 2
            } else {
                //$data = Role::onlyTrashed()->latest()->paginate(10); // chỉ show dữ liệu những thằng bị softDelete nếu $filter_type == 3
                $data = Bannerposition::onlyTrashed()->latest()->get(); // chỉ show dữ liệu những thằng bị softDelete nếu $filter_type == 3
            }

        } else { // nếu tài khoàn ko phải admin thì ko show combobox filter

            // Cách 1 : lấy dữ liệu mới nhất và phân trang - mỗi trang 10 bản ghi
            //$data = Role::latest()->paginate(10);
            $data = Bannerposition::latest()->get();
        }



        // truyền dữ liệu sang view với 2 tham số 1 tên view và 2 là mảng dữ liệu truyền sang
        return view('backend.bannerposition.index', ['data' => $data, 'filter_type' => $filter_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.bannerposition.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // xác thực dữ liệu - validate từ phía server (ưu điểm user ko thể tắt validate - nhược điểm gây chậm server)
        $request->validate([
            'name' => 'required|max:255',
        ],[
            'name.required' => 'Bạn cần phải nhập tên vị trí banner',
        ]);

        $Bannerposition = new Bannerposition();
        $Bannerposition->name = $request->input('name');

        $Bannerposition->description = $request->input('description');
        $Bannerposition->created_at = date('Y-m-d H:i:s');
        //Trang thai
        $is_active = 0;
        if($request->has('is_active')) { //Kiem tra xem is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        $Bannerposition->is_active = $is_active;
        $Bannerposition->save();

        //Chuyen huong ve trang danh sach
        return redirect()->route('admin.bannerposition.index');
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
        $model = Bannerposition::findOrFail($id);
        return view('backend.bannerposition.edit', ['model' => $model]);
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
        // xác thực dữ liệu - validate từ phía server (ưu điểm user ko thể tắt validate - nhược điểm gây chậm server)
        $request->validate([
            'name' => 'required|max:255',
        ],[
            'name.required' => 'Bạn cần phải nhập tên vị trí banner',
        ]);

        $Bannerposition = Bannerposition::findOrFail($id);

        $Bannerposition->name = $request->input('name');
        $Bannerposition->description = $request->input('description');
        $Bannerposition->updated_at = date('Y-m-d H:i:s');
        //Trang thai
        $is_active = 0;
        if($request->has('is_active')) { //Kiem tra xem is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        $Bannerposition->is_active = $is_active;
        $Bannerposition->save();

        //Chuyen huong ve trang danh sach
        return redirect()->route('admin.bannerposition.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkExitsAccount = Banner::where('position_id', $id)->first(); // kiểm tra id role muốn xoá có chứa dữ liệu account nào ko ?

        if ($checkExitsAccount != null){
            return response()->json([
                'status' => false,
                'msg' => 'Xóa không thành công, do vị trí Banner này tồn tại một hoặc nhiều Banner liên quan !!!'
            ]);
        }

         Bannerposition::destroy($id);

        return response()->json([
            'status' => true,
            'msg' => 'Xóa thành công'
        ]);
    }

    // Hàm Khôi phục dữ liệu bị softDelete
    public function restore($id)
    {
        $Bannerposition = Bannerposition::onlyTrashed()->findOrFail($id);
        $Bannerposition->restore(); // truyền id đã bị xoá vào hàm khôi phục

        return response()->json([
            'status' => true,
            'msg' => 'Khôi phục thành công'
        ]);
    }
}
