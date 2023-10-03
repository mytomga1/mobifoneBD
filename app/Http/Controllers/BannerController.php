<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Bannerposition;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
/**
 * Create: Lê Thành Trung
 * Date : 19/9/2023
 * BannerController
 */

class BannerController extends Controller
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
            $data = Banner::withTrashed()->latest()->get(); // show tất cả dữ liệu nếu $filter_type == 1
            //$data = Banner::withTrashed()->latest()->paginate(10); // show tất cả dữ liệu nếu $filter_type == 1
        } elseif ($filter_type == 2) {
            $data = Banner::latest()->get(); // ko show dữ liệu những thằng bị softDelete nếu $filter_type == 2
            //$data = Banner::latest()->paginate(10); // ko show dữ liệu những thằng bị softDelete nếu $filter_type == 2
        } else {
            $data = Banner::onlyTrashed()->latest()->get(); // chỉ show dữ liệu những thằng bị softDelete nếu $filter_type == 3
            //$data = Banner::onlyTrashed()->latest()->paginate(10); // chỉ show dữ liệu những thằng bị softDelete nếu $filter_type == 3

            $data = Banner::onlyTrashed()->latest()->get();
        }

        //Cách 2: Lấy dữ liệu phân trang - mỗi trang 10 bản ghi
        //$data = Banner::paginate(10);

        //kiểm tra dữ liệu
        //dd($data);

        //Cách 3: lấy toàn bộ dữ liệu
        //$data = Banner::all(); // tương đương với câu lệnh SELECT * FORM Banners

        // truyền dữ liệu sang view với 2 tham số 1 tên view và 2 là mảng dữ liệu truyền sang
        return view('backend.banner.index', ['data' => $data, 'filter_type' => $filter_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bannerposition = Bannerposition::all();
        return view('backend.banner.create', ['bannerposition' => $bannerposition]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * echo'<pre>';
         * print_r($request->all());
         * die;
         * ==> sử dụng hàm dd(); thay cho 3 thằng trên
         */

//         xác thực dữ liệu - validate từ phía server (ưu điểm user ko thể động chạm vào phần này - nhược điểm góp 1 phần làm chậm server)
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'target' => 'required',
            'description' => 'required',
        ],[
            'title.required' => 'Bạn cần phải nhập vào tiêu đề cho banner',
            'image.required' => 'Bạn cần phải chọn file ảnh cho banner',
            'image.image' => 'File ảnh phải có định dạng jpeg,png,jpg,gif,svg',
            'target.required' => 'Bạn cần chon target',
            'description.required' => 'Bạn cần phải nhập vào mô tả cho banner',
        ]);

        $banner = new Banner();
        $banner->title = $request->input('title');

        //  Trong laravel sử dụng <use Illuminate\Support\Str;> để chuyển đổi tiêu đề thành dạng slug
        //  :: trong laravel tượng trưng cho hàm static
        $banner->slug = Str::slug($request->input('title'));

        if($request->hasFile('image')){// kiểm tra xem có ảnh dc chọn ko

            // get file - tạo ra 1 biến file đại diện cho file ảnh dc up lên
            $file = $request->file('image');

            // đặt tên cho file ảnh (thời gian tạo + tên ảnh)
            $filename = time().'_'.$file->getClientOriginalName();

            // định nghĩa đường dẫn lưu trữ file ảnh
            $path_upload = 'frontend/img/banner/';

            // thực hiện chuyển file ảnh (thông qua hàm move()) vào thư mục đã cấu hình
            $file->move($path_upload,$filename);

            //lưu lại trên
            $banner->image = $path_upload.$filename;
        }

        $banner->url = $request->input('url');
        $banner->target = $request->input('target');
//        $banner->type = $request->input('type');
        $banner->position_id = $request->input('position');
        $banner->is_active = $request->input('is_active');
        $banner->description = $request->input('description');

        $banner->created_at = date('Y-m-d H:i:s');

        $banner->save();

        //sau khi thêm dữ liệu banner vào db thành công chuyển hướng về trang danh sách
        // hàm redirect() tương tự hàm header() dùng chuyễn hướng trang
        return redirect()->route('admin.banner.index');
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
        $model = Banner::findOrFail($id);
        $banpo = Bannerposition::all();

        // sau khi tìm dữ liệu thành công, bắt đầu chuyên dữ liệu đó sang view edit
        return view('backend.banner.edit', ['model'=>$model],['banpo'=>$banpo]);
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
        $banner = Banner::findOrFail($id);
        $banner->title = $request->input('title');

        //  Trong laravel sử dụng <use Illuminate\Support\Str;> để chuyển đổi tiêu đề thành dạng slug
        //  :: trong laravel tượng trưng cho hàm static
        $banner->slug = Str::slug($request->input('title'));

        if($request->hasFile('image')){// kiểm tra xem có ảnh dc chọn ko
            // Sử Dụng Hàm unlink() để xoá file ảnh củ khi thực hiện upload ảnh mới
            @unlink(public_path($banner->image));

            // get file - tạo ra 1 biến file đại diện cho file ảnh dc up lên
            $file = $request->file('image');

            // đặt tên cho file ảnh (thời gian tạo + tên ảnh)
            $filename = time().'_'.$file->getClientOriginalName();

            // định nghĩa đường dẫn lưu trữ file ảnh
            $path_upload = 'frontend/img/banner/';

            // thực hiện chuyển file ảnh (thông qua hàm move()) vào thư mục đã cấu hình
            $file->move($path_upload,$filename);

            //lưu lại trên
            $banner->image = $path_upload.$filename;
        }

        $banner->url = $request->input('url');
        $banner->target = $request->input('target');
//        $banner->type = $request->input('type');
        $banner->position_id = $request->input('position');
        $banner->is_active = $request->input('is_active');
        $banner->description = $request->input('description');


        $banner->updated_at = date('Y-m-d H:i:s');

        $banner->save();

        //sau khi thêm dữ liệu banner vào db thành công chuyển hướng về trang danh sách
        // hàm redirect() tương tự hàm header() dùng chuyễn hướng trang
        return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::destroy($id);

        return response()->json([
            'status' => true,
            'msg' => 'Xóa thành công'
        ]);
    }

    // hàm khôi phục dữ liệu khi bị softdelete
    public function restore($id)
    {
        $Banner = Banner::onlyTrashed()->findOrFail($id);
        $Banner->restore(); // truyền id đã bị xoá vào hàm khôi phục

        return response()->json([
            'status' => true,
            'msg' => 'Khôi phục thành công'
        ]);
    }
}
