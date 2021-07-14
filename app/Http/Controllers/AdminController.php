<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Symfony\Contracts\Service\Attribute\Required;

class AdminController extends Controller
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
    public function index(){
        return view('Admin-DangNhap');
    }
    public function GiaoDienAdmin(){
        $this->AuthLogin();
        $data_user = DB::table('tbl_khachhang')->get()->count(); 
        $data_product = DB::table('tbl_sanpham')->get()->count(); 
        $data_order = DB::table('tbl_donhang')->get()->count(); 
        return view('Admin.Quan-Li-Admin',)->with('data_user',$data_user)->with('data_product',$data_product)->with('data_order',$data_order);
        // dd($data_user);

    }
    public function DangNhapAdmin(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $data_user = DB::table('tbl_khachhang')->get()->count(); 
        $data_product = DB::table('tbl_sanpham')->get()->count();
        $data_order = DB::table('tbl_donhang')->get()->count(); 
        $result = DB::table('admin')->where('admin_email',$admin_email)->where ('admin_password',$admin_password)->first();
        if($result){
          Session::put('admin_name',$result->admin_name);
          Session::put('admin_id',$result->admin_id);
          Session::put('avatar',$result->admin_image);
          Session::put('phanquyen',$result->admin_decentralization);
          return view('Admin.Quan-Li-Admin')->with('data_user',$data_user)->with('data_product',$data_product)->with('data_order',$data_order);
         }else{
          Session::put('message','Bạn Đã Nhập Sai E-mail Hoạc Mật Khẩu !');
          return Redirect::to('/admin');
        }
        return view('admin.dashboard');
      
  }
    public function logout(){
    Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');

    }
    public function Them_NhanVien(){
        return view('Admin.Them-NhanVien');
    }
    public function Luu_NhanVien(Request $request){
        $data = array();
        $data['admin_name']= $request->manage_name;
        $data['admin_password']=md5( $request->manage_pass);
        $data['admin_email']= $request->manage_email;
        // $data['admin_address']= $request->manage_address;
        $data['admin_phone']= $request->manage_phone;
        $data['admin_decentralization']= $request->manage_decentralization;
        // $data['admin_image']= $request->manage_image;



        $get_image = $request->file('manage_image');
    
    
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/manage',$new_image);
            $data['admin_image'] = $new_image;
            DB::table('admin')->insert($data);
            if($request->manage_decentralization== 0){
               
                Session::put('message','Thêm Quản Trị Viên Thành Công');
            }elseif($request->manage_decentralization== 1){
                Session::put('message','Thêm Nhân Viên Thành Công');
            }
           
            return Redirect::to('Them-NhanVien');
        }
        else{    
            Session::put('message_danger','Gặp Lỗi Không Thể Thêm Nhân Sự');
            return Redirect::to('/LietKe-NhanSu'); 
            
        }

    }
    public function LietKe_NhanSu(){
        $nhanvien = DB::table('admin')->get();
        return view('admin.Quanli-NhanVien')->with('nhanvien',$nhanvien);
    }
    public function Xoa_NhanSu($admin_id){
        $admin = DB::table('admin')->where('admin_id',$admin_id)->get();
        foreach($admin as $key =>$val){
             $admin_name = $val->admin_name ;
        }
        $admin_mes ='Đã Xóa Nhân Viên Tên "'.$admin_name.'" Có ID: '.$admin_id;
        Session::put('massage_danger',$admin_mes);
        DB::table('admin')->where('admin_id',$admin_id)->delete();
        return Redirect::to('/LietKe-NhanSu'); 
    }
    public function LietKe_NguoiDung(){
        $khachhang = DB::table('tbl_khachhang')->get();
        return view('admin.LietKe-NguoiDung')->with('khachhang',$khachhang);
    } 
    public function Xoa_Nguoidung($customer_id){
        $customer = DB::table('tbl_khachhang')->where('customer_id',$customer_id)->get();
        foreach($customer as $key =>$val){
             $customer_name = $val->customer_name;
        }
        $admin_mes ='Đã Xóa Khách Hàng Tên "'.$customer_name.'" Có ID: '.$customer_id;
        Session::put('massage_danger',$admin_mes);
        DB::table('tbl_khachhang')->where('customer_id',$customer_id)->delete();
        return Redirect::to('/LietKe-NguoiDung'); 
    }
    public function Chan_NguoiDung($customer_id){
        $customer = DB::table('tbl_khachhang')->where('customer_id',$customer_id)->first();
        Session::put('ban_customer',$customer->customer_id);
        $ban_mes ='Đã Chặn Khách Hàng Tên "'.$customer->customer_name.'" Có ID: '.$customer_id;
        Session::put('message_danger',$ban_mes);
        view('pages.ThanhToan.Thanh-Toan')->with('block',$customer);
       return Redirect::to('/LietKe-NguoiDung'); 
    }
    public function MoChan_NguoiDung($customer_id){
        $customer = DB::table('tbl_khachhang')->where('customer_id',$customer_id)->first();
        Session::put('ban_customer',null);
        $ban_mes ='Đã Mở Chặn Khách Hàng Tên "'.$customer->customer_name.'" Có ID: '.$customer_id;
        Session::put('message',$ban_mes);
        view('pages.ThanhToan.Thanh-Toan');
       
       return Redirect::to('/LietKe-NguoiDung'); 
    }
    public function DonHang_Day(Request $request){
 
        $day   = str_pad($request->day, 2, '0', STR_PAD_LEFT);
        $month = str_pad($request->month, 2, '0', STR_PAD_LEFT);
        $year  = $request->year;
        if($day && $month && $year)
        {
            $all_order = DB::table('tbl_donhang')->where(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"),"$day-$month-$year")->get();
            return view('admin.DonHang-Day')->with('all_order',$all_order);
            
        }
         return view('admin.DonHang-Day');
    }
    
}
