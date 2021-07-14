<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    //
    public function Luu_Gio_Hang(Request $request){
    	$productId = $request->productid_hidden;
    	$quantity = $request->qty;
    	$product_info = DB::table('tbl_sanpham')->where('product_id',$productId)->first(); 
        $content = Cart::content();
        $kiemtra=false;
        foreach($content as $v_content){
           if($v_content->id == $productId)//kiểm tra id sản phẩm đúng sản phẩm cần kiểm kiểm tra
           {                   
                if($request->qty > $product_info->product_num - $v_content->qty)
                        {
                            Session::put('message','Số lượng vượt quá số lượng trong kho');
                        return redirect::to('chi-tiet-san-pham/'.$productId);

            
                        }
                        else
                        {
                            $kiemtra=true;
                        }
            }

            }
            // so sanh so luong them vao gio va so luong trong kho
            if(($quantity <= $product_info->product_num) or ($kiemtra) )
            {
                $data['id'] = $product_info->product_id;
                $data['qty'] = $quantity;
                $data['name'] = $product_info->product_name;
                $data['price'] = $product_info->product_price;
                $data['weight'] = $product_info->product_price;
                $data['options']['image'] = $product_info->product_image;
                Cart::add($data);
                return Redirect::to('/Show-Gio-Hang');
        
            }
            else {
                
                Session::put('message','Số lượng vượt quá số lượng trong kho');
                return redirect::to('chi-tiet-san-pham/'.$productId);
        
            }
     //Cart::destroy();
       
    }

    public function Show_Gio_Hang(Request $request){
     
       

        return view('pages.GioHang.Show-GioHang');
    }

    public function Xoa_Gio_Hang($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/Show-Gio-Hang');
    }
    public function Cap_Nhat_Gio_Hang(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;

        $content = Cart::content();
        Cart::update($rowId,$qty);
        foreach($content as $v_content){
         $product_info = DB::table('tbl_sanpham')->where('product_id',$v_content->id)->first();              
        if($qty > $product_info->product_num)
                {
                    Session::put('message','Hiện Tại Trong Kho Không Đủ Số Lượng Sản Phẩm Bạn Đặt');
                    return Redirect::to('/Show-Gio-Hang');
                }
                else
                {
                   
                }
               
            }

       return Redirect::to('/Show-Gio-Hang');
        
    }
   
}
