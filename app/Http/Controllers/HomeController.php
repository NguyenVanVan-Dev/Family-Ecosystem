<?php

namespace App\Http\Controllers;

use App\Models\DanhmucModel;
use App\Models\SanPhamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index(){
        $category = DB::table('danh_muc_table')->get();
       
        $product_noibat = SanPhamModel::where('product_display','1')->Where('product_status','1')->get();
        $sanpham = SanPhamModel::where('product_status','1')->where('product_display','0')->orderby('product_id','asc')->limit(15)->get();
        return view('pages.home')->with('product',$sanpham)->with('categories',$category)->with('product_noibat',$product_noibat);
    }
}
