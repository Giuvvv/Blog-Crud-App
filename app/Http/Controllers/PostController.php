<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PostController extends Controller
{

    function showPost(Post $post) {


        return view('post', ['post'=> $post]);
    }

    function showUpdate(Post $post) {
        return view('update-post', ['post'=> $post]);
    }

    function updatePost(Request $request, Post $post) {

        if (auth()->user()->id !== $post->user_id) {  // Verify if the logged user is who made the post

            return redirect()->route('home');  }
            

        $post = Post::find($post['id']);    // This instructions save the new data edited
        $title = $request->title;
        $body = $request->body;
       

       
        $post->title =$title;
        $post->body=$body;
        

        $post ->save();

        return redirect()->route('showP', ['post' => $post]); 

    }

    function deletePost(Post $post) {

        if (auth()->user()->id === $post->user_id) {

            $post->delete();  }

            

            return redirect()->route('home');

    }
    
function createPost(Request $request)
 {
    $data = $request->validate([
        'title'=> 'required',
        'body' => 'required'
    ]);

        $data['title'] = $request->title;
        $data['body'] = $request->body;
        $data['user_id'] = auth('')->id();

        $user = User::where('id', $data['user_id'])->first();  // $user takes all the data of the user logged in

        $data['user_name'] = $user->name;  // user_name will store the username of User

    

   $post = Post::create($data);

   if ($post) {
    return redirect()->intended(route('home'))->with('error', 'Error during the process');
} 
return redirect()->intended(route('home'));

 }
 

}
