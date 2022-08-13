<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    function index()
    {

        return view('posts.index', ['posts' => $posts = Post::with('user')->paginate(15)]);
    }

    function createe(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'body' => 'required|max:1000',
        ]);
        $id = Auth::id();
        $user = Auth::user();
        $dataa=$request->all();
        if($request->file('image')->isValid()){
            $dataa['image']=$request->file('image')->store('posts','images') ;
        }
        $data = ([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' => $id,
            'image'=>$request->file('image')->hashName(),
        ]);
        $post = new Post($data);
        $user->posts()->save($post);
        $post->save();
        if ($validated) {
            return redirect()->route('posts.index')->with('success', 'updated');
        }
    
    }
    function create()
    {
        return view('posts.create');
    }
    function show($id)
    {
        return view('posts.show', ['id' => $id]);
    }
    function store(StoreBlogPost $request)
    {
        $validatedData = $request->validated();
    }
    function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }
    function update(Request $request)
    {
        $post = Post::find($request->id);
        if (Auth::id() == $post->user->id) {
            $validated = $request->validate([
                'title' => 'required|max:100',
                'body' => 'required|max:1000',
            ]);
            $update = Post::find($request->id)->update([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
            ]);
            if ($validated) {

                return redirect()->route('posts.index')->with('success', 'updated');
            } 
        } else {

            return redirect()->route('posts.index')->with('error', 'error you can"t edit another user post');
        }
    }
    function destroy($id)
    {
        $post = Post::find($id)->delete();
        return $this->index();
    }
}
