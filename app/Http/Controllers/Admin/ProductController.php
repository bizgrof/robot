<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Alexusmai\Ruslug\Slug;
use Illuminate\Support\Facades\Validator;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $products = $products->orderBy('created_at', 'desc')->with(['category']);

        $count = $products->count();

        $products = $products->paginate(15);

        $categories = Category::all();


        return view('admin.product.index', compact('products','categories','filters','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.product.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            return redirect()->route('products.index')->with('success','Товар "'.$product->name.'" добавлен!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
