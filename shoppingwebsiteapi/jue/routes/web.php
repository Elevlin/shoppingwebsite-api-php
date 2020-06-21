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

// Route::any('zc',"UserController@getUser");


Route::namespace('Api')->group(function () {
        //注册接口
		Route::any('/zc',"CreateController@zc");
		//登录接口
		Route::any('/login',"UserController@login");
		//个人资料
		Route::any('/grzl',"GrzlController@getGRZL");
		//修改密码
		Route::any('/repsd',"UserController@repsd");
		//修改个人资料
		Route::any('/regrzl',"GrzlController@reGRZL");
		//商品详情
		Route::any('/spmx',"SpmxController@getSPMX");
		//商品分类
		Route::any('/splb',"SpmxController@getSPFL");
		//商品搜索
		Route::any('/search',"SpmxController@search");
		//加入购物车(未完善)
		Route::any('/addgwc',"GwcController@addGWC");
		//查看购物车(未完善)
		Route::any('/gwc',"GwcController@GWC");
		//删除购物车(未完善)
		Route::any('/deletegwc',"GwcController@deleteGWC");
		//添加收货地址
		Route::any('/tjdz',"AdressController@tjdz");
		//修改收货地址
		Route::any('/reAdress',"AdressController@reAdress");
		//查看收货地址
		Route::any('/dzxx',"AdressController@dzxx");
		//获取订单
		Route::any('/searchDD',"DdglController@ckdd");
		//提交订单(未完善)
		Route::any('/tjdd',"DdglController@tjdd");
		//订单详细信息
		Route::any('/ddmx',"DdglController@ddmx");
});