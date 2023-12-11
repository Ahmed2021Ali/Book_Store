<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function login($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function redirect($provider)
    {
        $socialite=   Socialite::driver($provider)->stateless()->user();
       // $socialite= Socialite::driver($provider)->user();
        $user=User::updateOrCreate([
            'provider' => $provider,
            'provider_id'=>$socialite->getId(),
        ],[
            'name' =>$socialite->getName(),
            'email'=>$socialite->getEmail(),
        ]);
        Auth::login($user,true);
        return to_route('homepage');
    }

}
