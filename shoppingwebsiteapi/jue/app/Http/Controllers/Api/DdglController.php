<?php

namespace App\Http\Controllers\Api;

use App\Models\TjddModel;
use App\Models\GwcModel;
use App\Models\AdressModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Database\connection;
use App\Submission

class DdglController extends Controller{

	protected $resultSetType = 'collection';

	public function tjdd(Request $request){
 
		$response = array('status' => '400', 'msg' => 'failed','data' => '');
		$data = array();
		// 获取请求参数值

		$spmc = $request -> input("spmc");
		$spmxdata = GwcModel::find($spmc);
		$zje = 0;
		$zje += ($spmxdata['dj'] * $spmxdata['sl']);
 		
		
		$nc = $request -> input('nc');
		$adressData = AdressModel::find($nc);

		
		$mjtips = $request -> input("mjtips");
		$psfs = $request -> input("psfs");

		$data = TjddModel::create([

			'spmc' => $spmc,
			'dpmc' => $spmxdata['dpmc'],
			'color' => $spmxdata['color'],
			'dj' => $spmxdata['dj'],
			'sl' => $spmxdata['sl'],
			'size' => $spmxdata['size'],
			'sppic' => $spmxdata['sppic'],
			'nc' => $nc,
			'sjr' => $adressData['sjr'],
			'sjrsj' => $adressData['sjrsj'],
			'sjrdz' => $adressData['sjrdz'],
			'mjtips' => $mjtips,
			'psfs' => $psfs,
			'zje' => $zje,

		]);

		$response['data'] = $data;
		$response['status'] = '200';
		$response['msg'] = 'success';
		return json_encode($response);


	}

	//查看已购买订单
	public function ckdd(Request $request){

		$ddInfo = $request->all();

		$ddck = TjddModel::searchDd($ddInfo);

		return $ddck;

	}

	//查看订单详细信息
	public function ddmx(Request $request){
		$response = array('status' => '400', 'msg' => 'failed','data' => '');
		$data = array();
		// 获取请求参数值
		$nc = $request->input("nc");
		//  根据参数值去向表里查找对应的数据
		// 方法一
		// $grzl =  DB::select('SELECT nc,realname,sex,txpic FROM grzl A LEFT JOIN user B ON A.username=B.username'); 
		// 方法二
		$ddmx =  DB::table('tjdd')->where('nc',$nc)->get();
		// 查找完毕之后，把查找到的数据赋值给response下的data字段
		$response['data'] = $ddmx;
		$response['status'] = '200';
		$response['msg'] = 'success';
		return json_encode($response);
	}
}