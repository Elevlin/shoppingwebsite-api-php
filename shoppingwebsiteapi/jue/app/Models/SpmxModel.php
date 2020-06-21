<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SpmxModel extends Model{
    
    protected $table = 'spmx';
    protected $primarykey = 'id';
    protected $fillable = ['spmc', 'spbm', 'splb','spxqjs','dj','sl','size','color','gmsl','yh','ygsl','pic'];
    public $incrementing = false;

    protected function getDateFormat(){
        return time();
    } 

}
