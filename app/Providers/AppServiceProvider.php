<?php

namespace App\Providers;

use App\Models\SanPhamModel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
       
        $category = DB::table('danh_muc_table')->get();
        View::share('categories',$category);
        $dacbiet = DB::table('tbl_sanpham')->where('product_display','2')->get();
        View::share('dacbiet',$dacbiet);
        $product_Noibat = DB::table('tbl_sanpham')->where('product_display','4')->get();
        View::share('noibat',$product_Noibat);
      
        // $data_user = DB::table('tbl_khachhang')->get()->count(); 
        // $data_product = DB::table('tbl_sanpham')->get()->count(); 
        // View

    }
}
