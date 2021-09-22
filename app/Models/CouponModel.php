<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponModel extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'cp_name','cp_code','cp_qty', 'cp_function','cp_value','cp_status'
    ];
    protected $primaryKey = 'cp_id';
    protected $table = 'tbl_coupon';
}
