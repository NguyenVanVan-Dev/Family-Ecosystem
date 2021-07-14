<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhmucModel extends Model
{
    use HasFactory;
    public $timestamps = true; 
    protected $table ='danh_muc_table';
    protected $fillable = ['category_name','category_key','category_slug','category_status','category_desc','category_parent'];
    protected $primaryKey = 'category_id';

}
