<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $post = Post::all();
        return view('backend.post.index',compact('post'));
    }

    public function create(){
        $category = Category::all();
        $tag = Tag::all();
        return view('backend.post.create',compact('category','tag'));
    }
    public function store(Request $request){
        $post = new Post();
        $post->title = $request->title;
        $post->slug = str::slug($post->title);
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        if($request->hasFile('image')){
            $request->file('image')->move('images/',$request->file('image')->getClientOriginalName());
            $post->image = $request->file('image')->getClientOriginalName();
            $post->save();
        }
        $post->save();

         
        $post->tag()->attach($request->tag);

        return back();
    }
    public function edit($id){
        $post = Post::find($id);
        $category = Category::all();
        $tag = Tag::all();
        return view('backend.post.edit',compact('post','tag','category'));
    }
    public function update(Request $request, $id){
       
        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = str::slug($post->title);
        $post->content = $request->content;
        if($request->hasFile('image')){
            $request->file('image')->move('images/',$request->file('image')->getClientOriginalName());
            $post->image = $request->file('image')->getClientOriginalName();
            $post->save();
        }
        
        $post->tag()->sync($request->tag);
        $post->save();
        

        return redirect('/post');
    }

    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        return back();
    }

    public function trash(){
        $post = Post::onlyTrashed()->get();
        return view('backend.post.trash',compact('post'));
    }

    public function restore($id){
        $post = Post::withTrashed()->find($id);
        $post->restore();
        return back();
    }

    public function destroy($id){
        $post = Post::withTrashed()->find($id);
        $post->forceDelete();
        return back();
    }
}
