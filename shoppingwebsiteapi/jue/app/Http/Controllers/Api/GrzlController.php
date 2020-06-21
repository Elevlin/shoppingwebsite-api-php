<?php

namespace App\Http\Controllers\Api;

use app\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\GrzlModel;
use App\Submission;

class GrzlController extends Controller{

	protected $resultSetType = 'collection';

	public function getGRZL(Request $request){
		
		$response = array('status' => '400', 'msg' => 'failed','data' => '');
		$data = array();
		// 获取请求参数值
		$username = $request->input("username");
		//  根据参数值去向表里查找对应的数据
		// 方法一
		// $grzl =  DB::select('SELECT nc,realname,sex,txpic FROM grzl A LEFT JOIN user B ON A.username=B.username'); 
		// 方法二
		$grzl =  DB::table('grzl')->select('grzl.id','nc','realname','sex','txpic')->rightJoin('users','grzl.username','=','users.username')->where('users.username',$username)->get();
		// 查找完毕之后，把查找到的数据赋值给response下的data字段
		$response['data'] = $grzl;
		$response['status'] = '200';
		$response['msg'] = 'success';
		return json_encode($response);
	}

	public function reGRZL(Request $request){

		$response = array('status' => '400', 'msg' => 'failed','data' => '');
		$data = array();
		// 获取请求参数值
		$username = $request->input('username');
		$nc = $request->input('nc');
		$sex = $request->input('sex');
		$realname = $request->input('realname');
		$txpic = $request->input('txpic');
		// // 根据参数值去向表里查找对应的数据
		$reuser =  DB::table('grzl')->where('username',$username)->update(['nc'=>$nc,'sex'=>$sex,'realname'=>$realname,'txpic'=>$txpic]); 
		$grzl =  DB::table('grzl')->select('grzl.id','nc','realname','sex','txpic')->leftJoin('users','grzl.username','=','users.username')->get();
		// 查找完毕之后，把查找到的数据赋值给response下的data字段
		$response['data'] = $grzl;
		$response['status'] = '200';
		$response['msg'] = 'success';
		return json_encode($response);
		
	}
}