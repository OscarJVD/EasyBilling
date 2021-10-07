<?php

namespace App\Http\Middleware;

use Closure;

class ProviderMiddleware
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
        // dd(\Auth::user());
        // dd(\Auth::user()->role);
        $nameRole   = \Auth::user()->role->name;
        $nameStatus = \Auth::user()->status->name;

        if($nameRole === 'Proveedor' && $nameStatus === 'Activo')
            return $next($request);

        return redirect('login');
    }
}
