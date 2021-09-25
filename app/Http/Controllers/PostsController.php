<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Post;

class PostsController extends Controller
{
    
    /**__construct()
     * Faz com que seja necessário estar autenticado para ter acesso à página
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        //$posts = Post::whereIn('user_id', $users)->latest()->get();
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(3);
        //dd($users);
        return view('posts.index', compact('posts'));
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
