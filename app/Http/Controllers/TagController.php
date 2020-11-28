<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        $tag = Tag::all();
        return view('backend.tag.index',compact('tag'));
    }

    public function store(Request $request){
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->save();

        return back();
    }

    public function edit($id){
        $tag = Tag::find($id);
        return view('backend.tag.edit',compact('tag'));
    }
    public function update(Request $request, $id){
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->save();

        return redirect('/tag');
    }

    public function delete($id){
        $tag = Tag::find($id);
        $tag->delete();
        return back();
    }
}
