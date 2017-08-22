<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alexusmai\Ruslug\Slug;
use App\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    protected $v = 'admin.category.';

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(30);
        return view($this->v.'index',compact('categories'));
    }

    public function create(Request $request)
    {
        return view($this->v.'create');
    }

    public function store(Request $request)
    {
        $inputs = $request->except('_token');
        if(!$inputs['alias']){
            $inputs['alias'] = Slug::make($inputs['name']);
        }
        $validator = Validator::make($inputs,[
            'name' => 'required',
            'alias' => 'required|unique:categories'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $category = new Category();
        $category->fill($inputs);

        if($category->save()){
            return redirect()->route('categories.index')->with('success','Категория "'.$category->name.'" добавлена!');
        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view($this->v.'edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->except('_token');
        if(!$inputs['alias']){
            $inputs['alias'] = Slug::make($inputs['name']);
        }
        $validator = Validator::make($inputs,[
            'name' => 'required',
            'alias' => "required|unique:categories,alias,$id",
        ]);
        if($validator->fails()){
            return redirect()
                ->route('category.edit',['id' => $id])
                ->withErrors($validator);
        }
        $category = Category::find($id);
        if($category->update($inputs)){
            return redirect()->route('categories.index')->with('success','Категория "'.$category->name.'" обновлена!');
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->delete()){
            return back()->with('success','Категория "'.$category->name.'" удалена!');
        }
    }
}
