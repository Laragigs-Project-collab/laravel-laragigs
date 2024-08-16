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
        auth()->login($user);

        return redirect('/')->with('success', "user registered and loged in");
    }
}
