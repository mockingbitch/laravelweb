<?php

use Illuminate\Support\Facades\Route;



//===============================FRONT END=====================================
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

//Side bar menu Cate and Brand
Route::get('/brand/{brand_id}','Brand@getBrand');
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@getCategory');

//Detail 
Route::get('/chi-tiet-san-pham/{produc_id}','Product@getProductDetail');

//Cart 
//Route::post('/save-cart','CartController@saveCart');
Route::post('/add-to-cart','CartController@addToCart');
Route::get('/check-out','CartController@showCart'); 
Route::get('/delete-cart/{session_id}','CartController@deleteCart');
Route::post('update-cart','CartController@updateCart');
Route::post('check-coupon','CartController@checkCoupon');

//product
Route::get('/product','Product@getAllProduct');

//tim kiem
Route::get('/tim-kiem','HomeController@search');
Route::post('/ket-qua-tim-kiem','HomeController@searchResult');


//send mail
Route::get('/send-mail','MailController@sendMail');










// ===============================BACK END=====================================
//Admin
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@dashboard');
Route::post('/admin-dashboard', 'AdminController@loginDashboard');
Route::get('/logout', 'AdminController@logOut');


 // Category
Route::get('/add-category', 'CategoryProduct@addCategory');
Route::get('/list-category', 'CategoryProduct@listCategory');
Route::post('/save-category', 'CategoryProduct@saveCategory');

Route::get('/unactive-category/{category_id}', 'CategoryProduct@unactiveCategory');
Route::get('/active-category/{category_id}', 'CategoryProduct@activeCategory');

Route::get('/edit-category/{category_id}', 'CategoryProduct@editCategory');
Route::get('/delete-category/{category_id}', 'CategoryProduct@deleteCategory');
Route::post('/update-category/{category_id}','CategoryProduct@updateCategory');

//Brand
Route::get('/add-brand', 'Brand@addBrand');
Route::get('/list-brand', 'Brand@listBrand');
Route::post('/save-brand', 'Brand@saveBrand');

Route::get('/unactive-brand/{brand_id}', 'Brand@unactiveBrand');
Route::get('/active-brand/{brand_id}', 'Brand@activeBrand');

Route::get('/edit-brand/{brand_id}', 'Brand@editBrand');
Route::get('/delete-brand/{brand_id}', 'Brand@deleteBrand');
Route::post('/update-brand/{brand_id}','Brand@updateBrand');

//Product
Route::get('/add-product', 'Product@addProduct');
Route::get('/list-product', 'Product@listProduct');
Route::post('/save-product', 'Product@saveProduct');

Route::get('/unactive-product/{product_id}', 'Product@unactiveProduct');
Route::get('/active-product/{product_id}', 'Product@activeProduct');

Route::get('/edit-product/{product_id}', 'Product@editProduct');
Route::get('/delete-product/{product_id}', 'Product@deleteProduct');
Route::post('/update-product/{product_id}','Product@updateProduct');

//Coupon
Route::get('/add-coupon', 'CouponController@addCoupon');
Route::get('/list-coupon', 'CouponController@listCoupon');
Route::post('/save-coupon', 'CouponController@saveCoupon');

Route::get('/unactive-coupon/{cp_id}', 'CouponController@unactiveCoupon');
Route::get('/active-coupon/{cp_id}', 'CouponController@activeCoupon');

Route::get('/delete-coupon/{cp_id}', 'CouponController@deleteCoupon');
Route::post('/update-coupon/{cp_id}','CouponController@updateCoupon');

//Delivery
Route::get('/delivery', 'DeliveryController@delivery');
Route::post('/select-delivery', 'DeliveryController@selectDelivery');
Route::post('/save-delivery', 'DeliveryController@saveDelivery');
Route::post('/select-feeship','DeliveryController@selectFeeship');





