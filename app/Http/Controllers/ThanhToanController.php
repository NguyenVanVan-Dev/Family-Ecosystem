<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Prophecy\Doubler\Doubler;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;
use Symfony\Contracts\Service\Attribute\Required;

class ThanhToanController extends Controller
{
    //
    public function Login_Checkout(){
        return view('pages.ThanhToan.DangNhap-ThanhToan');
    }
   
    //
    public function Them_KhachHang(Request $request){
        $pass = $request->customer_pass;
        $repeatpass =$request->customer_repeat;
        if($pass ==$repeatpass){
            $data = array();
            $data['customer_name'] = $request->customer_name;
            $data['customer_email'] = $request->customer_email;
            $data['customer_password'] = md5($request->customer_pass);
            $customer_id = DB::table('tbl_khachhang')->insertGetId($data);

            Session::put('customer_id',$customer_id);
            Session::put('customer_name',$request->customer_name);
            Session::put('customer_email',$request->customer_email);
            return Redirect::to('/');
       }else{
           Session::put('mes','Mật Khẩu Không Trùng Khớp');
           return Redirect::to('/Thu-Tuc-Thanh-Toan');
        }
    }
    public function Checkout(){
        return \view('pages.ThanhToan.Show-Checkout');
    }
    public function DangNhap_KhachHang(Request $request){
        $email = $request->email_account;
        $password =md5( $request->pass_account);
     
        $result = DB::table('tbl_khachhang')->where('customer_email',$email)->Where('customer_password',$password)->first();
        $result1 = DB::table('tbl_khachhang')->where('customer_email',$email)->Where('customer_password',$password)->get();
       
        if($result ){
            Session::put('customer_id',$result->customer_id);
            Session::put('customer_name',$result->customer_name);
            Session::put('customer_email',$result->customer_email);
             
            return Redirect::to('/home');
        }else{
            Session::put('mes','Tài Khoản Không Tồn Tại');
            return Redirect::to('/Login-Checkout');
        }
    
    }
    public function DangXuat(){

        Session::flush();
        return Redirect::to('/');
    } 
    public function NhanDonHang(Request $request){
        $data = array();
        $data['shipping_name'] = $request->name;
        $data['shipping_phone'] = $request->number;  
        $data['shipping_address'] = $request->address;
        $data['shipping_method'] = $request->method;
        $shipping_id = DB::table('tbl_goihang')->insertGetId($data);

        Session::put('shipping_name',$request->shipping_name);
        Session::put('shipping_id',$shipping_id);
       
        return Redirect::to('/Thanh-Toan');

    }
    
