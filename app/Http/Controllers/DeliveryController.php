<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\CityModel;
use App\Models\ProvinceModel;
use App\Models\WardsModel;
use App\Models\FeeshipModel;
session_start();

class DeliveryController extends Controller
{
    public function delivery(Request $request){
        $city = CityModel::orderby('matp','ASC')->get();
      
        $wards = WardsModel::orderby('xaid','ASC')->get();
        return view('admin.delivery.delivery')->with(compact('city'));
    }
    public function saveDelivery(Request $request){
        $data = $request->all();
        $fee_ship = new FeeShipModel();
        $fee_ship->fee_matp = $data['city'];
        $fee_ship->fee_maqh = $data['province'];
        $fee_ship->fee_feeship = $data['fee_ship'];
       $fee_ship->save();
    }
    public function selectDelivery(Request $request){
        $data = $request->all();
    	if($data['action']){
    		$output = '';
    		if($data['action']=="city"){
    			$select_province = ProvinceModel::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
    				$output.='<option>---Chọn quận huyện---</option>';
    			foreach($select_province as $key => $province){
    				$output.='<option value="'.$province->maqh.'">'.$province->tenquanhuyen.'</option>';
    			}

    		}else{

    			// $select_wards = WardsModel::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
    			// $output.='<option>---Chọn xã phường---</option>';
    			// foreach($select_wards as $key => $ward){
    			// 	$output.='<option value="'.$ward->xaid.'">'.$ward->tenxaphuongthitran.'</option>';
    			// }
    		}
    		echo $output;
    	}
       
    }
    public function selectFeeship(){
        $feeship = FeeshipModel::orderby('fee_id', 'DESC')->get();
        $output = '';
        $output .='<div class="table-responsive">
                <table class = "table table-bordered">
                <thread>
                    <tr>
                        <th>Tên thành phố</th>
                        <th>Tên quận huyện</th>
                        <th>Phí ship</th>
                    <tr>
                <thread>
                <tbody> ';
                foreach($feeship as $key => $value){
                    $output .='
                    <tr>
                        <td>'.$value->city->tentinhthanhpho.'</td>
                        <td>'.$value->province->tenquanhuyen.'</td>
                        <td contenteditalbe data-feeship_id="'.$value->fee_id.'">'.number_format($value->fee_feeship,0,',','.').'</td>
                    </tr>
                         ';     
                }
                    $output .='
                </tbody>
                </table>
                </div>
        ';
        echo $output;
    }
}
