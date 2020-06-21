<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

Class GwcModel extends Model{

	protected $table = 'gwc';
	protected $primarykey = 'id';
	protected $fillable = ['user','dpmc','sppic','spmc','color','size','dj','sl','zje'];

	protected function getDateFormat(){
        return time();
    } 

}