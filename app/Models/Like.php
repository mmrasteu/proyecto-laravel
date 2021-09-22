<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    
    protected $table = 'likes';
    
    //Relacion Many to One (De muchos a uno)
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    
    //Relacion Many to One (De muchos a uno)
    public function image(){
        return $this->belongsTo('App\Models\Image', 'image_id');
    }
}
