<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    
    /**__construct()
     * Faz com que seja necessário estar autenticado para ter acesso à página
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(\App\Models\Post $post)
    {
        //dd($post);
        return view('posts.show',compact('post'));
    }
    

    public function  store(){
        $data = request()->validate([
            'caption'=>'required',
            'image'=>'required|image',
            //'image'=>['required','image'],
        ]);
        
        $imagePath= request('image')->store('uploads','public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption'=>$data['caption'],
            'image'=>$imagePath,

        ]);
        
        return redirect('/profile/'.auth()->user()->id);
    }
}
