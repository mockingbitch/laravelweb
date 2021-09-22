<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\CouponModel;
session_start();
class CouponController extends Controller
{
    public function AuthLogin(){
        $ad_id = Session::get('ad_id');
        if($ad_id){
            return Redirect::to('dashboard');
        }
        else{
            return Redirect::to('admin')->send();
        }
    }
    public function addCoupon(){
        $this->AuthLogin();
        return view('admin.coupon.addcoupon');
    }
    public function saveCoupon(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $coupon = new CouponModel;
        $coupon->cp_name = $data['cp_name'];
        $coupon->cp_value = $data['cp_value'];
        $coupon->cp_code = $data['cp_code'];
        $coupon->cp_function = $data['cp_function'];
        $coupon->cp_status = $data['cp_status'];
        $coupon->cp_qty = $data['cp_qty'];
        $coupon->save();
        Session::put('message', 'Thêm mã giảm giá thành công');
        return Redirect::to('add-coupon');
    }
    public function listCoupon(){
        $this->AuthLogin();
        $coupon = CouponModel::orderby('cp_id','DESC')->get();
        return view('admin.coupon.listcoupon')->with(compact('coupon'));
    }public function unactiveCoupon($cp_id){
        $this->AuthLogin();
        DB::table('tbl_coupon')->where('cp_id',$cp_id)->update(['cp_status'=>2]);
        Session::put('message','Đã ẩn');
        return Redirect::to('list-coupon');
    }
    public function activeCoupon($cp_id){
        $this->AuthLogin();
        DB::table('tbl_coupon')->where('cp_id',$cp_id)->update(['cp_status'=>1]);
        Session::put('message','Đã hiển thị');
        return Redirect::to('list-coupon');
    }
    public function deleteCoupon($cp_id){
         $coupon = CouponModel::find($cp_id);
          $coupon->delete();
        //  Session::put('message','Xoá mã giảm giá thành công');
        //  return Redirect::to('list-coupon');
        // $this->AuthLogin();
        // DB::table('tbl_coupon')->where('cp_id',$cp_id)->delete();
        Session::put('message','Xoá danh mục sản phẩm thành công');
        return Redirect::to('list-coupon');
    }
    
}
