<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    //sobrescrevemos o guarded para deixar todos campos do profile editáveis
    protected $guarded = [];

    public function profileImage(){
        return ($this->image) ? "/storage/".$this->image : '/storage/Perfil.png';
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function followers(){
        return $this->belongsToMany(User::class);
    }


}
