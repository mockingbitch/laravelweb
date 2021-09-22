<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['pr_name','pr_des','pr_status','pr_price','pr_content','pr_img','cate_id','br_id'];
    protected $primaryKey = 'pr_id';
    protected $table = 'tbl_product';
}
