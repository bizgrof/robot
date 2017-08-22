<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','alias','description','meta_title','meta_description','meta_keywords','sort','published','thumbnail'];

    public function products(){
        return $this->hasMany('App\Product');
    }
}
