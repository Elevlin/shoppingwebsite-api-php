<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Config\Session;

class UserModel extends Model{
    
	use Notifiable;

    protected $table = 'users';
    protected $primarykey = 'id';
    protected $fillable = ['username', 'email', 'password','callnum'];
    public $incrementing = false;
    protected $hidden = ['password'];

    protected function getDateFormat(){
        return time();
    } 

    public static function userLogin($userInfo){
    	$user =  DB::table('users')->where('username',$userInfo['username'])->first(); 
		// 查找完毕之后，把查找到的数据赋值给response下的data字段

		if(!$user){
			$array['status']='400';
			$array['msg'] = '该用户不存在';
		}
		if (empty($userInfo['username'])||empty($userInfo['password'])) {
			$array['status']='400';
			$array['msg'] = '用户名或密码不得为空';
		}else{
			if(md5($userInfo['password']) != md5($user->password)){
				$array['status']='400';
				$array['msg'] = '密码错误';
			}else{
				$array['status'] = '200';
				$array['msg'] = 'success';
				$array['data'] = $user;
			}
		return $array;
		}
    }

}
