<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PostCreator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
          return redirect('users/login');
        } else {
          if (Auth::user()->hasRole('Post Writer') || Auth::user()->hasRole('Manager')) {
              return $next($request);
          } else {
            return redirect('/');
          }
        }
        return $next($request);
    }
}
