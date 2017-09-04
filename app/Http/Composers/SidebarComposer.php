<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use App\Manufacturer;
use App\Material;
use App\Country;
use App\Product;

class SidebarComposer
{
    public function __construct()
    {

    }

    public function compose(View $view)
    {
        $prices = Product::selectRaw('min(price) as min_price, max(price) as max_price')->first();
        $ages = Product::selectRaw('min(age) as min_age, max(age) as max_age')->first();
        $manufacturers = Manufacturer::all();
        $materials = Material::all();
        $countries = Country::all();

        $view->with(compact('prices','ages','manufacturers','materials','countries'));
    }
}