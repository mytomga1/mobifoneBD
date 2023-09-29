<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    protected $categories;

    public  function  __construct()
    {
        $this -> categories = Category::where(['is_active' => 1])->where('deleted_at', null)->where('type', 1)->get();

        $articles = Articles::where(['is_active' => 1])
            ->where('deleted_at', null)
            ->orderBy('id')
            ->limit(6)
            ->get();

        View::share('categories', $this->categories);
        View::share('articles', $articles);

    }
    public function index(){
        // khu vuc show sp cua Top Featured Products
        $allProduct = Product::where('is_active', 1)->where('deleted_at', null)->limit(5)->orderBy('id', 'desc')->get();

        $list = []; // chứa danh sách sản phẩm  theo danh mục

        foreach($this->categories as $key => $parent) {
            if ($parent->parent_id == 0) { // check danh mục cha
                $ids = []; // tạo chứa các id của danh cha + danh mục con trực thuộc / danh mục con

                $ids[] = $parent->id; // id danh mục cha

                $sub_menu = [];
                foreach ($this->categories as $child) {
                    if ($child->parent_id == $parent->id) {
                        $sub_menu[] = $child;
                        $ids[] = $child->id; // thêm phần tử vào mảng
                    }
                } // ids = [1,7,8,9,..]

                $list[$key]['category'] = $parent; // điện thoại, tablet
                $list[$key]['sub_category'] = $sub_menu; // điện thoại, tablet

                // SELECT * FROM `products` WHERE is_active = 1 AND is_hot = 0 AND category_id IN (1,7,9,11) ORDER BY id DESC LIMIT 10
                $list[$key]['products'] = Product::where(['is_active' => 1]) //, 'is_hot' => 0
                ->whereIn('category_id', $ids)
                    ->orderBy('id', 'desc')
                    ->get();
            }
        }

        return view('frontend.index', ['list' =>$list])->with('allProduct', $allProduct);
    }


    // Tạo 1 hàm category router với mục đích lấy danh sách sản phẩm theo menu danh muc
    public function category(Request $request, $slug){

        $filter_brands = $request->query('thuong-hieu');
        $branch_ids = [];

        if ($filter_brands) {
            $arr_filter_brands = explode(',', $filter_brands); // ['apple', 'xiaomi', 'dell']
            $arr_brands = Brand::whereIn('slug' , $arr_filter_brands)->get();

            foreach ($arr_brands as $item) {
                $branch_ids[] = $item->id; // thêm phần tử vào mảng
            }
        }

        // THuong hieu
        $branchs = Brand::all();

        $category = Category::where('slug', $slug)->where('is_active', 1)->where('deleted_at', null)->first();

        if ($category == null) {
            return view('frontend.404');
        }

        $ids[] = $category->id; // khai báo mảng chứa các mã danh mục cần tìm kiếm chưa các sản phẩm

        foreach ($this->categories as $child) {
            if ($child->parent_id == $category->id) {
                $ids[] = $child->id; // thêm id của danh mục con vào mảng ids

                foreach ($this->categories as $sub_child) {
                    if ($sub_child->parent_id == $child->id) {
                        $ids[] = $child->id;
                    }
                }
            }
        }

        $query = DB::table('products')->select('*')
            ->where('is_active', 1)
            ->where('deleted_at', null)
            ->whereIn('category_id', $ids);


        // Lọc theo thương hiệu
        if (!empty($branch_ids)) {
            $query->whereIn('brand_id', $branch_ids);
        }

        // cần viết đệ quy lấy toàn bộ danh mục cha con

        // step 2 : lấy list sản phẩm theo thể loại
//        $products = Product::where('is_active', 1)
//            ->whereIn('category_id' , $ids)
//            ->latest() // lấy dữ liệu mới nhất
//            ->paginate(10); // phân trang (1 trang chứa 15 phần tử)

        $list_products = $query->paginate(16);




        return view('frontend.productList', ['category' => $category, 'products' => $list_products, 'branchs' => $branchs,'arr_filter_brands' => json_encode($branch_ids)]);
    }

    public function product(Request $request, $slug)
    {
        $product = Product::where('is_active', 1)->where('slug', $slug)->first();

        if ($product == null) {
            return view('frontend.404');
        }

        return view('frontend.product-detail', ['product' => $product]);
    }

    public function articles(){

        $articles = Articles::latest()->paginate(6);

        return view('frontend.articleList',['articles'=>$articles]);
    }

    // Controller Trang Chi tiết bài viết
    public  function ArticleDetail($slug){

        // select * form Articles where slug = slug and is_active = 1
        $article = Articles::where('slug', $slug)->where('is_active', 1)->first();

        if($article == null){
            return view('frontend.404');
        }

        return view('frontend.article-detail',['article'=>$article]);
    }



    public function errorPage404()
    {
        return view('frontend.404');
    }
}
