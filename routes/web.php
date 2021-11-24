<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\ThanhToanController;
use App\Models\DanhmucModel;
use App\Models\SanPhamModel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'index']);
Route::get('/home',[HomeController::class,'index']);

//Admin
Route::get('/admin',[AdminController::class,'index']);
Route::post('/login-admin',[AdminController::class,'DangNhapAdmin']);
Route::get('/Quan-Li',[AdminController::class,'GiaoDienAdmin']);
// Quản lí dự án tới đậy rồi nè theo Jira thì mới thể hiện được tới đây 23/11/2021
Route::get('/DangXuat',[AdminController::class,'logout']);
Route::get('/Them-NhanVien',[AdminController::class,'Them_NhanVien']);
Route::post('/Luu-NhanVien',[AdminController::class,'Luu_NhanVien']);
Route::get('/LietKe-NhanSu',[AdminController::class,'LietKe_NhanSu']);
Route::get('/Xoa-NhanSu/{admin_id}',[AdminController::class,'Xoa_NhanSu']);
Route::get('/LietKe-NguoiDung',[AdminController::class,'LietKe_NguoiDung']);
Route::get('/Chan-NguoiDung/{customer_id}',[AdminController::class,'Chan_NguoiDung']);
Route::get('/Xoa-NguoiDung/{customer_id}',[AdminController::class,'Xoa_NguoiDung']);
Route::get('/MoChan-NguoiDung/{customer_id}',[AdminController::class,'MoChan_NguoiDung']);
Route::get('/DonHang-Day',[AdminController::class,'DonHang_Day']);
//Danh Muc

Route::get('/Them-Danh-Muc',[DanhMucController::class,'Them_Danh_Muc']);
Route::get('/Liet-Ke-Danh-Muc',[DanhMucController::class,'Liet_Ke_Danh_Muc']);
Route::post('/Luu-Danh-Muc',[DanhMucController::class,'Luu_Danh_Muc']);
Route::get('/An-Danh-Muc/{category_id}',[DanhMucController::class,'An_Danh_Muc']);
Route::get('/Hien-Danh-Muc/{category_id}',[DanhMucController::class,'Hien_Danh_Muc']);
Route::get('/Sua-Danh-Muc/{category_id}',[DanhMucController::class,'Sua_Danh_Muc']);
Route::post('/Cap-Nhat-Danh-Muc/{category_id}',[DanhMucController::class,'Cap_Nhat_Danh_Muc']);
Route::get('/Xoa-Danh-Muc/{category_id}',[DanhMucController::class,'Xoa_Danh_Muc']);
// Sản Phẩm
Route::get('/Them-San-Pham',[SanPhamController::class,'Them_San_Pham']);
Route::post('/Luu-San-Pham',[SanPhamController::class,'Luu_San_Pham']);
Route::get('/Liet-Ke-San-Pham',[SanPhamController::class,'Liet_Ke_San_Pham']);
Route::get('/An-San-Pham/{product_id}',[SanPhamController::class,'An_San_Pham']);
Route::get('/Hien-San-Pham/{product_id}',[SanPhamController::class,'Hien_San_Pham']);
Route::get('/Sua-San-Pham/{product_id}',[SanPhamController::class,'Sua_San_Pham']);
Route::post('/Cap-Nhat-San-Pham/{product_id}',[SanPhamController::class,'Cap_Nhat_San_Pham']);
Route::get('/All-SanPham',[SanPhamController::class,'All_SanPham']);

Route::get('/Xoa-San-Pham/{product_id}',[SanPhamController::class,'Xoa_San_Pham']);
Route::get('/Chi-Tiet-San-Pham/{product_id}',[SanPhamController::class,'Chi_Tiet_San_Pham']);
//Tìm Sản Phẩm
Route::get('/Tim-Kiem',[SanPhamController::class,'Tim_Kiem']);
// Sản Phẩm Theo Danh Mục
Route::get('/Danh-Muc-San-Pham/{category_id}',[DanhMucController::class,'SP_Danh_Muc']);
//Trang Liên Kết
Route::get('/About',[DanhMucController::class,'About']);
Route::get('/Faqs',[DanhMucController::class,'Faqs']);
Route::get('/Contact',[DanhMucController::class,'Contact']);
//Giỏ Hàng
Route::post('/Luu-Gio-Hang',[CartController::class,'Luu_Gio_Hang']);
Route::get('/Show-Gio-Hang',[CartController::class,'Show_Gio_Hang']);
Route::get('/Xoa-Gio-Hang/{rowId}',[CartController::class,'Xoa_Gio_Hang']);
Route::post('/Cap-Nhat-Gio-Hang',[CartController::class,'Cap_Nhat_Gio_Hang']);
//Thanh Toán
Route::get('/Login-Checkout',[ThanhToanController::class,'Login_Checkout']);
Route::post('Them-Khach-Hang',[ThanhToanController::class,'Them_KhachHang']);
Route::get('/Checkout',[ThanhToanController::class,'Checkout']);
Route::post('/Dang-Ki',[ThanhToanController::class,'Them_KhachHang']);
Route::post('/Dang-Nhap',[ThanhToanController::class,'DangNhap_KhachHang']);
Route::get('/DangXuat-KhachHang',[ThanhToanController::class,'DangXuat']);
Route::post('/Nhan-Don-Hang',[ThanhToanController::class,'NhanDonHang']);
Route::get('/Thanh-Toan',[ThanhToanController::class,'ThanhToan']);
Route::post('/Dat-Hang',[ThanhToanController::class,'Dat_Hang']);
Route::get('/QuanLi-DonHang',[ThanhToanController::class,'QuanLi_DonHang']);
Route::get('/Show-DonHang/{order_id}',[ThanhToanController::class,'Show_DonHang']);
Route::post('/CapNhat-DonHang/{order_id}',[ThanhToanController::class,'CapNhat_DonHang']);
Route::get('/Xoa-DonHang/{order_id}',[ThanhToanController::class,'Xoa_DonHang']);
Route::get('/send-mail',[ThanhToanController::class,'senMail']);

//Khách Hàng
Route::get('/HoSo-KhachHang',[ThanhToanController::class,'HoSo_KhachHang']);
Route::get('/Huy-Don-Hang/{order_id}',[ThanhToanController::class,'HuyDonHang']);
Route::post('/Cap-Nhat-User/{customer_id}',[ThanhToanController::class,'CapNhatUser']);
Route::post('/Cap-Nhat-Pass',[ThanhToanController::class,'CapNhatMatKhau']);
Route::post('/Quen-Pass',[ThanhToanController::class,'SendPass']);

