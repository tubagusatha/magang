<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login() {
           return view('login');
    }
    public function authenticate(Request $request) {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect('index');
        }else {
            return redirect('/')->with('error_messege', 'wrong email or password');
        }
    }

    
public function logout() {
    Session::flush();
    Auth::logout();
    

    return view('login');
}

public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $user = Socialite::driver('google')->user();
        $avatar = $user->getAvatar();

        $user = \App\Models\User::where('email', '=', $user->email)->first();

        if ($user) {
            Auth::login($user);
            return view('welcome', [
                'user' => $user,
                'avatar' => $avatar,
            ]);
        } else {
            return view('welcome', [
                'user' => null
            ]);
        }
    }


}
