<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\ProductModel;
session_start();
class Product extends Controller
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
    
    public function addProduct(){
        $this->AuthLogin();
        $cate_pr = DB::table('tbl_category')->orderby('cate_id','desc')->get();
        $brand_pr = DB::table('tbl_brand')->orderby('br_id','desc')->get();
        return view('admin.addProduct')->with('brand_pr', $brand_pr)->with('cate_pr', $cate_pr);

    }
    public function listProduct(){
        $this->AuthLogin();
        $list_pr = DB::table('tbl_product')->join('tbl_category','tbl_category.cate_id','=','tbl_product.cate_id')->join('tbl_brand','tbl_brand.br_id','=','tbl_product.br_id')->orderby('tbl_product.pr_id','desc')->get();
        $manager_cate = view('admin.listProduct')->with('listProduct',$list_pr);
        return view('adminLayout')->with('admin.listProduct',$manager_cate);
    }
    public function saveProduct(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['pr_name'] = $request->pr_name;
        $data['cate_id'] = $request->cate_id;
        $data['br_id'] = $request->br_id;
        $data['pr_des'] = $request->pr_des;
        $data['pr_content'] = $request->pr_content;
        $data['pr_price'] = $request->pr_price;
        $data['pr_status'] = $request->pr_status;
        $get_img = $request->file('pr_img');
        if($get_img){
            $get_name_img = $get_img->getClientOriginalExtension();
            $name_img = current(explode('.', $get_name_img));
            $new_img = $name_img.rand(0,9999).'.'.$get_img->getClientOriginalExtension();
            $get_img->move('public/uploads/product',$new_img);
            $data['pr_img'] = $new_img;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Th??m danh m???c th??nh c??ng');
            return  Redirect::to('add-product');
        }
        $data['pr_img'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message','Th??m danh m???c th??nh c??ng');
        return  Redirect::to('add-product');
    }
    public function unactiveProduct($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('pr_id',$product_id)->update(['pr_status'=>2]);
        Session::put('message','???? ???n');
        return Redirect::to('list-product');
    }
    public function activeProduct($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('pr_id',$product_id)->update(['pr_status'=>1]);
        Session::put('message','???? hi???n th???');
        return Redirect::to('list-product');
    }
    public function editProduct($product_id){
        $this->AuthLogin();
        $cate_pr = DB::table('tbl_category')->orderby('cate_id','desc')->get();
        $brand_pr = DB::table('tbl_brand')->orderby('br_id','desc')->get();
        $edit_pr = DB::table('tbl_product')->where('pr_id',$product_id)->get();
        $manager_pr = view('admin.editProduct')->with('editProduct',$edit_pr)->with('cate_pr',$cate_pr)->with('brand_pr',$brand_pr);
        return view('adminLayout')->with('admin.editProduct',$manager_pr);
    }
    public function deleteProduct($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('pr_id',$product_id)->delete();
        Session::put('message','Xo?? s???n ph???m th??nh c??ng');
        return Redirect::to('list-product');

    }
    public function updateProduct(Request $request,$product_id){
        $this->AuthLogin();
        $data = array();
        $data['pr_name'] = $request->pr_name;
        $data['cate_id'] = $request->cate_id;
        $data['br_id'] = $request->br_id;
        $data['pr_des'] = $request->pr_des;
        $data['pr_content'] = $request->pr_content;
        $data['pr_price'] = $request->pr_price;
        $get_img = $request->file('product_img');
        if($get_img){
            $get_name_img = $get_img->getClientOriginalExtension();
            $name_img = current(explode('.', $get_name_img));
            $new_img = $name_img.rand(0,9999).'.'.$get_img->getClientOriginalExtension();
            $get_img -> move('public/uploads/product',$new_img);
            $data['pr_img']  = $new_img;
            DB::table('tbl_product')->where('pr_id',$product_id)->update($data);
            Session::put('message','C???p nh???t s???n ph???m th??nh c??ng');
            return  Redirect::to('list-product');
        }
        
        DB::table('tbl_product')->where('pr_id',$product_id)->where('pr_id',$product_id)->update($data);
        Session::put('message','C???p nh???t s???n ph???m th??nh c??ng');
        return Redirect::to('list-product');

    }
     //=============================================END DASHBOARD PAGE===============================================
    


     //=============================================FRONT END PAGE==================================================
    public function getProductDetail($product_id){
        $cate_pr = DB::table('tbl_category')->where('cate_status','1')->orderby('cate_id','desc')->get();
        $brand_pr = DB::table('tbl_brand')->where('br_status','1')->orderby('br_id','desc')->get();
        $product_detail = DB::table('tbl_product')
        ->join('tbl_category','tbl_product.cate_id','=','tbl_category.cate_id')
        ->join('tbl_brand','tbl_brand.br_id','=','tbl_product.br_id')
        ->where('tbl_product.pr_id',$product_id)->get();
        foreach($product_detail as $key => $value)
        {
            $category_id = $value->cate_id;
        }
        $related_product = DB::table('tbl_product')
        ->join('tbl_category','tbl_product.cate_id','=','tbl_category.cate_id')
        ->join('tbl_brand','tbl_brand.br_id','=','tbl_product.br_id')
        ->where('tbl_category.cate_id',$category_id)->whereNotIn('tbl_product.pr_id',[$product_id])->get();
        return view('pages.product.productdetail')->with('category', $cate_pr)->with('brand', $brand_pr)
        ->with('product_detail',$product_detail)->with('related_product',$related_product);
    }
    public function getAllProduct(){
         
        $cate_pr = DB::table('tbl_category')->where('cate_status','1')->orderby('cate_id','desc')->get();
        $brand_pr = DB::table('tbl_brand')->where('br_status','1')->orderby('br_id','desc')->get();
        $product = DB::table('tbl_product')->get();
        return view('pages.product.allproduct')->with('category', $cate_pr)->with('brand', $brand_pr)->with('product',$product);
    }
}
