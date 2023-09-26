<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Category;
use App\Models\Position;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use function React\Promise\all;

/**
 * Create: Lê Thành Trung
 * Date : 22/9/2023
 * CategoryController
 */

class CategoryController extends Controller
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
                //$data = Category::withTrashed()->latest()->paginate(10); // show tất cả dữ liệu nếu $filter_type == 1
                $data = Category::withTrashed()->latest()->get(); // show tất cả dữ liệu nếu $filter_type == 1
            } elseif ($filter_type == 2) {
                //$data = Category::latest()->paginate(10); // ko show dữ liệu những thằng bị softDelete nếu $filter_type == 2
                $data = Category::latest()->get(); // ko show dữ liệu những thằng bị softDelete nếu $filter_type == 2
            } else {
                //$data = Category::onlyTrashed()->latest()->paginate(10); // chỉ show dữ liệu những thằng bị softDelete nếu $filter_type == 3
                $data = Category::onlyTrashed()->latest()->get(); // chỉ show dữ liệu những thằng bị softDelete nếu $filter_type == 3
            }

        } else { // nếu tài khoàn ko phải admin thì ko show combobox filter

            // Cách 1 : lấy dữ liệu mới nhất và phân trang - mỗi trang 10 bản ghi
            //$data = Category::latest()->paginate(10);
            $data = Category::latest()->get();
        }

        //Cách 2: Lấy dữ liệu phân trang - mỗi trang 10 bản ghi
        //$data = Category::paginate(10);

        //kiểm tra dữ liệu
        //dd($data);

        //Cách 3: lấy toàn bộ dữ liệu
        //$data = Category::all(); // tương đương với câu lệnh SELECT * FORM Categorys

        // truyền dữ liệu sang view với 2 tham số 1 tên view và 2 là mảng dữ liệu truyền sang
        return view('backend.category.index', ['data' => $data, 'filter_type' => $filter_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //lấy tất cả dữ liệu từ bản category
        $data = Category::all(); // => Select * form category
        $positions = Position::all();

        // truyền dữ liệu thấy dc qua view create
        return view('backend.category.create', ['data'=> $data], ['positions'=> $positions]);
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

        // xác thực dữ liệu - validate từ phía server (ưu điểm user ko thể tắt validate - nhược điểm gây chậm server)
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'type' => 'required|max:255',
        ],[
            'name.required' => 'Bạn cần phải nhập vào tên danh muc',
            'image.required' => 'Bạn chưa chọn file ảnh',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
            'type.required' => 'Bạn cần phải chọn loại danh muc',
        ]);

        $Category = new Category();
        $Category->name = $request->input('name');

        //  Trong laravel sử dụng <use Illuminate\Support\Str;> để chuyển đổi tiêu đề thành dạng slug
        //  :: trong laravel tượng trưng cho hàm static
        $Category->slug = Str::slug($request->input('name'));

        if($request->hasFile('image')){// kiểm tra xem có ảnh dc chọn ko

            // get file - tạo ra 1 biến file đại diện cho file ảnh dc up lên
            $file = $request->file('image');

            // đặt tên cho file ảnh (thời gian tạo + tên ảnh)
            $filename = time().'_'.$file->getClientOriginalName();

            // định nghĩa đường dẫn lưu trữ file ảnh
            $path_upload = 'frontend/img/categorie/';

            // thực hiện chuyển file ảnh (thông qua hàm move()) vào thư mục đã cấu hình
            $file->move($path_upload,$filename);

            //lưu lại trên
            $Category->image = $path_upload.$filename;
        }

        $Category->parent_id = $request->input('parent_id');

        //Check Vi tri
        $position=0;
        if($request->has('position')){
            $position = $request->input('position');
            if ($position == null) $position=0;
        }
        $Category->position = $position;
        //$Category->position = $request->input('position');

        $Category->type = $request->input('type');

        $Category->is_active = $request->input('is_active');

        $Category->created_at = date('Y-m-d H:i:s');

        $Category->save();

        //sau khi thêm dữ liệu Category vào db thành công chuyển hướng về trang danh sách
        // hàm redirect() tương tự hàm header() dùng chuyễn hướng trang
        return redirect()->route('admin.category.index');
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
        $model = Category::findOrFail($id);
        $positions = Position::all();
        //lấy tất cả dữ liệu từ bản category
        $data = Category::all(); // => Select * form category

        // sau khi tìm dữ liệu thành công, bắt đầu chuyên dữ liệu đó sang view edit
        return view('backend.category.edit', ['model' => $model, 'data' => $data], ['positions'=> $positions]);
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
            'type' => 'required|max:255',
        ],[
            'name.required' => 'Bạn cần phải nhập vào tên danh muc',
            'type.required' => 'Bạn cần phải chọn loại danh muc',
        ]);

        $Category = Category::findOrFail($id);
        $Category->name = $request->input('name');

        //  Trong laravel sử dụng <use Illuminate\Support\Str;> để chuyển đổi tiêu đề thành dạng slug
        //  :: trong laravel tượng trưng cho hàm static
        $Category->slug = Str::slug($request->input('name'));

        if($request->hasFile('image')){// kiểm tra xem có ảnh dc chọn ko
            // Sử Dụng Hàm unlink() để xoá file ảnh củ khi thực hiện upload ảnh mới
            @unlink(public_path($Category->image));

            // get file - tạo ra 1 biến file đại diện cho file ảnh dc up lên
            $file = $request->file('image');

            // đặt tên cho file ảnh (thời gian tạo + tên ảnh)
            $filename = time().'_'.$file->getClientOriginalName();

            // định nghĩa đường dẫn lưu trữ file ảnh
            $path_upload = 'frontend/img/categorie/';

            // thực hiện chuyển file ảnh (thông qua hàm move()) vào thư mục đã cấu hình
            $file->move($path_upload,$filename);

            //lưu lại trên
            $Category->image = $path_upload.$filename;
        }

        $Category->parent_id = $request->input('parent_id');

        //Check Vi tri
        $position=0;
        if($request->has('position')){
            $position = $request->input('position');
            if ($position == null) $position=0;
        }
        $Category->position = $position;
        //$Category->position = $request->input('position');

        $Category->type = $request->input('type');

        $Category->is_active = $request->input('is_active');

        $Category->updated_at = date('Y-m-d H:i:s');

        $Category->save();

        //sau khi thêm dữ liệu Category vào db thành công chuyển hướng về trang danh sách
        // hàm redirect() tương tự hàm header() dùng chuyễn hướng trang
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$Category = Category::findOrFail($id);

        $checkExitsProduct = Product::where('category_id', $id)->first(); // kiểm tra id danh mục muốn xoá có chứa dữ liệu sản phẩm nào ko ?
        $checkExitsArticles = Articles::where('category_id', $id)->first(); // kiểm tra id danh mục muốn xoá có chứa dữ liệu sản phẩm nào ko ?

        if ($checkExitsProduct != null) { // kiểm tra dc danh mục muốn xoá có chứa dữ liệu thì trả về 'status' => false và truyền mesage phản hồi user
            return response()->json([
                'status' => false,
                'msg' => 'Xóa không thành công, do danh mục này tồn tại một hoặc nhiều sản phẩm !!!'
            ]);
        }else if ($checkExitsArticles != null){
            return response()->json([
                'status' => false,
                'msg' => 'Xóa không thành công, do danh mục này tồn tại một hoặc nhiều bài viết !!!'
            ]);
        }

        // xóa ảnh cũ
        //@unlink(public_path($Category->image));

        Category::destroy($id);

        return response()->json([
            'status' => true,
            'msg' => 'Xóa thành công'
        ]);
    }

    // Hàm Khôi phục dữ liệu bị softDelete
    public function restore($id)
    {
        $Category = Category::onlyTrashed()->findOrFail($id);
        $Category->restore(); // truyền id đã bị xoá vào hàm khôi phục

        return response()->json([
            'status' => true,
            'msg' => 'Khôi phục thành công'
        ]);
    }
}
