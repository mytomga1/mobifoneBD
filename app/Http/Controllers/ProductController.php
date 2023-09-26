<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = Category::all();
        $params = $request->all();
        $filter_type = $params['filter_type'] ?? 2;

        // if check admin
        if (Auth::user()->role_id == 1) { // nếu user là admin thì show combobox filter dữ liệu
            if ($filter_type == 1) {
                //$data = Product::withTrashed()->latest()->paginate(10); // show tất cả dữ liệu nếu $filter_type == 1
                $data = Product::withTrashed()->latest()->get(); // show tất cả dữ liệu nếu $filter_type == 1
            } elseif ($filter_type == 2) {
                //$data = Product::latest()->paginate(100); // ko show dữ liệu những thằng bị softDelete nếu $filter_type == 2
                $data = Product::latest()->get(); // ko show dữ liệu những thằng bị softDelete nếu $filter_type == 2
            } else {
                //$data = Product::onlyTrashed()->latest()->paginate(100); // chỉ show dữ liệu những thằng bị softDelete nếu $filter_type == 3
                $data = Product::onlyTrashed()->latest()->get(); // chỉ show dữ liệu những thằng bị softDelete nếu $filter_type == 3
            }

        } else { // nếu tài khoàn ko phải admin thì ko show combobox filter

            // Cách 1 : lấy dữ liệu mới nhất và phân trang - mỗi trang 10 bản ghi
            //$data = Product::latest()->paginate(10);
            $data = Product::all();
        }

        //Cách 2: Lấy dữ liệu phân trang - mỗi trang 10 bản ghi
        //$data = Category::paginate(10);

        //kiểm tra dữ liệu
        //dd($data);

        //Cách 3: lấy toàn bộ dữ liệu
        //$data = Product::all(); // tương đương với câu lệnh SELECT * FORM Products

        // truyền dữ liệu sang view với 2 tham số 1 tên view và 2 là mảng dữ liệu truyền sang
        return view('backend.product.index', ['data' => $data, 'category' => $category, 'filter_type' => $filter_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('type', 1)->get();
        $product = Vendor::all();
        $brand = Brand::all();

        $Ven_Bra = [
            'vendor' => $product,
            'brand' => $brand
        ];
        return view('backend.product.create', ['category' => $category], ['Ven_Bra' => $Ven_Bra] );
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
            'stock' => 'required|max:255',
            'price' => 'required|max:255',
            'sale' => 'required|max:255',
            'category_id' => 'required|max:255',
            'brand_id' => 'required|max:255',
            'vendor_id' => 'required|max:255',
            'summary' => 'required',
            'description' => 'required',
        ],[
            'name.required' => 'Bạn cần phải nhập tên sản phẩm',
            'image.required' => 'Bạn chưa chọn file ảnh',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
            'stock' => 'Bạn cần phải nhập số lượng sản phẩm',
            'price' => 'Bạn cần phải nhập giá sản phẩm',
            'sale' => 'Bạn cần phải nhập giá khuyến mãi sản phẩm',
            'category_id' => 'Bạn cần phải chọn danh mục',
            'brand_id' => 'Bạn cần phải chọn nhãn hiệu',
            'vendor_id' => 'Bạn cần phải chọn nhà cung cấp',
            'summary' => 'Bạn cần phải nhập tóm tắt sp',
            'description' => 'Bạn cần phải nhập mô tả chi tiết sp',
        ]);

        $product = new Product();
        $product->name = $request->input('name');

        //  Trong laravel sử dụng <use Illuminate\Support\Str;> để chuyển đổi tiêu đề thành dạng slug
        //  :: trong laravel tượng trưng cho hàm static
        $product->slug = Str::slug($request->input('name'));

        if($request->hasFile('image')){// kiểm tra xem có ảnh dc chọn ko

            // get file - tạo ra 1 biến file đại diện cho file ảnh dc up lên
            $file = $request->file('image');

            // đặt tên cho file ảnh (thời gian tạo + tên ảnh)
            $filename = time().'_'.$file->getClientOriginalName();

            // định nghĩa đường dẫn lưu trữ file ảnh
            $path_upload = 'frontend/img/product/';

            // thực hiện chuyển file ảnh (thông qua hàm move()) vào thư mục đã cấu hình
            $file->move($path_upload,$filename);

            //lưu lại trên
            $product->image = $path_upload.$filename;
        }

        $product->stock = $request->input('stock');
        $product->price = Str::remove(',', $request->input('price')); // sử dụng hàm Str::remove để xoá dấu , trước khi save giá tiền vào db vd 33,33 => 3333
        $product->sale = Str::remove(',', $request->input('sale'));
        $product->url = $request->input('url');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->vendor_id = $request->input('vendor_id');


        if(($request->position)==null){
            $product->position = $request->input('0');
        }else{
            $product->position = $request->input('position');
        }

        $product->is_active = $request->input('is_active');
        $product->is_hot = $request->input('is_active');
        $product->summary = $request->input('summary');
        $product->description = $request->input('description');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');

        $product->created_at = date('Y-m-d H:i:s');

        $product->user_id = $request->user()->id;

        //$Articles->user_id = Auth::user()->id;

        $product->save();

        // sau khi thêm dữ liệu sản phẩm mới vào database thì đánh thêm index để tiện thể cho việc search nhanh hơn
        Product::addAllToIndex();

        //sau khi thêm dữ liệu vendors vào db thành công chuyển hướng về trang danh sách
        // hàm redirect() tương tự hàm header() dùng chuyễn hướng trang
        return redirect()->route('admin.product.index');
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
        $product = Product::findOrFail($id);
        $category = Category::where('type', 1)->get()->toArray();
        $vendor = Vendor::all();
        $brand = Brand::all();
        $Ven_Bra = [
            'category' => $category,
            'vendor' => $vendor,
            'brand' => $brand
        ];
        return view('backend.product.edit', ['product' => $product, 'data'=>$category], ['Ven_Bra' => $Ven_Bra] );
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
            'stock' => 'required|max:255',
            'price' => 'required|max:255',
            'sale' => 'required|max:255',
            'category_id' => 'required|max:255',
            'brand_id' => 'required|max:255',
            'vendor_id' => 'required|max:255',
            'summary' => 'required',
            'description' => 'required',
        ],[
            'name.required' => 'Bạn cần phải nhập tên sản phẩm',
            'stock' => 'Bạn cần phải nhập số lượng sản phẩm',
            'price' => 'Bạn cần phải nhập giá sản phẩm',
            'sale' => 'Bạn cần phải nhập giá khuyến mãi sản phẩm',
            'category_id' => 'Bạn cần phải chọn danh mục',
            'brand_id' => 'Bạn cần phải chọn nhãn hiệu',
            'vendor_id' => 'Bạn cần phải chọn nhà cung cấp',
            'summary' => 'Bạn cần phải nhập tóm tắt sp',
            'description' => 'Bạn cần phải nhập mô tả chi tiết sp',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->input('name');
        //  Trong laravel sử dụng <use Illuminate\Support\Str;> để chuyển đổi tiêu đề thành dạng slug
        //  :: trong laravel tượng trưng cho hàm static
        $product->slug = Str::slug($request->input('name')); //slug

        if($request->hasFile('image')){// kiểm tra xem có ảnh dc chọn ko

            // get file - tạo ra 1 biến file đại diện cho file ảnh dc up lên
            $file = $request->file('image');

            // đặt tên cho file ảnh (thời gian tạo + tên ảnh)
            $filename = time().'_'.$file->getClientOriginalName();

            // định nghĩa đường dẫn lưu trữ file ảnh
            $path_upload = 'frontend/img/product/';

            // thực hiện chuyển file ảnh (thông qua hàm move()) vào thư mục đã cấu hình
            $file->move($path_upload,$filename);

            //lưu lại trên
            $product->image = $path_upload.$filename;
        }
        $product->stock = $request->input('stock');
        $product->price = Str::remove(',', $request->input('price')); // sử dụng hàm Str::remove để xoá dấu , trước khi save giá tiền vào db vd 33,33 => 3333
        $product->sale = Str::remove(',', $request->input('sale'));
        $product->url = $request->input('url');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->vendor_id = $request->input('vendor_id');

        //Trang thai
        $is_active = 0;
        if($request->has('is_active')) { //Kiem tra xem is_active co ton tai khong
            $is_active = $request->input('is_active');
            if ($is_active == null) $is_active=0;
        }
        $product->is_active = $is_active;

        //is_HOT
        $is_hot = 0;
        if($request->has('is_hot')) { //Kiem tra xem is_active co ton tai khong
            $is_hot = $request->input('is_hot');
            if ($is_hot == null) $is_hot=0;
        }
        $product->is_hot = $is_hot;

        //Vi tri
        $position=0;
        if($request->has('position')){
            $position = $request->input('position');
            if ($position == null) $position=0;
        }
        $product->position = $position;

        $product->summary = $request->input('summary');
        $product->description = $request->input('description');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->updated_at = date('Y-m-d H:i:s');
        $product->user_id = $request->user()->id;
        //Luu
        $product->save();

        Product::addAllToIndex();

        //sau khi thêm dữ liệu product vào db thành công chuyển hướng về trang danh sách
        // hàm redirect() tương tự hàm header() dùng chuyễn hướng trang
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $data = Product::where('deleted_at', !null)->get;
//        // xóa ảnh cũ
//        if ($data){
//            @unlink(public_path($data->image));
//        }


        Product::destroy($id);

        return response()->json(['status' => true, 'msg' => 'Xóa thành công']);
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore(); // truyền id đã bị xoá vào hàm khôi phục

        return response()->json([
            'status' => true,
            'msg' => 'Khôi phục thành công'
        ]);
    }
}
