<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('create');
    }

    public function insertData(Request $request){
        $post = new Post;
        $validation = $request->validate([
            'name'=> ['required'],
            'description'=> ['required'],
            'image'=> 'nullable | mimes:jpg,bmp,png,jpeg'
        ]);
        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $request->image;
        $post->save();
        return redirect()->route('home')->with("success", 'your post has been created successfully');
    }
}
