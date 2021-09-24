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
        return ($this->image) ? "/storage/".$this->image : "http://127.0.0.1:8000/storage/profile/fUZqj6kxqCXukS2rCkVPOQUFoVEMxkRgIMUhYm4e.png";
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
