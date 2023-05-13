<?php

namespace App\Http\Middleware;

use App\Helper\Helper;
use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplicationGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Helper::user()  == null)
        {
            session()->flash('warning','Login to access dashboard.');
            return redirect('login');
        }
        return $next($request);
    }
}
