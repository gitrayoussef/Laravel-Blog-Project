<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function redirectGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callbackGithub()
    {
        $githubUser = Socialite::driver('github')->user();
        $user = User::where('github_id', $githubUser->id)->first();
        if (!$user) {
            $findUser = User::where('email', $githubUser->email)->first();
            if ($findUser) {
                $id = $githubUser->id;
                $email = $githubUser->email;
                $name = $githubUser->nickname;
                $findUser->github_id = $id;
                $findUser->github_email = $email;
                $findUser->name = $name;
                $findUser->save();
            } else {
                $user = User::create([
                    'github_id' => $githubUser->id,
                    'name' => $githubUser->nickname,
                    'email' => $githubUser->email
                ]);
            }
            Auth::login($user);
            return redirect('/home');
        } else {

            Auth::login($user);
            return redirect('/home');
        }
    }

    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('google_id', $googleUser->id)->first();
        if (!$user) {
            $user = User::create([
                'google_id' => $googleUser->id,
                'name' => $googleUser->name,
                'email' => $googleUser->email,
            ]);
            Auth::login($user);
            return redirect('/home');
        } else {
            Auth::login($user);
            return redirect('/home');
        }
    }
}
