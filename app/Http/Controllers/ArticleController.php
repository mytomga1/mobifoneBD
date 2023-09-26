<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
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
                $data = Articles::withTrashed()->latest()->get(); // show tất cả dữ liệu nếu $filter_type == 1
                //$data = Articles::withTrashed()->latest()->paginate(10); // show tất cả dữ liệu nếu $filter_type == 1
            } elseif ($filter_type == 2) {
                $data = Articles::latest()->get(); // ko show dữ liệu những thằng bị softDelete nếu $filter_type == 2
                //$data = Articles::latest()->paginate(10); // ko show dữ liệu những thằng bị softDelete nếu $filter_type == 2
            } else {
                $data = Articles::onlyTrashed()->latest()->get(); // chỉ show dữ liệu những thằng bị softDelete nếu $filter_type == 3
                //$data = Articles::onlyTrashed()->latest()->paginate(10); // chỉ show dữ liệu những thằng bị softDelete nếu $filter_type == 3
            }

        } else { // nếu tài khoàn ko phải admin thì ko show combobox filter

            // Cách 1 : lấy dữ liệu mới nhất và phân trang - mỗi trang 10 bản ghi
            $data = Articles::latest()->get();
            //$data = Articles::latest()->paginate(10);
        }

        //Cách 2: Lấy dữ liệu phân trang - mỗi trang 10 bản ghi
        //$data = Articles::paginate(10);

        //kiểm tra dữ liệu
        //dd($data);

        //Cách 3: lấy toàn bộ dữ liệu
        //$data = article::all(); // tương đương với câu lệnh SELECT * FORM articles

        // truyền dữ liệu sang view với 2 tham số 1 tên view và 2 là mảng dữ liệu truyền sang
        return view('backend.article.index', ['data' => $data, 'filter_type' => $filter_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //lấy tất cả dữ liệu từ bản article
        $data = Category::where('type', 2)->get(); // => Select * form article where type = 2

        // truyền dữ liệu thấy dc qua view create
        return view('backend.article.create', ['data'=> $data]);
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
            'title' => 'required|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'category_id' => 'required',
            'summary' => 'required|min:173|max:1000',
            'description' => 'required|max:50000',
        ],[
            'name.required' => 'Bạn cần phải nhập vào tiêu đề bài viết',
            'image.required' => 'Bạn chưa chọn file ảnh',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
            'category_id.category_id' => 'Bạn chưa chọn danh mục bài viết',
            'summary.summary' => 'Bạn chưa nhập nội dung',
            'description.description' => 'Bạn chưa nhập nội dung bài viết',
        ]);

        $Articles = new Articles();
        $Articles->title = $request->input('title');

        //  Trong laravel sử dụng <use Illuminate\Support\Str;> để chuyển đổi tiêu đề thành dạng slug
        //  :: trong laravel tượng trưng cho hàm static
        $Articles->slug = Str::slug($request->input('title'));

        if($request->hasFile('image')){// kiểm tra xem có ảnh dc chọn ko

            // get file - tạo ra 1 biến file đại diện cho file ảnh dc up lên
            $file = $request->file('image');

            // đặt tên cho file ảnh (thời gian tạo + tên ảnh)
            $filename = time().'_'.$file->getClientOriginalName();

            // định nghĩa đường dẫn lưu trữ file ảnh
            $path_upload = 'frontend/img/blog/';

            // thực hiện chuyển file ảnh (thông qua hàm move()) vào thư mục đã cấu hình
            $file->move($path_upload,$filename);

            //lưu lại trên
            $Articles->image = $path_upload.$filename;
        }

        $Articles->url = $request->input('url');
        $Articles->category_id = $request->input('category_id');
        $Articles->position = $request->input('position');
        $Articles->is_active = $request->input('is_active');

        $Articles->summary = $request->input('summary');
        $Articles->description = $request->input('description');

        $Articles->created_at = date('Y-m-d H:i:s');

        $Articles->user_id = Auth::user()->id;

        $Articles->save();

        //sau khi thêm dữ liệu Category vào db thành công chuyển hướng về trang danh sách
        // hàm redirect() tương tự hàm header() dùng chuyễn hướng trang
        return redirect()->route('admin.article.index');
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
        $model = Articles::findOrFail($id);

        //lấy tất cả dữ liệu từ bản Articles mục đích sử dụng get data vào cb vị trí trong bài viết
        $cbdata = Articles::all();
        //lấy tất cả dữ liệu từ bản category
        $Categories = Category::where('type', 2)->get(); // => Select * form article where type = 2

        // sau khi tìm dữ liệu thành công, bắt đầu chuyên dữ liệu đó sang view edit
        return view('backend.article.edit', ['model' => $model,'cbdata'=>$cbdata , 'Categories' => $Categories]);
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
            'title' => 'required|max:1000',
            'category_id' => 'required',
            'summary' => 'required|min:173|max:1000',
            'description' => 'required|max:50000',
        ],[
            'name.required' => 'Bạn cần phải nhập vào tiêu đề bài viết',
            'category_id.category_id' => 'Bạn chưa chọn danh mục bài viết',
            'summary.summary' => 'Bạn chưa nhập nội dung',
            'description.description' => 'Bạn chưa nhập nội dung bài viết',
        ]);

        $Articles = Articles::findOrFail($id);
        $Articles->title = $request->input('title');

        //  Trong laravel sử dụng <use Illuminate\Support\Str;> để chuyển đổi tiêu đề thành dạng slug
        //  :: trong laravel tượng trưng cho hàm static
        $Articles->slug = Str::slug($request->input('title'));

        if($request->hasFile('image')){// kiểm tra xem có ảnh dc chọn ko
            // Sử Dụng Hàm unlink() để xoá file ảnh củ khi thực hiện upload ảnh mới
            @unlink(public_path($Articles->image));

            // get file - tạo ra 1 biến file đại diện cho file ảnh dc up lên
            $file = $request->file('image');

            // đặt tên cho file ảnh (thời gian tạo + tên ảnh)
            $filename = time().'_'.$file->getClientOriginalName();

            // định nghĩa đường dẫn lưu trữ file ảnh
            $path_upload = 'frontend/img/blog/';

            // thực hiện chuyển file ảnh (thông qua hàm move()) vào thư mục đã cấu hình
            $file->move($path_upload,$filename);

            //lưu lại trên
            $Articles->image = $path_upload.$filename;
        }

        $Articles->url = $request->input('url');
        $Articles->category_id = $request->input('category_id');
        $Articles->position = $request->input('position');
        $Articles->is_active = $request->input('is_active');

        $Articles->summary = $request->input('summary');
        $Articles->description = $request->input('description');

        $Articles->updated_at = date('Y-m-d H:i:s');

        $Articles->save();

        //sau khi thêm dữ liệu Category vào db thành công chuyển hướng về trang danh sách
        // hàm redirect() tương tự hàm header() dùng chuyễn hướng trang
        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Articles::destroy($id);

        return response()->json([
            'status' => true,
            'msg' => 'Xóa thành công'
        ]);
    }

    // Hàm Khôi phục dữ liệu bị softDelete
    public function restore($id)
    {
        $Article = Articles::onlyTrashed()->findOrFail($id);
        $Article->restore(); // truyền id đã bị xoá vào hàm khôi phục

        return response()->json([
            'status' => true,
            'msg' => 'Khôi phục thành công'
        ]);
    }
}
