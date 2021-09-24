<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        //aqui usamos uma forma de atribuir o valor $user a user
        return view('profiles.index',[
            'user' => $user,
        ]);
    }
    //nesse fazemos uma conversão na própria declaração. Não precisamos de usar o App\Models\User pois já importamos
    public function edit(User $user)
    {
        
        $this->authorize('update',$user->profile);
        //aqui usamos o compact para atribuir o valor direto
        return view('profiles.edit', compact('user'));
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
