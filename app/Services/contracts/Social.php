<?php

declare(strict_types=1);

namespace App\Services\contracts;

use Laravel\Socialite\Contracts\User;

interface Social
{
    public function loginAndGetRedirectUrl(User $socialUser): string;
}
