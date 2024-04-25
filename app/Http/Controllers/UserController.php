<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    function login(){ // Get function of login

        if (Auth::check()){
            return redirect()->intended(route('home'));
        }

        return view('login');
    }

    function registration(){

        if (Auth::check()){
            return redirect()->intended(route('home'));
        }

        return view('registration');
    }

    function loginPost (Request $request){ // Request stores the data from the POST method

        

        $request->validate([          // The validate function show an error message if the data are invalid
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        
        $credential = $request->only('email','password');

        if(Auth::attempt($credential)) {               // Verify if the data are correct
            return redirect()->intended(route('home'))->with('success','Welcome');
        } else {
            return redirect()->intended(route('login'))->with('error','Login details are incorrect');

    }
}

    function registrationPost (Request $request){

      

        $request->validate([          // La funzione validate se non riceve dati da un errore
            'email'=> 'required|email|unique:users',
            'name' => 'required',
            'password'=> 'required'
        ]);

        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if ($user) {
            return redirect()->intended(route('registration'))->with('error', 'Error during registration');
        } 
        return redirect()->intended(route('login'));

    }

    function logout(){ 
        Session::flush();
        Auth::logout();
        return redirect()->intended(route('login'))->with('success','Logout success');
    }

   



}
