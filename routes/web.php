<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::any('/zhuce','user@zhuce');
Route::post('/zhuce_do','user@zhuce_do');
Route::get('/login','user@login');
Route::post('/login_do','user@login_do');
Route::get('/deletelogin','user@deletelogin');
Route::get('/11','user@any');
Route::middleware(['checklogin'])->group(function () {
	Route::get('/user','user@index');
	Route::post('/doadd','user@doadd');
	Route::get('/doadd','user@list');
	Route::get('/del','user@del');
	Route::get('/upda','user@upda');
	Route::post('/doupda','user@doupda');
	
});
//新的登录
Route::any('/myshop/login','myshop\login@login');
Route::post('/myshop/do_login','myshop\login@do_login');
Route::get('/myshop/list','myshop\login@list');
//后台文件上传   全登录
Route::get('/admin/zhuce','admin\login@zhuce');
Route::post('/admin/dozhuce','admin\login@dozhuce');
Route::any('/admin/add_file','admin\add_file@add_file');
Route::post('/admin/do_file','admin\add_file@do_file');
Route::get('/admin/login','admin\login@login');
Route::get('/admin/loginout','admin\login@loginout');
Route::post('/admin/do_login','admin\login@do_login');
Route::get('/admin/list','admin\add_file@list');
Route::get('/admin/del','admin\add_file@del');
Route::get('/admin/deletelogin','admin\login@deletelogin');
Route::middleware(['checkTime'])->group(function () {
	Route::get('/admin/upda','admin\add_file@upda');
	Route::post('/admin/doupda','admin\add_file@doupda');
});
//前台登录,注册
Route::middleware(['myshoplogin'])->group(function () {
	Route::any('/index/list','index\add@index');
	Route::get('/index/cart','index\add@cart');
	Route::get('/index/cart','index\add@cart');
	Route::get('/index/cartlist','index\add@cartlist');
	Route::get('/index/order','index\add@order');
	Route::get('/index/orderlist','index\add@orderlist');
	Route::get('/index/orderdata','index\add@orderdata');
	});
Route::get('/index/zhuce','index\zhuce@zhuce');
Route::any('/index/dozhuce','index\zhuce@dozhuce');
Route::get('/index/login','index\zhuce@login');
Route::post('/index/login_do','index\zhuce@login_do');
Route::get('/index/loginout','index\zhuce@loginout');
Route::get('/index/wishlist','index\add@wishlist');


Route::get('/index/order','index\add@order');
Route::get('/index/orderlist','index\add@orderlist');
Route::get('/index/orderdata','index\add@orderdata');

//支付
Route::get('/pay','Pay\AliPayController@pay');
Route::get('/return_url','Pay\AliPayController@aliReturn');


//练习  学生增删改查
Route::get('/student/add','student@add');
Route::any('/student/doadd','student@doadd');
Route::any('/student/list','student@list');
Route::get('/student/upda','student@upda');
Route::post('/student/doupda','student@doupda');
Route::any('/student/dete','student@dete');