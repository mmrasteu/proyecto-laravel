<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function like($image_id){
        //Recoger datos de usuario y la imagen
        $user = \Auth::user();
        
        // Condicion para ver si ya existe el like y no duplicarlo
        $isset_like = Like::where('user_id', $user->id)
                            ->where('image_id', $image_id)
                            ->count();
        
        if($isset_like == 0){
            $like = new Like();
            $like->user_id = $user->id;
            $like->image_id = (int)$image_id;

            // Guardar 
            $like->save();
            
            $numberlikes = Like::where('image_id', $image_id)->count();
            
            return response()->json([
                'like' => $like, 
                'numberlikes' => $numberlikes
            ]);
        }else{
            return response()->json([
                'message' => 'El like ya existe', 
                'numberlikes' => $numberlikes
            ]);
        }
        
        
    }
    
    public function dislike($image_id){
        //Recoger datos de usuario y la imagen
        $user = \Auth::user();
        
        // Condicion para ver si ya existe el like y no duplicarlo
        $like = Like::where('user_id', $user->id)
                            ->where('image_id', $image_id)
                            ->first();
        
        if($like){
            // Eliminar like 
            $like->delete();
            
            $numberlikes = Like::where('image_id', $image_id)->count();
            
            return response()->json([
                'like' => $like,
                'message' => 'Has dado dislike correctamente', 
                'numberlikes' => $numberlikes
            ]);
        }else{
            return response()->json([
                'message' => 'El like no existe', 
                'numberlikes' => $numberlikes
            ]);
        }
    }
    
    public function likes(){
        $likes :: Like::orderBy('id', 'desc')->simplePaginate(5);
        
        return view('likes.likes', [
            'likes' => $likes;
        ]);
    }
}
