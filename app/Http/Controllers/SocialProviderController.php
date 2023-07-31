<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\contracts\Social;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;

class SocialProviderController extends Controller
{
    public function redirect(string $driver):SymfonyRedirectResponse |RedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, Social $social):mixed
    {

        return redirect(
            $social->loginAndGetRedirectUrl(Socialite::driver($driver)->stateless()->user())
        );
    }
}
