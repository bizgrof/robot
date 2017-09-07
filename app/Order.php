<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['firstname','lastname','middlename','phone','city','email','address','total_cost','total_qty','comment','gift_wrap','order_status_id','pay_type'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function status(){
        return $this->belongsTo('App\OrderStatus','order_status_id');
    }

    public function orderProducts(){
        return $this->hasMany('App\OrderProduct');
    }
}
