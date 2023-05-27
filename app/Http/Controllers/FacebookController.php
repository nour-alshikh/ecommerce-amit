<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function facebook_page()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebook_redirect()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            $findUser = User::where('social_id', $user->id)->first();
            if ($findUser) {
                Auth::login($findUser);
                return redirect('/home');
            } else {
                $newUser = User::Create([
                    'email' => $user->email,
                    'name' => $user->name,
                    'social_id' => $user->id,
                    'social_type' => 'facebook',
                    'password' => encrypt('123456dummy')
                ]);
                Auth::login($newUser);
                return redirect('home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    public function google_page()
    {
        return Socialite::driver('google')->redirect();
    }


    public function google_redirect()
    {
        try {
            $user = Socialite::driver('google')->user();

            $findUser = User::where('social_id', $user->id)->first();
            if ($findUser) {
                Auth::login($findUser);
                return redirect(route('profile'));
            } else {
                $newUser = User::Create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => 'google',
                    'password' => encrypt('123456dummy')
                ]);
                Auth::login($newUser);
                return redirect(route('profile'));
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
