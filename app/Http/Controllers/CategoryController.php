<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('backend.category.index',compact('category'));
    }

    public function store(Request $request){
        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return back();
    }

    public function edit($id){
        $category = Category::find($id);
        return view('backend.category.edit',compact('category'));
    }
    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect('/category');
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return back();
    }
}
