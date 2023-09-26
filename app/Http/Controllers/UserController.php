<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $params = $request->all();
        $filter_type = $params['filter_type'] ?? 2;

        // if check admin
        if (Auth::user()->role_id == 1) { // nếu user là admin thì show combobox filter dữ liệu
            if ($filter_type == 1) {
                //$data = User::withTrashed()->latest()->paginate(10); // show tất cả dữ liệu nếu $filter_type == 1
                $data = User::withTrashed()->latest()->get(); // show tất cả dữ liệu nếu $filter_type == 1
            } elseif ($filter_type == 2) {
                //$data = User::latest()->paginate(10); // ko show dữ liệu những thằng bị softDelete nếu $filter_type == 2
                $data = User::latest()->get(); // ko show dữ liệu những thằng bị softDelete nếu $filter_type == 2
            } else {
                //$data = User::onlyTrashed()->latest()->paginate(10); // chỉ show dữ liệu những thằng bị softDelete nếu $filter_type == 3
                $data = User::onlyTrashed()->latest()->get(); // chỉ show dữ liệu những thằng bị softDelete nếu $filter_type == 3
            }

        } else { // nếu tài khoàn ko phải admin thì ko show combobox filter

            // Cách 1 : lấy dữ liệu mới nhất và phân trang - mỗi trang 10 bản ghi
            //$data = User::latest()->paginate(10);
            $data = User::latest()->get();
        }

        //Cách 2: Lấy dữ liệu phân trang - mỗi trang 10 bản ghi
        //$data = User::paginate(10);

        //kiểm tra dữ liệu
        //dd($data);

        //Cách 3: lấy toàn bộ dữ liệu
        //$data = User::all(); // tương đương với câu lệnh SELECT * FORM Users

        // truyền dữ liệu sang view với 2 tham số 1 tên view và 2 là mảng dữ liệu truyền sang
        return view('backend.user.index', ['data' => $data, 'filter_type' => $filter_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all(); // lấy tất cả data của bản role

        return view('backend.user.create',['role' => $role]); // truyền data của bản role đã lấy dc sang trang create user
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
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'role_id' => 'required|max:255',
        ],[
            'name.required' => 'Bạn cần phải nhập tên hiển thị',
            'email' => 'Bạn cần phải nhập email',
            'password' => 'Bạn cần phải tạo mật khẩu',
            'role_id' => 'Bạn cần phải chọn vai trò',
        ]);


        $User = new User();
        $User->name = $request->input('name');

        if($request->hasFile('avatar')) { // Kiem tra xem co image duoc chon khong
            //get File
            $file = $request->file('avatar');
            // Dat ten cho file image
            $filename = time().'_'.$file->getClientOriginalName();  //$file->getClientOriginalName() == ten anh
            //Dinh nghia duong dan se upload file len
            $path_upload = 'frontend/img/useravatar/';
            // Thuc hien upload file
            $file->move($path_upload,$filename);
            // Luu lai ten
            $User->avatar = $path_upload.$filename;
        }

        $User->email = $request->input('email');
        $User->password = bcrypt($request->input('password')); // sử dụng hàm bcrypt() giúp người dùng mã hoá pass sang dạng md5 / sha

        //Check Role id
        $is_role = 0;
        if($request->has('role_id')) { //Kiem tra xem is_active co ton tai khong
            $is_role = $request->input('role_id');
        }
        $User->role_id = $is_role;

        //Trang thai
        $is_active = 0;
        if($request->has('is_active')) { //Kiem tra xem is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        $User->is_active = $is_active;

        $User->save();

        //Chuyen huong ve trang danh sach
        return redirect()->route('admin.user.index');
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
        $model = User::findOrFail($id);

        return view('backend.user.edit', ['model' => $model]);
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
            'email' => 'required|max:255',
            'role_id' => 'required|max:255',
        ],[
            'name.required' => 'Bạn cần phải nhập tên hiển thị',
            'email' => 'Bạn cần phải nhập email',
            'role_id' => 'Bạn cần phải chọn vai trò',
        ]);

        $User = User::findOrFail($id);
        $User->name = $request->input('name');

        if($request->hasFile('avatar')) { // Kiem tra xem co image duoc chon khong
            //get File
            $file = $request->file('avatar');
            // Dat ten cho file image
            $filename = time().'_'.$file->getClientOriginalName();  //$file->getClientOriginalName() == ten anh
            //Dinh nghia duong dan se upload file len
            $path_upload = 'frontend/img/useravatar/';
            // Thuc hien upload file
            $file->move($path_upload,$filename);
            // Luu lai ten
            $User->avatar = $path_upload.$filename;
        }

//        $User->email = $request->input('email');

        $new_password = $request->input('password');
        if (!empty($new_password)) { // nếu như user thêm pass mới thì tiến thành mã hoá pass
            $User->password = bcrypt($new_password);
        }

        //check role
        $is_role = 0;
        if($request->has('role_id')) { //Kiem tra xem role_id co ton tai khong
            $is_role = $request->input('role_id');
            if ($is_role == null) $is_role=0;
        }
        $User->role_id = $is_role;
        //$User->role_id = $request->input('role_id');

        //Trang thai
        $is_active = 0;
        if($request->has('is_active')) { //Kiem tra xem is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        $User->is_active = $is_active;
        $User->save();

        //Chuyen huong ve trang danh sach
        return redirect()->route('admin.user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$User = User::findOrFail($id);
        // xóa ảnh cũ
        //@unlink(public_path($User->avatar));

        User::destroy($id);

        return response()->json([
            'status' => true,
            'msg' => 'Xóa thành công'
        ]);
    }

    // Hàm Khôi phục dữ liệu bị softDelete
    public function restore($id)
    {
        $User = User::onlyTrashed()->findOrFail($id);
        $User->restore(); // truyền id đã bị xoá vào hàm khôi phục

        return response()->json([
            'status' => true,
            'msg' => 'Khôi phục thành công'
        ]);
    }
}
