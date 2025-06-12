<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
{
    if (!Auth::check()) {
        return redirect('/login'); // توجيه لتسجيل الدخول بدلاً من 403
    }
if (Auth::user()->role !== $role) {
    return response()->view('errors.403', [], 403); // تأكد من وجود view باسم `403.blade.php`
}
    return $next($request);
}
}
