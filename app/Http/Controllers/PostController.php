<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    function index(){
        return view('posts.index', ['posts'=>$posts=Post::paginate(15)]);
    }

    function createe(Request $request){
        $post=Post::create([
            'title'=>$request->input('title'),
            'body'=>$request->input('body'),
        ]);
        return $this->index() ;
        
    }
    function create(){
        return view('posts.create') ;
        
    }
    function show($id){
        return view('posts.show' , ['id' => $id]) ;
        
    }
    function store(Request $request){
        return "store works!!" ;
        
    }
    function edit($id){
        $post=Post::find($id);
        return view('posts.edit', ['post' => $post]) ;
    
    }
    function update(Request $request){
        $update=Post::find($request->id)->update([
            'title'=>$request->input('title'),
            'body'=>$request->input('body'),
        ]);
        return $this->index();
        
    }
    function destroy($id){
        $post=Post::find($id)->delete();
        return $this->index();

    }
}
