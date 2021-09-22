<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['cate_name','cate_des','cate_status'];
    protected $primaryKey = 'cate_id';
    protected $table = 'tbl_category';
}
