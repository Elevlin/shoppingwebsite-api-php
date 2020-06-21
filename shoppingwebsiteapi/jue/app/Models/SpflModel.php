<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SplbModel extends Model{
    
    protected $table = 'spfl';
    protected $primarykey = 'id';
    protected $fillable = ['splb','ggy','sppic1','sppic2'];
    public $incrementing = false;

    protected function getDateFormat(){
        return time();
    } 

}
