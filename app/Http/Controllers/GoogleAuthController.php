<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Psy\Util\Str;
class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();

    }

    public function callbackGoogle()
    {
       // Redirect back from google auth

       $user = Socialite::driver('google')->user();
       
       $user = User::firstOrCreate([

        'email'=> $user->email

       ],
       [
        'name'=> $user->name,
        'type'=> "customer",
        'Oauth'=> $user->id,
        'password'=> Hash::make($user->id),
    
       ]);
        Auth::login($user , true);
        return redirect('/home');
    }
}
