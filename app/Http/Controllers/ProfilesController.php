<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ProfilesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($user)
    {
        
        //nesse fazemos a conversão de user em uma classe dentro do método
        $user = User::findOrFail($user); 

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
       // dd($user);
        //dd($follows);        
        
        $postCount = Cache::remember('count.posts'.$user->id, now()->addSeconds(5), function () use ($user){
            return $user->posts->count();
        });
        
        $followersCount = Cache::remember('count.followers'.$user->id, now()->addSeconds(5), function () use ($user){
            return $user->profile->followers()->count();
        });
        //$followersCount = $user->profile->followers()->count();
        //dd($followersCount);
        
        $followingCount = Cache::remember('count.following'.$user->id, now()->addSeconds(5), function () use ($user){
            return $user->following()->count();
        });
       // dd( $user->following());
        //$followingCount = $user->following()->count();
        //dd($followingCount);


        //aqui usamos uma forma de atribuir o valor $user a user
        return view('profiles.index', compact('user', 'follows', 'postCount','followersCount','followingCount'));

    }
    //nesse fazemos uma conversão na própria declaração. Não precisamos de usar o App\Models\User pois já importamos
    public function edit(User $user)
    {
        
        $this->authorize('update',$user->profile);
        //aqui usamos o compact para atribuir o valor direto

        return view('profiles.edit',[
            'user' => $user, 
        ]);
    }
    public function update(User $user)
    {
        $this->authorize('update',$user->profile);
            
        $data = request()->validate([
            'title' => 'required',
            'description'=>'required',
            'url' => 'url',
            'image' => '', 
        ]);

        if (request('image')){
            $imagePath= request('image')->store('profile','public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();

            $imageArray = ['image'=>$imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
