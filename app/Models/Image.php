<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    
    protected $table = 'images';
    
    //Relacion One to Many (De uno a varios)
    public function comments(){
        return $this->hasMany('App\Models\Comment')->orderBy('id', 'desc');
    }
    
    //Relacion One to Many (De uno a varios)
    public function likes(){
        return $this->hasMany('App\Models\Like');
    }
    
    //Relacion Many to One (De muchos a uno)
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
