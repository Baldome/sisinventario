<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AuthController extends BaseController
{
    use AuthorizesRequests;

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $date = Carbon::now();
        $googleUser = Socialite::driver('google')->user();
        //dd($googleUser);

        $user = User::updateOrCreate([
            'google_id' => $googleUser->id,
        ], [
            'name' => $googleUser->name,
            'username' => $googleUser->userName,
            'email' => $googleUser->email,
            'email_verified_at' => $date,
            'google_id' => $googleUser->id,
            'google_token' => $googleUser->token,
        ]);

        Auth::login($user);

        return view('admin.index');
    }
}
