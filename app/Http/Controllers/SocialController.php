<?php

namespace App\Http\Controllers;

use App\Services\Contracts\Social;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect(string $network)
    {
        return Socialite::driver($network)->redirect();
    }

    public function callback(string $network, Social $social)
    {
        return redirect($social->loginAndGetRedirectUrl(Socialite::driver($network)->user()));
    }
}
