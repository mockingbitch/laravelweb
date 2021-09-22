<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
session_start();
class HomeController extends Controller
{
    public function index(){
        $product = DB::table('tbl_product')->where('pr_status','1')->orderby('pr_id','desc')->limit(4)->get();
        $cate_pr = DB::table('tbl_category')->where('cate_status','1')->orderby('cate_id','desc')->get();
        $brand_pr = DB::table('tbl_brand')->where('br_status','1')->orderby('br_id','desc')->get();
        return view('pages.home')->with('category', $cate_pr)->with('brand', $brand_pr)->with('product',$product);
    }
   public function search(){
    $cate_pr = DB::table('tbl_category')->where('cate_status','1')->orderby('cate_id','desc')->get();
    $brand_pr = DB::table('tbl_brand')->where('br_status','1')->orderby('br_id','desc')->get();
    return view('pages.product.search')->with('category', $cate_pr)->with('brand', $brand_pr);
   }
   public function searchResult(Request $request){
    $keysearch = $request->keysearch;
    $cate_pr = DB::table('tbl_category')->where('cate_status','1')->orderby('cate_id','desc')->get();
    $brand_pr = DB::table('tbl_brand')->where('br_status','1')->orderby('br_id','desc')->get();
    $result = DB::table('tbl_product')->where('pr_name','like','%'.$keysearch.'%')->get();
    return view('pages.product.searchresult')->with('category', $cate_pr)->with('brand', $brand_pr)->with('searchresult',$result);
   }
}
?>
