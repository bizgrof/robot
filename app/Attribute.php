<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public $timestamps = false;
    protected $fillable = ['value','sort','product_id','attribute_type_id'];

    public function attribute_type(){
        return $this->belongsTo('App\AttributeType');
    }

}
