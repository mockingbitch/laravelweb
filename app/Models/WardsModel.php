<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WardsModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['tenxaphuongthitran','type','maqh'];
    protected $primaryKey = 'xaid';
    protected $table = 'tbl_xaphuongthitran';
}
