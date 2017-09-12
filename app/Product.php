<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Product extends Model
{
    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }

    public function manufacturer(){
        return $this->belongsTo('App\Manufacturer');
    }

    public function material(){
        return $this->belongsTo('App\Material');
    }

    public function attributes(){
        return $this->hasMany('App\Attribute');
    }

    public function images(){
        return $this->hasMany('App\Image');
    }

    public function getPrice(){
        return number_format($this->price,0,'',' ');
    }

    public function getWeightAttribute($weight){
        return number_format($weight,0,'',' ');
    }

    public function getControlAttribute($control){
        return $control ? 'Управляемый' : 'Не управляемый' ;
    }

    protected static function boot(){
        parent::boot();

        static::addGlobalScope('published', function (Builder $builder) {
            $builder->where('published', 1);
        });

    }

    //Price filter
    public function scopePriceFilter($query, $price){
        return $query->whereBetween('price',$price);
    }

    //Age filter
    public function scopeAgeFilter($query, $age){
        return $query->whereBetween('age',$age);
    }

    //Manufacturer filter
    public function scopeManufacturerFilter($query, $manufacturer){
        return $query->whereIn('manufacturer_id',$manufacturer);
    }

    // Control filter
    public function scopeControlFilter($query, $controls){
        return $query->whereIn('control',$controls);
    }

    // Material filter
    public function scopeMaterialFilter($query, $material){
        return $query->whereIn('material_id',$material);
    }

    // Country filter
    public function scopeCountryFilter($query, $country){
        return $query->whereIn('country_id',$country);
    }

    // Sort price asc по возроствнию
    public function scopePriceSortASC($query){
        return $query->orderBy('price', 'ASC');
    }

    // Sort price desc по убыванию
    public function scopePriceSortDESC($query){
        return $query->orderBy('price','DESC');
    }

    // Sort age desc по убыванию
    public function scopeAgeSortDESC($query){
        return $query->orderBy('age','DESC');
    }

    // Sort price asc по возроствнию
    public function scopeAgeSortASC($query){
        return $query->orderBy('age', 'ASC');
    }

    // Sort price asc по возроствнию
    public function scopePopularSortDESC($query){
        return $query->orderBy('sales', 'DESC');
    }

    public function saveImages($src,$img_name){

        // Extra large
        Image::make(public_path($src))->resize(490, 540,function ($constraint) {
            $constraint->aspectRatio();
        })->resizeCanvas(490,540,'center', false,'ffffff')->save(public_path('p_thumbs/extra_large/'.$img_name));

        // Large
        Image::make(public_path($src))->resize(255, 250,function ($constraint) {
            $constraint->aspectRatio();
        })->resizeCanvas(255,250,'center', false,'ffffff')->save(public_path('p_thumbs/large/'.$img_name));

        // Medium
        Image::make(public_path($src))->resize(160, 105,function ($constraint) {
            $constraint->aspectRatio();
        })->resizeCanvas(160,105,'center', false,'ffffff')->save(public_path('p_thumbs/medium/'.$img_name));

        // Small
//        Image::make(public_path($src))->resize(70,100, function ($constraint) {
//            $constraint->aspectRatio();
//        })->resizeCanvas(70,100,'center', false,'ffffff')->save(public_path('p_thumbs/small/'.$img_name));
    }

    public function deleteImage($image_name){
        File::Delete(public_path('p_thumbs/extra_large/'.$image_name));
        File::Delete(public_path('p_thumbs/large/'.$image_name));
        File::Delete(public_path('p_thumbs/medium/'.$image_name));
        //File::Delete(public_path('p_thumbs/small/'.$image_name));
    }
}
