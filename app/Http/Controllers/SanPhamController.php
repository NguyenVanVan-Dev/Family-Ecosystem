<?php

namespace App\Http\Controllers;

use App\Models\DanhmucModel;
use App\Models\SanPhamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;



class SanPhamController extends Controller
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
     public function Them_San_Pham(){
         $this->AuthLogin();
        $danhmuc_sanpham = DB::table('danh_muc_table')->orderby('category_id','asc')->get();
    
        return view('Admin.Them-San-Pham')->with('category', $danhmuc_sanpham);
    }
    public function Luu_San_Pham(Request $request){
        $this->AuthLogin();
       
       $data = array();
       $data['product_name'] = $request->product_name;
       $data['product_slug'] = $request->product_slug;
       $data['product_price'] = $request->product_price;
       $data['product_display'] = $request->product_display;
       $data['product_content'] = $request->product_content;
       $data['category_id'] = $request->product_cate;
       $data['product_num'] = $request->product_num;
       $data['product_status'] = $request->product_status;
       $data['product_image'] = $request->product_status;
     /*  $data =$request->all();
       $sanpham = new SanPhamModel();
       $sanpham->product_name = $data['product_name'];
       $sanpham->product_slug = $data['product_slug'];
       $sanpham->product_price = $data['product_price'];
       $sanpham->product_num = $data['product_num'];
       $sanpham->product_desc = $data['product_desc'];
       $sanpham->category_id = $data['product_cate'];
       $sanpham->product_content = $data['product_content'];
       $sanpham->product_status = $data['product_status'];
       $sanpham->product_image = $data['product_status'];*/


       $get_image = $request->file('product_image');
    
    
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_sanpham')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('Them-San-Pham');
        }
        else{    
            Session::put('message','khong thanh cong');
            return Redirect::to('Liet-Ke-San-Pham'); 
            
        }
        
       
   }  
   public function Liet_Ke_San_Pham(){
    $this->AuthLogin();
    $all_product = DB::table('tbl_sanpham')->join('danh_muc_table','danh_muc_table.category_id','=','tbl_sanpham.category_id')->orderby('tbl_sanpham.product_id','desc')->get();
    $manager_product = view('Admin.Liet-Ke-San-Pham')->with('all_product',$all_product);
    return view('Admin-Layout')->with('Admin.Liet-Ke-San-Pham', $manager_product);
   }   
   public function An_San_Pham($product_id){
    $this->AuthLogin();
    SanPhamModel::where('product_id',$product_id)->update(['product_status'=>0]);
    Session::put('message_danger','Đã Ẩn Sản Phẩm ');
    return Redirect::to('Liet-Ke-San-Pham');
        }
    public function Hien_San_Pham($product_id){
        $this->AuthLogin();
        SanPhamModel::where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Đã Hiển Thị sản phẩm ');
        return Redirect::to('Liet-Ke-San-Pham');
    }
    public function Sua_San_Pham($product_id){
        $this->AuthLogin();
       $category = DanhmucModel::orderby('category_id','desc')->get(); 
       $edit_produtc =SanPhamModel::where('product_id',$product_id)->get();
       $manager_product  = view('admin.Sua-San-Pham')->with('edit_product',$edit_produtc)->with('category',$category);

       return view('Admin-Layout')->with('admin.Sua-San-Pham', $manager_product);
    }
    public function Cap_Nhat_San_Pham(Request $request,$product_id){
        $this->AuthLogin();
    $data = array();

    $data['product_name'] = $request->product_name;
    $data['product_slug'] = $request->product_slug;
    $data['product_price'] = $request->product_price;
    $data['product_display'] = $request->product_display;
    $data['product_content'] = $request->product_content;
    $data['category_id'] = $request->product_cate;
    $data['product_num'] = $request->product_num;
    $data['product_status'] = $request->product_status;
    $data['product_image'] = $request->product_status;
    $get_image = $request->file('product_image');
        $file_cu = $request->tenphoto; 

    if($get_image){
                $get_name_image = $get_image->getClientOriginalName();
                if($get_name_image!=$file_cu)
                    {
                            File::delete('public/uploads/product/'.$file_cu);
                    }
                $name_image = current(explode('.',$get_name_image));
                $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('public/uploads/product',$new_image);
                $data['product_image'] = $new_image;
                DB::table('tbl_sanpham')->where('product_id',$product_id)->update($data);
                Session::put('message','Cập nhật sản phẩm thành công');
                return Redirect::to('Liet-Ke-San-Pham');
    }
        
    DB::table('tbl_sanpham')->where('product_id',$product_id)->update($data);
    Session::put('message','Cập nhật sản phẩm thành công');
    return Redirect::to('Liet-Ke-San-Pham');
    }
    public function Xoa_San_Pham($product_id){
        $this->AuthLogin();
        DB::table('tbl_sanpham')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa Sản Phẩm Thành Công');
        return Redirect::to('Liet-Ke-San-Pham');
    }
    public function Tim_Kiem(Request $request){
        $find = $request->search;
        $reuslt = SanPhamModel::where('product_name','like','%'.$find.'%')->orWhere('product_price','like',$find)->get();
        if($reuslt){
            
            return view('pages.search')->with('timkiem',$reuslt);
        }else{
            Session::put('timsanpham','Không Tìm Thấy Sản Phẩm ');
            Session::put('message1',$find);
            return view('pages.search')->with('timkiem',$reuslt);
        };

    }
    public function All_SanPham(){
        $all_product = SanPhamModel::where('product_status','1')->get();
        return view('pages.SanPham.All-SanPham')->with('all_product',$all_product);
    }
    public function Chi_Tiet_San_Pham(Request $request,$product_id){
      
      

        $details_product = DB::table('tbl_sanpham')->join('danh_muc_table','danh_muc_table.category_id','=','tbl_sanpham.category_id')->where('tbl_sanpham.product_id',$product_id)->get();

     foreach($details_product as $key => $value){
         $category_id = $value->category_id;
         $product_id =$value->product_id;
                       
            
            
         }
        
     $related_product = DB::table('tbl_sanpham')->join('danh_muc_table','danh_muc_table.category_id','=','tbl_sanpham.category_id')->whereNotIn('tbl_sanpham.product_id',[$product_id])->get();
  

     return view('pages.SanPham.Chi-Tiet-San-Pham')->with('product_details',$details_product)->with('relate',$related_product);

    }
   
}
