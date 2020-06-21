<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class GrzlModel extends Model{
    
    protected $table = 'grzl';
    protected $primarykey = 'id';
    protected $fillable = ['nc', 'username', 'realname','sex','txpic'];
    public $incrementing = false;

    protected function getDateFormat(){
        return time();
    } 

}
