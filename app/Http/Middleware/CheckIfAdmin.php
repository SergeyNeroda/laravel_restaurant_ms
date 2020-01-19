<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Cache;
use Carbon\Carbon;
//use Illuminate\Support\Facades\Auth;

class CheckIfAdmin
{
     public function handle($request, Closure $next)
     {
    //     if (Auth::check() && Auth::user()->isAdmin()) {
    //         return $next($request);
    //     }
    //
    //     return redirect('admin/login');

    $user = $request->user();

        if (!isset($user)) {
            return redirect('/login');
        }

        if (!$user->isAdmin()) {
            return redirect('/');
        }

        //якщо користувач онлайн
        if (Auth::check()) {
          $expiresAt = Carbon::now()->addMinutes(1);
          Cache::put('user-is-online-'.Auth::user()->id,true,$expiresAt);
        }

        return $next($request);
       }
}
