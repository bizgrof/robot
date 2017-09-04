<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Alexusmai\Ruslug\Slug;
use Illuminate\Support\Facades\Validator;
use App\Category;
use App\Country;
use App\Manufacturer;
use App\Material;
use App\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {

        $products = Product::query();

        $filters = $request->all();

        if($request->has('name')){
            $products->where('id',$request->input('name'));
        }

        if($request->has('articul')){
            $products->where('pgroup_id',$request->input('articul'));
        }

        if($request->has('category')){
            $products->where('category_id',$request->input('category'));
        }

        if($request->has('published')){
            $products->where('published',$request->input('published'));
        }

        $products = $products->orderBy('created_at', 'desc')->with(['category','images' => function($query){
            $query->orderBy('sort');
        }]);

        $count = $products->count();

        $products = $products->paginate(15);

        $categories = Category::all()->pluck('name','id');


        return view('admin.product.index', compact('products','categories','filters','count'));
    }

    public function create()
    {
        $categories = Category::all()->pluck('name','id');
        $countries = Country::all()->pluck('name','id');
        $manufacturers = Manufacturer::all()->pluck('name','id');
        $materials = Material::all()->pluck('name','id');

        return view('admin.product.create',compact('categories','countries','manufacturers','materials'));

    }

    public function store(Request $request)
    {
        $inputs = $request->except('_token','product_image');

        if(!$inputs['alias']){
            $inputs['alias'] = Slug::make($inputs['name']);
        }
        $rules = [
            'name' => 'required',
            'alias' => 'required|unique:products'
        ];

        $validator = Validator::make( $inputs,$rules);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $product = new Product();
        $product->fill($inputs);

        if($product->save()){
            $images = $request->input('product_image');
            foreach($images as $image){
                if(!empty($image['src'])){
                    $img_extension = pathinfo($image['src'],PATHINFO_EXTENSION );
                    $img_name =  str_random(30).'.'.$img_extension;
                    $product->saveImages($image['src'], $img_name);// Сохранение картинок
                    $image['name'] = $img_name;
                    $product->images()->create($image);
                }
            }

            return redirect()->route('products.index')->with('success','Товар "'.$product->name.'" добавлен!');
        }
    }


    public function show($id){}

    public function edit($id){
        $product = Product::with('images')->find($id);

        $categories = Category::all()->pluck('name','id');
        $countries = Country::all()->pluck('name','id');
        $manufacturers = Manufacturer::all()->pluck('name','id');
        $materials = Material::all()->pluck('name','id');

        return view('admin.product.edit',compact('product','categories','countries','manufacturers','materials'));
    }

    public function update(Request $request, $id){
        $inputs = $request->except('_token','product_image');
        if(!$inputs['alias']){
            $inputs['alias'] = Slug::make($inputs['name'].'_'.$inputs['articul'].'_'.$inputs['color_id']);
        }
        $validator = Validator::make($inputs,[
            'name' => 'required',
            'alias' => "required|unique:products,alias,$id"
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $product = Product::find($id);


        if($product->update($inputs)){

            $product_images = $product->images;
            $images = (array)$request->input('product_image');

            // отсеить ячейки где не заданы картинки и state равная old
            $images = array_filter( $images, function($image){
                return (isset($image['src']) && $image['state'] == 'new');
            });



            foreach($images as $image){
                // Обновление картинки
                if(isset($image['id'])){
                    // Обновить src записи чтоб в админке показвалась оновленная картинка
                    $product_image = $product_images->find($image['id']);
                    $product_image->src = $image['src'];
                    $product_image->sort = $image['sort'];
                    $product_image->save();

                    // Замена картинки
                    $product->saveImages($image['src'], $image['name']);
                } else {
                    $img_extension = pathinfo($image['src'],PATHINFO_EXTENSION );
                    $img_name =  str_random(30).'.'.$img_extension;
                    $image['name'] = $img_name;
                    $product->images()->create($image);

                    $product->saveImages($image['src'], $image['name']);
                }
            }

            return redirect()->route('products.index')->with('success','Товар "'.$product->name.'" обновлен!');
        }
    }

    public function destroy($id){
        $product = Product::find($id);
        $images = $product->images;
        if($product->delete()){
            foreach($images as $image){
                $product->deleteImage($image->name);
            }
            return back()->with('success','Товар "'.$product->name.'" удален!');
        }
    }

    public function deleteImaga(Request $request, Product $product){

        $image = Image::find($request->input('id'));
        if($image->delete()){
            $product->deleteImage($image->name);
        }
    }
}
