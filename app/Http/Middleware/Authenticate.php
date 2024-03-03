<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    
    public function handle($request, Closure $next, ...$guards)
    {
        if (auth()->check()) {
            session()->put('activity_time', now()->toDateTimeString());
        }
        return parent::handle($request, $next, ...$guards);
    }

 
    protected function redirectTo(Request $request): ?string
    {
       
        if ($request->expectsJson()) {
            
            return null;
        }

        return route('root');
    }

}
