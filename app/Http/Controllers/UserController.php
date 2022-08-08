<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index(){
        return view('users.index', ['users'=>$users=User::paginate(15)]);
    }

    function createe(Request $request){
        $user=User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
        ]);
        return $this->index() ;
        
    }
    function create(){
        return view('users.create') ;
        
    }
    function show($id){
        return view('users.show' , ['id' => $id]) ;
        
    }
    function store(Request $request){
        return "store works!!" ;
        
    }
    function edit($id){
        $user=User::find($id);
        return view('users.edit', ['user' => $user]) ;
    
    }
    function update(Request $request){
        $update=User::find($request->id)->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
        ]);
        return $this->index();
        
    }
    function destroy($id){
        $user=User::find($id)->delete();
        return $this->index();

    }
}
