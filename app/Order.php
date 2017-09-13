<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Order extends Model
{
    protected $fillable = ['firstname','lastname','middlename','phone','city','email','address','total_cost','total_qty','comment','gift_wrap','order_status_id','pay_type'];

    protected static function boot(){
        parent::boot();

        static::addGlobalScope('sort_order', function (Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function status(){
        return $this->belongsTo('App\OrderStatus','order_status_id');
    }

    public function products(){
        return $this->hasMany('App\OrderProduct');
    }

    public function getTotalCostAttribute($value){ // Сумма заказа
        return price($value);
    }
    public function getGiftWrapAttribute($value){ // Подарочная упаковка
        return ((bool)$value) ? 'Да' : 'Нет';
    }
}
