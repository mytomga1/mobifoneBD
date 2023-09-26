<?php

//Create: Lê Thành Trung
//Date : 25/9/2023

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VendorController extends Controller
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
                //$data = Vendor::withTrashed()->latest()->paginate(10); // show tất cả dữ liệu nếu $filter_type == 1
                $data = Vendor::withTrashed()->latest()->get(); // show tất cả dữ liệu nếu $filter_type == 1
            } elseif ($filter_type == 2) {
                //$data = Vendor::latest()->paginate(10); // ko show dữ liệu những thằng bị softDelete nếu $filter_type == 2
                $data = Vendor::latest()->get(); // ko show dữ liệu những thằng bị softDelete nếu $filter_type == 2
            } else {
                //$data = Vendor::onlyTrashed()->latest()->paginate(10); // chỉ show dữ liệu những thằng bị softDelete nếu $filter_type == 3
                $data = Vendor::onlyTrashed()->latest()->get(); // chỉ show dữ liệu những thằng bị softDelete nếu $filter_type == 3
            }

        } else { // nếu tài khoàn ko phải admin thì ko show combobox filter

            // Cách 1 : lấy dữ liệu mới nhất và phân trang - mỗi trang 10 bản ghi
            //$data = Vendor::latest()->paginate(10);
            $data = Vendor::latest()->get();
        }

        //Cách 2: Lấy dữ liệu phân trang - mỗi trang 10 bản ghi
        //$data = Vendor::paginate(10);

        //kiểm tra dữ liệu
        //dd($data);

        //Cách 3: lấy toàn bộ dữ liệu
        //$data = Vendor::all(); // tương đương với câu lệnh SELECT * FORM Vendors

        // truyền dữ liệu sang view với 2 tham số 1 tên view và 2 là mảng dữ liệu truyền sang
        return view('backend.vendor.index', ['data' => $data, 'filter_type' => $filter_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //lấy tất cả dữ liệu từ bản Vendors
        $data = Vendor::all(); // => Select * form Vendors

        // truyền dữ liệu thấy dc qua view create
        return view('backend.vendor.create', ['data'=> $data]);
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'website' => 'required|max:255',
        ],[
            'name.required' => 'Bạn cần phải nhập tên Nhà cung cấp',
            'image.required' => 'Bạn chưa chọn file ảnh',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
            'email.required' => 'Bạn cần phải nhập email Nhà cung cấp',
            'phone.required' => 'Bạn cần phải nhập số điện thoại Nhà cung cấp',
            'address.required' => 'Bạn cần phải nhập địa chỉ Nhà cung cấp',
            'website.required' => 'Bạn cần phải nhập website Nhà cung cấp',
        ]);

        $Vendor = new Vendor();
        $Vendor->name = $request->input('name');

        //  Trong laravel sử dụng <use Illuminate\Support\Str;> để chuyển đổi tiêu đề thành dạng slug
        //  :: trong laravel tượng trưng cho hàm static
        $Vendor->slug = Str::slug($request->input('name'));
        $Vendor->email = $request->input('email');
        $Vendor->phone = $request->input('phone');
        $Vendor->address = $request->input('address');
        $Vendor->website = $request->input('website');

        if($request->hasFile('image')){// kiểm tra xem có ảnh dc chọn ko

            // get file - tạo ra 1 biến file đại diện cho file ảnh dc up lên
            $file = $request->file('image');

            // đặt tên cho file ảnh (thời gian tạo + tên ảnh)
            $filename = time().'_'.$file->getClientOriginalName();

            // định nghĩa đường dẫn lưu trữ file ảnh
            $path_upload = 'frontend/img/vendor/';

            // thực hiện chuyển file ảnh (thông qua hàm move()) vào thư mục đã cấu hình
            $file->move($path_upload,$filename);

            //lưu lại trên
            $Vendor->image = $path_upload.$filename;
        }

        if(($request->position)==null){
            $Vendor->position = $request->input('0');
        }else{
            $Vendor->position = $request->input('position');
        }

        $Vendor->is_active = $request->input('is_active');

        $Vendor->created_at = date('Y-m-d H:i:s');

        $Vendor->save();

        //sau khi thêm dữ liệu vendors vào db thành công chuyển hướng về trang danh sách
        // hàm redirect() tương tự hàm header() dùng chuyễn hướng trang
        return redirect()->route('admin.vendor.index');
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
        $model = Vendor::findOrFail($id);
        //lấy tất cả dữ liệu từ bản vendors
        $data = Vendor::all(); // => Select * form vendors

        // sau khi tìm dữ liệu thành công, bắt đầu chuyên dữ liệu đó sang view edit
        return view('backend.vendor.edit', ['model' => $model, 'data' => $data]);
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
        $Vendor = Vendor::findOrFail($id);
        $Vendor->name = $request->input('name');

        //  Trong laravel sử dụng <use Illuminate\Support\Str;> để chuyển đổi tiêu đề thành dạng slug
        //  :: trong laravel tượng trưng cho hàm static
        $Vendor->slug = Str::slug($request->input('name'));
        $Vendor->email = $request->input('email');
        $Vendor->phone = $request->input('phone');
        $Vendor->address = $request->input('address');
        $Vendor->website = $request->input('website');

        if($request->hasFile('image')){// kiểm tra xem có ảnh dc chọn ko
            // Sử Dụng Hàm unlink() để xoá file ảnh củ khi thực hiện upload ảnh mới
            @unlink(public_path($Vendor->image));

            // get file - tạo ra 1 biến file đại diện cho file ảnh dc up lên
            $file = $request->file('image');

            // đặt tên cho file ảnh (thời gian tạo + tên ảnh)
            $filename = time().'_'.$file->getClientOriginalName();

            // định nghĩa đường dẫn lưu trữ file ảnh
            $path_upload = 'frontend/img/categorie/';

            // thực hiện chuyển file ảnh (thông qua hàm move()) vào thư mục đã cấu hình
            $file->move($path_upload,$filename);

            //lưu lại trên
            $Vendor->image = $path_upload.$filename;
        }


        $Vendor->position = $request->input('position');
        $Vendor->is_active = $request->input('is_active');

        $Vendor->updated_at = date('Y-m-d H:i:s');

        $Vendor->save();

        //sau khi thêm dữ liệu Vendor vào db thành công chuyển hướng về trang danh sách
        // hàm redirect() tương tự hàm header() dùng chuyễn hướng trang
        return redirect()->route('admin.vendor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkExitsProduct = Product::where('vendor_id', $id)->first(); // kiểm tra vendor id muốn xoá có chứa dữ liệu Product nào ko ?

        if ($checkExitsProduct != null){
            return response()->json([
                'status' => false,
                'msg' => 'Xóa không thành công, do nhà cung cấp này đang tồn tại một hoặc nhiều sản phẩm !!!'
            ]);
        }

        Vendor::destroy($id);

        return response()->json([
            'status' => true,
            'msg' => 'Xóa thành công'
        ]);
    }

    // Hàm Khôi phục dữ liệu bị softDelete
    public function restore($id)
    {
        $Vendor = Vendor::onlyTrashed()->findOrFail($id);
        $Vendor->restore(); // truyền id đã bị xoá vào hàm khôi phục

        return response()->json([
            'status' => true,
            'msg' => 'Khôi phục thành công'
        ]);
    }
}
