<?php

declare(strict_types=1);

namespace App\Actions\Fortify;

use App\Events\LoginEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class Authenticate
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user &&
            Hash::check($request->password, $user->password)) {

            $token = $user->createToken('my_app_token')->plainTextToken;

            ///events
            event(new LoginEvent($user));

            return [$user, $token];
        }
    }
}
