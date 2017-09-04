<?php
namespace App\Helpers;
use Illuminate\Http\Request;

class ProductFilters
{
    protected $request = null;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function price($query){
        $price = explode('.',$this->request->input('price'));
        $query->whereBetween('price',$price);
    }
    protected function filters($query){
        $request = $this->request;
        if($request->has('search')){
            $search = $request->input('search');
            $query->where('name','LIKE',"%$search%");
        }
        if($request->has('colors')){
            $colors_id = explode('.',$request->input('colors'));
            $query->whereIn('color_id', $colors_id);
        }
        if( $request->has('price') ){
            $price = explode('.',$request->input('price'));
            $query->whereBetween('price',$price);
        }

        if($request->has('sizes')) {
            $sizes = explode('.', $request->input('sizes'));

            foreach ($sizes as $size) {
                list($min, $max) = explode('_', $size);
                $sizes['min'][] = $min;
                $sizes['max'][] = $max;
            }
            $products_id = Variant::whereIn('min_size', $sizes['min'])
                ->whereIn('max_size', $sizes['max'])
                ->pluck('product_id');

            $query->whereIn('id', $products_id);
        }


        return $query;
    }
}