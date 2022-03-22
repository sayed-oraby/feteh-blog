<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Permissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user->type != 'admin') {
            $roles = $user->roles;

            if ($roles) {
                $permissions = config('permissions');
                $route_name = $request->route()->getName();
                if (in_array($route_name, array_keys($permissions))) {
                    foreach ($roles as $role) {
                        foreach ($role->permissions as $key => $value) {
                            if ($key === $route_name) {
                                return $next($request);
                            }

                            $explodeKey = explode('.', $key);
                            if (in_array($explodeKey[1], ['create', 'edit'])) {
                                if ($explodeKey[0].'store' == $route_name or $explodeKey[0].'update' == $route_name){
                                    return $next($request);
                                }
                            }
                        }
                    }

                    return redirect()->route('dashboard')->with('error', 'You are not allowed to do this operation');
                }
            }
        }

        return $next($request);
    }
}
