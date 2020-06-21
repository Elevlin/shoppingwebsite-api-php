<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\SpmxModel;
use App\Submission;

class SpmxController extends Controller{

	// 商品页面详情

	public function getSPMX(Request $request){
		
		$response = array('status' => '400', 'msg' => 'failed','data' => '');
		$data = array();
		// 获取请求参数值
		$spmc = $request->input("spmc");
		//  根据参数值去向表里查找对应的数据
		// 方法一
		// $spmx =  DB::select('SELECT id,spmc,splb,size,dj,sl,(dj*yh) as spcxj,ygsl,pic FROM spmx'); 
		// 方法二
		$spmx =  DB::table('spmx')->select('spmc','splb','size','dj','sl','spxqjs')
								  ->get()
								  ->groupBy('splb');
		// 查找完毕之后，把查找到的数据赋值给response下的data字段
		$response['data'] = $spmx;
		$response['status'] = '200';
		$response['msg'] = 'success';
		return json_encode($response);
	}

	// 商品分类详情

	public function getSPFL(Request $request){
		
		$response = array('status' => '400', 'msg' => 'failed','data' => '');
		$data = array();
		// 获取请求参数值
		$spmc = $request->input("spmc");
		//  根据参数值去向表里查找对应的数据
		// 方法一
		// $spmx =  DB::select('SELECT spmc,splb,size,dj,sl,(dj*yh) as spcxj FROM spmx GROUP BY spmc'); 
		// 方法二
		$splb =  DB::table('spfl')->select('splb','ggy','sppic1','sppic2')->get();
		// 查找完毕之后，把查找到的数据赋值给response下的data字段
		$response['data'] = $splb;
		$response['status'] = '200';
		$response['msg'] = 'success';
		return json_encode($response);
	}

	//商品搜索
	public function search(Request $request){

		$response = array('status' => '400', 'msg' => 'failed','data' => '');
		$data = array();
		// 获取请求参数值
		//通过输入的参数在spmx.spmc/spmx.splb进行模糊搜索。
		$key = "%".$request->input("key")."%";
		// $splb = "%".$request->input("splb")."%";
		
		$search = DB::table('spmx') ->where( 'spmc','like',$key)->orWhere('splb','like',$key)->get();
		// 查找完毕之后，把查找到的数据赋值给response下的data字段
		$response['data'] = $search;
		$response['status'] = '200';
		$response['msg'] = 'success';
		return json_encode($response);
		
	}

}