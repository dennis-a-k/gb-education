<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function loginFb(){
        if(Auth::id()){
            return redirect()->back();
        }
        return Socialite::with('facebook')->redirect();
    }

    public function responseFb(UserRepository $repository){
        $ownUser = $repository->getBySocialId(Socialite::driver('facebook')->user(), 'fb');

        Auth::login($ownUser);
        return redirect()->route('home');
    }

    public function loginVk(){
        if(Auth::id()){
            return redirect()->back();
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVk(UserRepository $repository){
        $ownUser = $repository->getBySocialId(Socialite::driver('vkontakte')->user(), 'vk');

        Auth::login($ownUser);
        return redirect()->route('home');
    }
}