    public function ThanhToan(){
        return view('pages.ThanhToan.Thanh-Toan');
    }
    public function Dat_Hang(Request $request){
        //insert payment_method
       
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 1;
        $payment_id = DB::table('tbl_thanhtoan')->insertGetId($data);

        //insert order
         $order_data = array();
         $customer_id= Session::get('customer_id');
         $shipping_id = Session::get('shipping_id');
        if($shipping_id && $customer_id){
            $shipping_id =  Session::get('shipping_id');
            $customer_id= Session::get('customer_id');
        }else{
            $shipping_id = "1000000";
            $customer_id= "2000000";
        }
        $order_data['customer_id'] = $customer_id;
        $order_data['shipping_id'] = $shipping_id;
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 1;
        $order_id = DB::table('tbl_donhang')->insertGetId($order_data);
        $body_massage = 'mã đơn hàng  '.$order_id.'tổng tiền: '.$order_data['order_total'];
        //insert order_details
        $content = Cart::content();
        foreach($content as $v_content){
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_chitiet_donhang')->insert($order_d_data);
        }
        // trừ số lượng trong bảng tbl_product
        $datapro = array();

         $content = Cart::content();

        foreach($content as $v_content){
              $product_info = DB::table('tbl_sanpham')->where('product_id',$v_content->id)->first(); 
               $datapro['product_num'] = $product_info->product_num - $v_content->qty;
               DB::table('tbl_sanpham')->where('product_id',$v_content->id)->update($datapro);     
        }

        



        if($data['payment_method']==1){

          Session::put('mes','ĐÃ Nhận Được Đơn Hàng Của Bạn');
        
          return Redirect::to('/');
        }elseif($data['payment_method']==2){

                
            Cart::destroy();
         //return view('pages.Checkout.handcash');
          return Redirect::to('/send-mail');
            
           
            


        }else{
            echo 'Thẻ ghi nợ';

        }
            
    }
    public function QuanLi_DonHang(){
        $this->AuthLogin();
        $all_order = DB::table('tbl_donhang')
        ->join('tbl_khachhang','tbl_donhang.customer_id','=','tbl_khachhang.customer_id')
        ->select('tbl_donhang.*','tbl_khachhang.customer_name')
        ->orderby('tbl_donhang.order_id','desc')->get();
        $manager_order  = view('Admin.QuanLi-DonHang')->with('all_order',$all_order);
        return view('Admin-Layout')->with('Admin.QuanLi-DonHang', $manager_order);
    }
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/Quan-Li-Admin');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function Show_DonHang($order_id){
        $order_details = DB::table('tbl_chitiet_donhang')->where('order_id',$order_id)->get();
        $order = DB::table('tbl_donhang')->where('order_id',$order_id)->get();
        foreach($order as $key => $ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }
        $customer = DB::table('tbl_khachhang')->where('customer_id',$customer_id)->first();
        $shipping = DB::table('tbl_goihang')->where('shipping_id',$shipping_id)->first();
        return view('Admin.Show-DonHang')->with(compact('order_details','customer','shipping','order'));

    }
    public function CapNhat_DonHang(Request $request,$order_id){
         $order_status = $request->select_status; 
        DB::table('tbl_donhang')->where('order_id',$order_id)->update(['order_status'=>$order_status]);
        return Redirect::to('/QuanLi-DonHang');
      
    }
    public function Xoa_DonHang($order_id){
       
       
        $customer = DB::table('tbl_donhang')->where('order_id',$order_id)->get();
        foreach($customer as $key=>$val){
            $shipping =$val->shipping_id;
        }
        $shipping_name= DB::table('tbl_goihang')->where('shipping_id',$shipping)->get();
        foreach($shipping_name as $key=>$val1){
            $customer_name =$val1->shipping_name;
        
        }
        DB::table('tbl_goihang')->where('shipping_id',$shipping)->delete();
        DB::table('tbl_donhang')->where('order_id',$order_id)->delete();
        DB::table('tbl_chitiet_donhang')->where('order_id',$order_id)->delete();
        $mes = 'Đã Xóa Đơn Hàng '. $order_id.' Của Khách Hàng '.$customer_name;
        Session::put('message_danger',$mes);
        return Redirect::to('/QuanLi-DonHang');
       
        

    }
    public function HoSo_KhachHang(){
        $customer_id = Session::get('customer_id');
        $name = DB::table('tbl_khachhang')->where('customer_id',$customer_id)->first();
        $total =DB::table('tbl_khachhang')
        ->join('tbl_donhang','tbl_khachhang.customer_id','=','tbl_donhang.customer_id')->select('tbl_khachhang.*','tbl_donhang.order_total')
        ->where('tbl_khachhang.customer_id',$customer_id)->get();
        $manager_order1 = DB::table('tbl_donhang')
        ->join('tbl_chitiet_donhang','tbl_donhang.order_id','=','tbl_chitiet_donhang.order_id')      
        ->select('tbl_donhang.*','tbl_chitiet_donhang.product_name','tbl_chitiet_donhang.product_price','tbl_chitiet_donhang.product_sales_quantity')
        ->where('tbl_donhang.customer_id',$customer_id)->get();
        // dd($name);
        return view('pages.User.HoSo-KhachHang')->with('all_order', $manager_order1)->with('name',$name)->with('total',$total);
    }
    public function HuyDonHang($order_id){
        // $result = DB::table('tbl_goihang')
        // ->join('tbl_donhang','tbl_goihang.shipping_id','=','tbl_donhang.shipping_id')
        // ->select('tbl_goihang.*','tbl_donhang.shipping_id')->first();
        // DB::table('tbl_donhang')->where('order_id',$order_id)->delete();
        // DB::table('tbl_chitiet_donhang')->where('order_id',$order_id)->delete();
        // DB::table('tbl_goihang')->where('shipping_id',$result->shipping_id)->delete();
        $data = array();
        $data['order_status']=0;
        $result = DB::table('tbl_donhang')->where('order_id',$order_id)->update($data);
        Session::put('message_danger','Đã Hủy Đơn Hàng Của Bạn ');
       
        
        return Redirect::to('/HoSo-KhachHang');
    }
    public function CapNhatUser(Request $request,$customer_id){
        $data = array();
        $data['customer_name']= $request->name;
        $data['customer_email']=$request->email;

         $update = DB::table('tbl_khachhang')->where('customer_id',$customer_id)->update($data);
            if($update){
                Session::put('message','Đã Cập Nhật Thông Tin Cho Bạn');
                return Redirect::to('/HoSo-KhachHang');
            }else{
                Session::put('message_danger','Không Thể Cập Nhật Thông Tin ');
                return Redirect::to('/HoSo-KhachHang');
            }

    }
    public function CapNhatMatKhau(Request $request){
            $pass_old = md5($request->passold);
            $pass_new =$request->passnew;
            $repeatpass =$request->repeatpass;
            $infouser = DB::table('tbl_khachhang')->where('customer_password',$pass_old)->first();
             $customer_id =  Session::get('customer_id');
            if($infouser && $pass_new ===$repeatpass){
                    $data = array();
                    $data['customer_password'] = md5($request->passnew);
                    DB::table('tbl_khachhang')->where('customer_id',$customer_id)->update($data);
                    Session::put('message','Đổi Mật Khẩu Thành Công');
                    return Redirect::to('/HoSo-KhachHang');
            }elseif(!$infouser){
                Session::put('message_danger','Mật Khẩu Cũ Không Đúng');
                return Redirect::to('/HoSo-KhachHang');
            }else if($pass_new !=$repeatpass){
                    Session::put('message_danger','Mật Khẩu Không Trùng Khớp');
                    return Redirect::to('/HoSo-KhachHang');
            }
           
    }
    public function SendPass(Request $request){
               $to_name = Session::get('customer_name');
               $to_email = $request->emailold;//send to this email
               $shop = 'Shop Family Ecosystem';
               $result = DB::table('tbl_khachhang')->where('customer_email',$to_email)->first();
               if($result)
               {
               $newpass = 'Linhxinh'.rand(0,99);
               $data_pass = array();
               $data_pass['customer_password'] = md5($newpass);
               DB::table('tbl_khachhang')->where('customer_email',$to_email)->update($data_pass);

               $main_massage = $newpass;
               
                $data = array("name"=>$to_name,"body"=>'Mail gửi về vấn về đổi mật khẩu' ,"pass"=>$main_massage);
               
               Mail::send('pages.send-pass',$data,function($message) use ($shop,$to_email){

                   $message->to($to_email)->subject('Mật Khẩu Mới Được Gửi Từ Shop Family Ecosystem');//send this mail with subject
                   $message->from($to_email,$shop);//send from this mail

               });
               return Redirect::to('/HoSo-KhachHang');
                
            }
               //--send mail
    }

    public function senMail(){
                $to_name = Session::get('customer_name');
                $to_email = Session::get('customer_email');//send to this email
                $dulieu = DB::table('tbl_donhang')->get();
                Session::put('thongbao','Đơn Hàng Đã Gửi Tới Email Của Bạn.Trân Trọng!');
                foreach($dulieu as $key=>$dulieu1)
                $data = array("name"=>$to_name,"body"=>'Mail gửi về vấn về hàng hóa',"Tien"=>$dulieu1->order_total); //body of mail.blade.php
                
                Mail::send('pages.send-mail',$data,function($message) use ($to_name,$to_email){

                    $message->to($to_email)->subject('Đơn Hàng gửi Từ Shop Family Ecosystem');//send this mail with subject
                    $message->from($to_email,$to_name);//send from this mail

                });
                return Redirect::to('/');

          
           
    }
    

}

