<?php

namespace Simpeg\Http\Middleware;

use Auth;
use Closure;
use Caffeinated\Shinobi\Models\Role;
use Simpeg\Model\RoleUser;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        $user = Auth::user()->id;
        $roleUser = RoleUser::where('user_id', $user)->first();
        $role = Role::find($roleUser->role_id);
        if (!$role->can($roles)) {
            return \Redirect::route('home')->send();
        }

        return $next($request);
    }
}
