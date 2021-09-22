<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
   
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['tentinhthanhpho','type'];
    protected $primaryKey = 'matp';
    protected $table = 'tbl_tinhthanhpho';
}
