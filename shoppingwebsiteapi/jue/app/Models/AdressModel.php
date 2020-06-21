<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdressModel extends Model{
	
	protected $table = 'shadress';
	protected $primarykey = 'id';
	protected $fillable = ['nc','shName','shCall','shAdress'];

	protected function getDateFormat(){
        return time();
    } 

}