<?php

namespace App\Repositories;

use App\Contracts\AuthInterface;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthRepository implements AuthInterface {

    public function login($credentials): bool {

        if (Auth::attempt($credentials)) {

            $user = auth()->user();
            session()->put('user_id', $user->id);
            session()->put('activity_time', now()->toDateTimeString());

            session()->regenerate();
            return true;
        }

        return false;
    }

}
