<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Image extends Model
{
    protected $fillable = ['src', 'sort', 'product_id', 'name'];
    public $timestamps = false;

    protected static function boot(){
        parent::boot();

        static::addGlobalScope('sort', function (Builder $builder) {
            $builder->orderBy('sort');
        });
    }
}
