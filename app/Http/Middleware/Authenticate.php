<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (str_contains($request->getRequestUri(), 'admin'))
            return $request->expectsJson() ? null : route('admin.signin');
        return $request->expectsJson() ? null : route('signin');
    }
}
