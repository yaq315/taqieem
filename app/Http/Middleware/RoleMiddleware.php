<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */    public function handle(Request $request, Closure $next, $role): Response
    {

    // return response('Unauthorized - Role not recognized', 403);}
    if (!Auth::check()) {
        return response('Unauthorized - You are not logged in', 401);
    }

    $userRole = Auth::user()->role; 

    
    $currentRoute = $request->path();

    if ($userRole === 'user' && $currentRoute !== 'welcome') {
        return redirect('/');
    }

    if (($userRole === 'admin' || $userRole === 'super_admin') && $currentRoute !== 'dashboard') {
        return $next($request);
    }

    return $next($request);}
}
