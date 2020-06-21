<?php

namespace App\Http\Controllers\Api;

use app\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\connection;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Models\GwcModel;
use App\Models\SpmxModel;
use App\Submission;
use App\Http\Controllers\Api\UserController;

/**
 *  思路：从spmx中select数据，添加到gwc中。
 */
class GwcController extends Controller
{
	
	// public function selectspmx(Request $request)
	// {

	// 	$data = array();

	// 	$spmxId = $request->input('spmxId');	// 注意大小写（地址、别名）

	// 	$spmxd = SpmxModel::find($spmxId);

	// 	$data = $spmxd;
		
 //        return json_encode($data);
	// }


	// 添加购物车  session/cookie进行判断   用token验证是否登陆
	public function addGWC(Request $request){

		$response = array('status' => '400', 'msg' => 'failed','data' => '');

		$data=array();

		$spmxId = $request->input('spmxId');	// 注意大小写（地址、别名）

		$Spmxdata = SpmxModel::find($spmxId);

		$username = $request->input("username");  // 直接
		// // 根据参数值去向表里查找对应的数据
		// $user =  DB::table('grzl')->select('username')->where('username',$username)->get(); 

        $data = GwcModel::create([
        	'user' => $username,
            'dpmc' => $Spmxdata['dpmc'],
            'spmc' => $Spmxdata['spmc'],
            'color' => $Spmxdata['color'],
            'size' => $Spmxdata['size'],
            'dj' => $Spmxdata['dj'],
            'sl' => 1,
            'sppic' =>	$Spmxdata['pic'],
        ]);

        $response['data'] = $data;
		$response['status'] = '200';
		$response['msg'] = 'success';
        return json_encode($response);

	}

	// 删除购物车
	public function deleteGWC(Request $request){

		$response = array('status' => '400', 'msg' => 'failed','data' => '');

		$data=array();

		$gwcid = $request->input('gwcid');	// 注意大小写（地址、别名）

		$gwcdata = GwcModel::find($gwcid);

		/*if($gwcdata['sl']=='1'){

			$deletegwc = DB::table('gwc')->where('id','=>','$gwcid')->delete();
			return json_encode($deletegwc); 
		}
		else {
			$deleteg = DB::table('gwc')->select('sl')->where('id','=>','$gwcid')->get();
			$deletegwc = $deleteg['sl']-1;
		}
*/
		$deletegwc = DB::table('gwc')->where('id',$gwcid)->delete();

		$dgwc = DB::table('gwc')->select('dpmc','spmc','color','size','dj','sl','sppic')->get();

        $response['data'] = $deletegwc;
		$response['status'] = '200';
		$response['msg'] = 'success';
        return json_encode($response);

	}

	// 查看购物车

	public function GWC(Request $request){

		$response = array('status' => '400', 'msg' => 'failed','data' => '');

		$data=array();

		$gwc = DB::select('SELECT dpmc,spmc,color,size,dj,sl,sppic,user FROM gwc A LEFT JOIN users B ON A.user=B.username');

		// $gwc = DB::table('gwc')->select('dpmc','spmc','color','size','dj','sl','sppic')->get();

		$response['data'] = $gwc;
		$response['status'] = '200';
		$response['msg'] = 'success';
		return json_encode($response);

	}

}