<?php

namespace App\Http\Controllers\Api;

use App\Models\AdressModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Database\connection;
use App\Submission;

class AdressController extends Controller{
	
	//查看收货地址
	public function dzxx(Request $request){
		$response = array('status' => '400', 'msg' => 'failed','data' => '');

		$data=array();

		$nc = $request->input('nc');	

		$dzxx = DB::table('shadress')->where('nc',$nc)->get();

        $response['data'] = $dzxx;
		$response['status'] = '200';
		$response['msg'] = 'success';
        return json_encode($response);
	}

	//添加收货地址
	public function tjdz(Request $request){

		$response = array('status' => '400', 'msg' => 'failed','data' => '');

		$data=array();

		$nc = $request->input("nc");	
		$shAdress = $request->input("shAdress");
		$shName = $request->input("shName");
		$shCall = $request->input('shCall');

		$data = AdressModel::create([
			'nc' => $nc,
			'shAdress' => $shAdress,
			'shName' => $shName,
			'shCall' => $shCall,
		]);

        $response['data'] = $data;
		$response['status'] = '200';
		$response['msg'] = 'success';
        return json_encode($response);
	}

	//修改收货地址
	public function reAdress(Request $request){
		$response = array('status' => '400', 'msg' => 'failed','data' => '');
		$data = array();
		// 获取请求参数值
		$nc = $request->input('nc');
		$shAdress = $request->input('shAdress');
		$shCall = $request->input('shCall');
		$shName = $request->input('shName');
		// // 根据参数值去向表里查找对应的数据
		$reAdress =  DB::table('shadress')->where('nc',$nc)->update(['shAdress'=>$shAdress,'shCall'=>$shCall,'shName'=>$shName]); 
		$dzxx = DB::table('shadress')->where('nc',$nc)->get();
		// 查找完毕之后，把查找到的数据赋值给response下的data字段
		$response['data'] = $dzxx;
		$response['status'] = '200';
		$response['msg'] = 'success';
		return json_encode($response);
	}

}