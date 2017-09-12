<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeType extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function attributes(){
        return $this->hasMany('App\Attribute');
    }

}
