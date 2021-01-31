<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'frontendController@index');



Auth::routes();

// =================All auth routes are here====================
Route::get('home', 'HomeController@index')->name('home');
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\loginController@showLoginForm')->name('login.admin');
Route::post('admin','Admin\LoginController@login');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

// =================All admin routes are here====================
//category section
Route::get('admin/categoy','Admin\Category@Create')->name('admin.cateogry');
Route::post('admin/categoy/store','Admin\Category@Store')->name('store.category');
Route::get('edit/category{cat_id}', 'Admin\Category@Edit');
Route::post('category/update{id}','Admin\Category@Update');
Route::get('delete/category{del_id}', 'Admin\Category@Delete');
Route::get('category/deactive{del_id}', 'Admin\Category@Deactive');
Route::get('category/active{del_id}', 'Admin\Category@Active');

// all brand routes are here
Route::get('add/brand','brandsController@Create')->name('add.brand');
Route::post('store/brand','brandsController@Store')->name('store.brand');
Route::get('edit/brand{id}','brandsController@Edit');
Route::post('update/brand{id}','brandsController@Update');
Route::get('delete/brand{id}', 'brandsController@Delete' );
Route::get('deactive/brand{id}', 'brandsController@Deactive' );
Route::get('active/brand{id}', 'brandsController@Active');

//all products routes are here
Route::get('add/product', 'Admin\productController@Create')->name('add-product');
Route::post('store/product', 'Admin\productController@Store')->name('store-product');
Route::get('manage/product', 'Admin\productController@ManageProduct')->name('manage-product');
Route::get('edit/product{id}','Admin\productController@editProduct');
Route::post('update/product{id}','Admin\productController@updateProduct');
Route::post('update/image{id}','Admin\productController@updateImage');
Route::get('delete/product{id}','Admin\productController@deleteProduct');
Route::get('deactive/product{id}','Admin\productController@deactiveProduct');
Route::get('active/product{id}','Admin\productController@activeProduct');

//coupons
Route::get('add/coupons','Admin\couponController@index')->name('add.coupon');
Route::post('store/coupons','Admin\couponController@Store')->name('store.coupon');
Route::get('edit/coupon{id}','Admin\couponController@Edit');
Route::post('update/coupon{id}','Admin\couponController@Update');
Route::get('delete/coupon{id}','Admin\couponController@Delete');
Route::get('deactive/coupon{id}', 'Admin\couponController@Deactive');
Route::get('active/coupon{id}', 'Admin\couponController@Active');

//Carts route are here
Route::post('add/to-cart{id}','Admin\CartController@Create');
Route::get('cart','Admin\CartController@cartPage');
Route::get('remove/cart{id}','Admin\CartController@Destroy');
Route::post('quantity/update{id}','Admin\CartController@quantity_update');

