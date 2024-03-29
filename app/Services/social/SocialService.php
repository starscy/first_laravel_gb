<?php

declare(strict_types=1);

namespace App\Services\social;

use App\Models\User;
use App\Services\contracts\Social;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;

class  SocialService implements Social
{
    public function loginAndGetRedirectUrl(SocialUser $socialUser): string
    {
        $user = User::query()->where('email', '=', $socialUser->getEmail())->first();

        if (!$user) {
            return route('register');
        }

//        $user->name = $socialUser->getName();
//        $user->image = $socialUser->getAvatar();
        //$user->login = $socialUser->getNickname();

        if ($user->save()) {
            Auth::login($user);
            return route('account.index');
        }

        throw new \Exception('Did not save user');
    }
}
