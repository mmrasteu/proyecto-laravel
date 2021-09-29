<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//use App\Models\Image;

Route::get('/', function () {
    /*
    $images = Image::all();
    foreach($images as $image){
        echo $image->image_path."<br/>";
        echo $image->description."<br/>";
        echo "Autor: ".$image->user->name.' '.$image->user->surname."<br/>";
        
        if(count($image->comments) >= 1)
        {
            echo "Comentarios: <br/>";
            foreach($image->comments as $comment){
                echo $image->user->name.' '.$image->user->surname.": ";
                echo $comment->content."<br/>";
            }
        }
        
        echo "Likes: ".count($image->likes);
        echo "<hr/>";
        
    }
    
    die();
    */
    
    
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/configuracion', [App\Http\Controllers\UserController::class, 'config'])->name('config');
Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('user/avatar/{filename}', [App\Http\Controllers\UserController::class, 'getImage'])
                                                                                    ->name('user.avatar');
Route::get('/subir-imagen', [App\Http\Controllers\ImageController::class, 'create'])->name('image.create');
Route::post('/image/save', [App\Http\Controllers\ImageController::class, 'save'])->name('image.save');
Route::get('image/file/{filename}', [App\Http\Controllers\ImageController::class, 'getImage'])
                                                                                    ->name('image.file');
Route::get('image/{id}', [App\Http\Controllers\ImageController::class, 'detail'])
                                                                                    ->name('image.detail');
Route::post('/comment/save', [App\Http\Controllers\CommentController::class, 'save'])->name('comment.save');
Route::get('comment/delete/{id}', [App\Http\Controllers\CommentController::class, 'delete'])
                                                                                    ->name('comment.delete');
Route::get('/like/{image_id}', [App\Http\Controllers\LikeController::class, 'like'])->name('like.save');
Route::get('/dislike/{image_id}', [App\Http\Controllers\LikeController::class, 'dislike'])->name('like.delete');