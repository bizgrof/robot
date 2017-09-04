<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function products(){
        return $this->hasMany('App\Product');
    }
}
