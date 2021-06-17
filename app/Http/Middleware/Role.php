<?php

namespace App\Http\Middleware;

use App\Models\Patient;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request,  Closure $next, ...$roles)
    {
        // if user is not logged in, redierect user to login page
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        foreach ($roles as $role) {
            // Check if user has the role
            if ($user->user_type == $role) {
                $profilePath = 'patient/profile';
                if ($role == User::USER_TYPE_PATIENT) {

                    if ($request->route()->uri == $profilePath) {
                        return $next($request);
                    }

                    $patient = Patient::where("user_id", $user->id)->first();
                    if (!$patient) {
                        return redirect($profilePath);
                    } else {
                        return $next($request);
                    }
                } else {
                    return $next($request);
                }
            }
        }

        return redirect('login');
    }
}
