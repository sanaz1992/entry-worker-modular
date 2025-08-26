<?php

namespace Modules\Jetstream\Actions;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\Request;

class RedirectAfterLogin implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = auth()->user();

        if ($user->level === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->level === 'saller') {
            return redirect()->route('saller.dashboard');
        }

        return redirect()->route('home');
    }
}
