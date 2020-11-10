<?php

namespace App\Http\Middleware;

use Closure;

class CekStatus
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
      $user = \App\User::where('email', $request->email)->first();
      if ($user->role=='admin'){
        return redirect('admin/dashboard');
      }elseif ($user->role == 'customer') {
        return redirect('customer/dashboard');
      }elseif ($user->role == 'seller') {
        return redirect('seller/dashboard');
      }
        return $next($request);
    }
}
