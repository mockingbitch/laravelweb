<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeshipModel extends Model
{
    
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['fee_matp','fee_maqh','fee_feeship'];
    protected $primaryKey = 'fee_id';
    protected $table = 'tbl_feeship';
    public function city(){
        return $this->belongsTo('App\Models\CityModel','fee_matp');
    }
    public function province(){
        return $this->belongsTo('App\Models\ProvinceModel','fee_maqh');
    }
}
