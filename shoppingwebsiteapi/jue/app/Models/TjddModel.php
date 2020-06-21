<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TjddModel extends Model{
	
	protected $table = 'tjdd';
	protected $primarykey = 'id';
	protected $fillable = ['ddh','nc','mjtips','psfs','zje','jyrq'];

	protected function getDateFormat(){
        return time();
    } 


    public static function searchDd($ddInfo){

    	$ddmx =  DB::table('tjdd')->where('nc',$ddInfo['nc'])->get(); 
		// 查找完毕之后，把查找到的数据赋值给response下的data字段

		if(!$ddmx){
			$array['status']='400';
			$array['msg'] = '订单不存在';
		}else{
			
				$array['status'] = '200';
				$array['msg'] = 'success';
				$array['data'] = $ddmx;
			}
		return $array;
		
    }
}