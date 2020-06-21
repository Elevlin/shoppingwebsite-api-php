<?php

namespace App\Http\Controllers\Api;

use app\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Submission;
use Config\Session;

class UserController extends Controller{

	public function login(Request $request){

		$userInfo = $request->all();

		$user = UserModel::userLogin($userInfo);

		

		return $user;
		// $response = array('status' => '400', 'msg' => 'failed','data' => '');
		// $data = array();
		// // 获取请求参数值
		// $username = $request->input("username");
		// $password = md5($request->input("password"));
		// // 根据参数值去向表里查找对应的数据
		// $user =  DB::table('users')->where('username',$username)->get(); 
		// // 查找完毕之后，把查找到的数据赋值给response下的data字段

		// if(!$user){
		// 	$response['status']='400';
		// 	$response['msg'] = '该用户不存在';
		// }
		// if (empty($username)||empty($password)) {
		// 	$response['status']='400';
		// 	$response['msg'] = '用户名或密码不得为空';
		// }else{
		// // else if($password != $user->password){
		// // 	$response['status']='400';
		// // 	$response['msg'] = '密码错误';
		// // }else{
		// 	$response['data'] = $user;
		// 	$response['status'] = '200';
		// 	$response['msg'] = 'success';
		// }
		// return $response;
		// if (isset($username)) {
		// 	$response['data'] = $user;
		// 	$response['status'] = '200';
		// 	$response['msg'] = 'success';
		// 	return json_encode($response);
		// }else{
		// 	$response['msg'] = '请查看用户或者密码是否正确';
		// 	return json_encode($response);
		// }
		
	}

	public function repsd(Request $request){

		$response = array('status' => '400', 'msg' => 'failed','data' => '');
		$data = array();
		// 获取请求参数值
		$username = $request->input("username");
		$password = md5($request->input("password"));
		// // 根据参数值去向表里查找对应的数据
		$reuser =  DB::table('users')->where('username',$username)->update(['password'=>$password]); 
		$user = DB::table('users')->select('id','username', 'password')->get();
		// 查找完毕之后，把查找到的数据赋值给response下的data字段
		$response['data'] = $user;
		$response['status'] = '200';
		$response['msg'] = 'success';
		return json_encode($response);

	}

	

}

 

