<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\User;

Route::get('/', function () {
    if(Auth::user()) {
    $posts = Post::all();
    return view('home', ['posts' => $posts]); 
} else return view('login');
})->name('home');


Route::get('/login', [UserController::class, 'login'])->name('login');

Route::post('/login', [UserController::class, 'loginPost'])->name('login.post');

Route::get('/registration', [UserController::class, 'registration'])->name('registration');

Route::post('/registration', [UserController::class, 'registrationPost'])->name('registration.post');

Route::get( '/logout', [UserController::class,'logout'])->name('logout');

// BLOG POST

Route::post('/create-post', [PostController::class, 'createPost'])->name('createPost');

Route::get('/post/{post}', [PostController::class, 'showPost'])->name('showP');

Route::get('/update-post/{post}', [PostController::class, 'showUpdate'])->middleware('postConfig');


Route::post('/update-post/{post}', [PostController::class, 'updatePost'])->name('updateP')->middleware('postConfig'); // Inside the controller you will get the updatePost function

Route::delete('/delete-post/{post}', [PostController::class,'deletePost'])->name('deleteP');
 
