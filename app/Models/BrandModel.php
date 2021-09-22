<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['br_name','br_des','br_status'];
    protected $primaryKey = 'br_id';
    protected $table = 'tbl_brand';
    
}
