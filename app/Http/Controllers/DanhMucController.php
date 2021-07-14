<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\DanhmucModel;
use App\Models\SanPhamModel;

class DanhMucController extends Controller
{
    //
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/Quan-Li-Admin');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function Them_Danh_Muc(){
        return view('Admin.Them-Danh-Muc');
    }
   
    public function Luu_Danh_Muc(Request $request){
        $this->AuthLogin();
    /*	$data = array();
    	$data['category_name'] = $request->danhmuc_ten;
        $data['category_key'] = $request->danhmuc_key;
        $data['category_slug'] = $request->danhmuc_slug;
        $data['category_parent'] = $request->danhmuc_parent;
        $data['category_desc'] = $request->danhmuc_desc;
    	$data['category_status'] = $request->danhmuc_status;

        DB::table('danh_muc_table')->insert($data);*/
        $data =$request->all();
        $danhmuc = new DanhmucModel;
        $danhmuc->category_name=$data['danhmuc_ten'];
        $danhmuc->category_key=$data['danhmuc_key'];
        $danhmuc->category_slug=$data['danhmuc_slug'];
        $danhmuc->category_parent=$data['danhmuc_parent'];
        $danhmuc->category_desc=$data['danhmuc_desc'];
        $danhmuc->category_status=$data['danhmuc_status'];
        $danhmuc->save();
    	Session::put('message','Thêm danh mục sản phẩm thành công');
    	return Redirect::to('Them-Danh-Muc');
    }
    public function Liet_Ke_Danh_Muc(){
        $this->AuthLogin();
        $liet_ke_danhmuc= DB::table('danh_muc_table')->get();
        $bientam_danhmuc  = view('admin.Liet-Ke-Danh-Muc')->with('danhmuc',$liet_ke_danhmuc);
        //$bientam_danhmuc1 = view('admin.Them-Danh-Muc')->with('danhmuc1',$liet_ke_danhmuc);
        return view('Admin-Layout')->with('admin.Liet-Ke-Danh-Muc', $bientam_danhmuc);
     
    }
    public function An_Danh_Muc($category_id){
        $this->AuthLogin();
        DanhmucModel::where('category_id',$category_id)->update(['category_status'=>0]);
        Session::put('message_danger','Ẩn danh mục sản phẩm, update thành công');
        return Redirect::to('Liet-Ke-Danh-Muc');

    }
    public function Hien_Danh_Muc($category_id){
        $this->AuthLogin();
        DanhmucModel::where('category_id',$category_id)->update(['category_status'=>1]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('Liet-Ke-Danh-Muc');
    }
    public function Sua_Danh_Muc($category_id){
        $this->AuthLogin();

        $sua_danhmuc = DanhmucModel::where('category_id',$category_id)->get();
        $sua_danhmuc_ex  = view('admin.Sua-Danh-Muc')->with('category_edit',$sua_danhmuc);

        return view('Admin-Layout')->with('admin.Sua-Danh-Muc', $sua_danhmuc_ex);
    }
    public function Cap_Nhat_Danh_Muc(Request $request,$category_id){
        $this->AuthLogin();
        $data = $request->all();
        $danhmuc = DanhmucModel::find($category_id);
        $danhmuc->category_name=$data['danhmuc_ten'];
        $danhmuc->category_key=$data['danhmuc_key'];
        $danhmuc->category_slug=$data['danhmuc_slug'];
        $danhmuc->category_parent=$data['danhmuc_parent'];
        $danhmuc->category_desc=$data['danhmuc_desc'];
        $danhmuc->category_status=$data['danhmuc_status'];
        $danhmuc->save();
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('Liet-Ke-Danh-Muc');
    }
    public function Xoa_Danh_Muc($category_id){
        $this->AuthLogin();
        DB::table('danh_muc_table')->where('category_id',$category_id)->delete();
        Session::put('message_danger','Xóa danh mục sản phẩm thành công');
        return Redirect::to('Liet-Ke-Danh-Muc');
    }
    // Sữa Hàm này lại thành Hàm nhận dữ liệu từ form về  sau dó if else or switch các trường hợp
    public function SP_Danh_Muc(Request $request ,$category_id){
       $data = DB::table('danh_muc_table')->where('category_id',$category_id)->get();
        $data1 =DB::table('tbl_sanpham')->where('category_id',$category_id)->get();

        return view('pages.DanhMuc.SanPham-DanhMuc')->with('category_name',$data)->with('category_by_id',$data1);
    }
    public function About(){
        return view('pages.About.About');
    }  
    public function Faqs(){
        return view('pages.About.Faqs');
    }   
    public function Contact(){
        return view('pages.About.Contact');
    }   
    }