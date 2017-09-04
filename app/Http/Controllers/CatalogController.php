<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;


class CatalogController extends Controller
{

    protected $products = null;
    protected $selected_filters = null;

    public function catalog(Request $request){

        $products = (new Product)->newQuery();

        $products->with(['country','manufacturer','material','images']);

        $this->filter($products, $request); // Фильтрация товаров
        $products = $this->products->get();
        $selected_filters = $this->selected_filters;

        return view('site.catalog', compact('products','prices','ages','manufacturers','materials','countries','selected_filters'));
    }

    public function category($alias, Request $request){

        $category = Category::where('alias',$alias)->first();

        $products = (new Product)->newQuery();
        $products = $category->products()->with(['country','manufacturer','material','images']);



        $this->filter($products, $request); // Фильтрация товаров
        $products = $this->products->get();
        $selected_filters = $this->selected_filters;

        return view('site.catalog', compact('category','products','prices','ages','manufacturers','materials','countries','selected_filters'));

    }

    public function filter($products,$request){
        $selected_filters = [];
        if($request->has('price')){
            $price_f = explode('.',$request->input('price'));
            $selected_filters['price'] = $price_f;
            $products->priceFilter($price_f);
        }
        if($request->has('ages')){
            $ages_f = explode('.',$request->input('ages'));
            $selected_filters['ages'] = $ages_f;
            $products->ageFilter($ages_f);
        }
        if($request->has('controls')){
            $controls_f = explode('.',$request->input('controls'));
            $selected_filters['controls'] = $controls_f;
            $products->controlFilter($controls_f);
        }
        if($request->has('manufacturers')){
            $manufacturers_f = explode('.',$request->input('manufacturers'));
            $selected_filters['manufacturers'] = $manufacturers_f;
            $products->manufacturerFilter($manufacturers_f);
        }
        if($request->has('materials')){
            $materials_f = explode('.',$request->input('materials'));
            $selected_filters['materials'] = $materials_f;
            $products->materialFilter($materials_f);

        }
        if($request->has('countries')){
            $countries_f = explode('.',$request->input('countries'));
            $selected_filters['countries'] = $countries_f;
            $products->countryFilter($countries_f);
        }
        if($request->has('sort')){
            $sort = $request->input('sort');
            $selected_filters['sort'] = $sort;

            if($sort == 'popular') $products->popularSortDESC();
            if($sort == 'price_desc') $products->priceSortDESC();
            if($sort == 'price_asc') $products->priceSortASC();
            if($sort == 'age_desc') $products->ageSortDESC();
            if($sort == 'age_asc') $products->ageSortASC();
        }

        $this->products = $products;
        $this->selected_filters = $selected_filters;
    }
}
