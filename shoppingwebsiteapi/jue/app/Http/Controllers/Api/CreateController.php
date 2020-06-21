<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

/**
 * 
 */
class CreateController extends Controller
{
	use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
	

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function zc(Request $request)
    {	
    	$response = array('status' => '400', 'msg' => 'failed','data' => '');
		$data = array();
        $username = $request->input('username');
        $email = $request->input('email');
        $callnum = $request->input('callnum');
        $password = $request->input('password');

        $data = User::create([
                'username' => $username,
                'email' => $email,
                'callnum' => $callnum,
                'password' => md5($password),
        ]);
        $response['data'] = $data;
        $response['status'] = '200';
        $response['msg'] = 'success';
        return json_encode($response);
            
        
        
    }
}