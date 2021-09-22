<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'slider_name','slider_img','slider_status','slider_des'
    ];
    protected $primaryKey = 'slider_id';
    protected $table = 'tbl_banner';
}
