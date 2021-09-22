<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\CouponModel;

session_start();
class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        if ($cart == true) {
            $is_available = 0;
            foreach ($cart as $key => $val) {
                if ($val['pr_id'] == $data['cart_pr_id']) {
                    $is_available++;
                }
            }
            if ($is_available == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'pr_name' => $data['cart_pr_name'],
                    'pr_id' => $data['cart_pr_id'],
                    'pr_img' => $data['cart_pr_img'],
                    'pr_qty' => $data['cart_pr_qty'],
                    'pr_price' => $data['cart_pr_price'],
                );
                Session::put('cart', $cart);
            }
        } else {
            $cart[] = array(
                'session_id' => $session_id,
                'pr_name' => $data['cart_pr_name'],
                'pr_id' => $data['cart_pr_id'],
                'pr_img' => $data['cart_pr_img'],
                'pr_qty' => $data['cart_pr_qty'],
                'pr_price' => $data['cart_pr_price'],

            );
            Session::put('cart', $cart);
        }

        Session::save();
    }


    public function showCart(Request $request)
    {
        $meta_desc = "Giỏ hàng của bạn";
        $meta_keywords = "Giỏ hàng";
        $meta_title = "Giỏ hàng";
        $url_canoncial = $request->url();
        $cate_pr = DB::table('tbl_category')->where('cate_status', '1')->orderby('cate_id', 'desc')->get();
        $brand_pr = DB::table('tbl_brand')->where('br_status', '1')->orderby('br_id', 'desc')->get();
        return view('pages.product.checkout')->with('brand_pr', $brand_pr)->with('cate_pr', $cate_pr)
            ->with('meta_desc', $meta_desc)->with('meta_title', $meta_title)->with('meta_keywords', $meta_keywords)
            ->with('url_canoncial', $url_canoncial);
    }
    public function deleteCart($session_id)
    {
        $cart = Session::get('cart');
        if ($cart == true) {
            foreach ($cart as $key => $value) {
                if ($value['session_id'] == $session_id) {
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'Xoá sản phẩm thành công');
        } else {
            return redirect()->back()->with('message', 'Xoá sản phẩm thất bại');
        }
    }
    public function updateCart(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        if ($cart == true) {
            foreach ($data['cart_qty'] as $key => $qty) {
                foreach ($cart as $session => $value) {
                    if ($value['session_id'] == $key) {
                        $cart[$session]['pr_qty'] = $qty;
                    }
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'Cập nhật giỏ hàng thành công');
        } else {
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'Cập nhật giỏ hàng thất bại');
        }
    }
    public function checkCoupon(Request $request)
    {
        $data = $request->all();
         //$coupon = DB::table('tbl_coupon')->where('cp_code',$data['cp_code'])->get();
        $coupon = CouponModel::where('cp_code',$data['cp_code'])->first();
        if ($coupon) {
            $count_cp = $coupon->count();
            if ($count_cp > 0) {
                $coupon_session = Session::get('coupon');
                if ($coupon_session == true) {
                    $is_available = 0;
                    if ($is_available == 0) {
                        $cou[] = array(
                            'cp_code' => $coupon->cp_code,
                            'cp_function' => $coupon->cp_function,
                            'cp_value' => $coupon->cp_value,
                            'cp_qty' => $coupon->cp_qty
                        );
                        Session::put('coupon', $cou);
                    }
                } else {
                    $cou[] = array(
                        'cp_code' => $coupon->cp_code,
                        'cp_function' => $coupon->cp_function,
                        'cp_value' => $coupon->cp_value,
                        'cp_qty' => $coupon->cp_qty
                    );
                    Session::put('coupon', $cou);
                }
                Session::save();
                return redirect()->back()->with('message', 'Thêm mã giảm giá thành công');
            }
        }
        else{
            return redirect()->back()->with('error', 'Mã giảm giá không tồn tại hoặc quá hạn');
        }
    }






    // ======================================================BACK END=====================================


}
