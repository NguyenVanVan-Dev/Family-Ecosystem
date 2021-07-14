<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPhamModel extends Model
{
    use HasFactory;
    public $timestamps = true; 
    protected $table ='tbl_sanpham';
    protected $fillable = ['product_name','product_slug','product_num','product_status','product_desc','product_content','product_price','product_image','category_id'];
    protected $primaryKey = 'product_id';
}
