<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table name
    protected $table='posts';
    //you can change primery key here also As
   // public $primaryKey='User_id'

    //and also time stamps
    //bydefault are true but you can make them false here

   // protected $timestemps=faalse


    //to create relationships

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
