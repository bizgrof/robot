<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function products(){
        return $this->hasMany('App\Product');
    }
}
