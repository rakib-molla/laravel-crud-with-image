<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){
        $posts = Post::paginate(5);
        return view('home', ['posts' => $posts]);
    }

    public function create(){
        return view('create');
    }

    public function insertData(Request $request){
        $post = new Post;

        // validation 
        $validation = $request->validate([
            'name'=> ['required'],
            'description'=> ['required'],
            'image'=> 'nullable | mimes:jpg,bmp,png,jpeg'
        ]);

        // upload image
        $imageName = null;
        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        
        // add new post
        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $imageName;
        $post->save();
        return redirect()->route('home')->with("success", 'your post has been created successfully');
    }

    public function editData($id){
        $post = Post::findOrFail($id);

        return view('edit',['post'=> $post]);
    }

    public function updateData($id, Request $request){

        // validation 
        $validation = $request->validate([
            'name'=> ['required'],
            'description'=> ['required'],
            'image'=> 'nullable | mimes:jpg,bmp,png,jpeg'
        ]);

        
        
        // update new post
        $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->description = $request->description;

        // upload image
        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }
        $post->save();
        
        return redirect()->route('home')->with('success','Post has been updated');
    }

    public function deleteData($id){

        $post = Post::findOrFail($id);

        $post->delete();
        
        flash()->warning('Your post has been deleted');
        return redirect()->route('home');

    }

}
