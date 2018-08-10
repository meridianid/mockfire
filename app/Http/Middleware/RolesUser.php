<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RolesUser
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
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'Administrator') {
                // return redirect('admin/dashboard');
            } elseif ($user->role == 'User') {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
