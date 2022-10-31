<?php


namespace App\Services;


use App\Models\User;
use App\Services\Contracts\Social;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;

class SocialService implements Social
{

    public function loginAndGetRedirectUrl(SocialUser $socialUser)
    {
        $user = User::query()->where('email', '=', $socialUser->getEmail())->first();
        if (!$user) {
            return '/register';
        }

        $user->name = $socialUser->getNickname();

        if ($user->save()) {
            Auth::loginUsingId($user->id);
            return '/';
        }
    }
}
