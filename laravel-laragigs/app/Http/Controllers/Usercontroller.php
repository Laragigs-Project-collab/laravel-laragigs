<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use function Laravel\Prompts\password;

class Usercontroller extends Controller
{
    //show register
    public function register(){
        return view('users.register');
    }

    public function store(Request $request){
        $formValidation = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email', Rule::unique('users','email'),
            'password' => 'required|confirmed'
        ]);

        $formValidation['password'] = bcrypt($formValidation['password']);

        $user = User::create($formValidation);
        //login
        Auth::login($user);

        return redirect('/')->with('success', "User registered and Logged in");

    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'You have been logged out.');
    }
    public function login() {
        return view("users.login");
    }
    public function authenticate(Request $request){
        $formValidation = $request->validate([
            'email' => 'required', 'email',
            'password' => 'required'
        ]);
        if (Auth::attempt($formValidation)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'You are now logged in.');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
