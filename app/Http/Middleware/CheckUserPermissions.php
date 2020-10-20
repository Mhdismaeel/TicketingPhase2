<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use App\User;
class CheckUserPermissions extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

     public function handle($request, Closure $next, ...$guards)
     {
        if (Auth::check())
        {
            $userid=Auth::id();
            $user=User::FindOrfail($userid);

            if($user->role_id==1 || $user->role_id==2)
            {
                return $next($request);

           }

        }

       return response()->json(['error' => 'Not have Permissions'], 401);


     }


}
