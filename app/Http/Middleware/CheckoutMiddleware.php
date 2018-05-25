<?php

namespace App\Http\Middleware;

use Closure;
use Cart;

class CheckoutMiddleware
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
         if(Cart::count() >= 1){
            return $next($request);
        } else {
            return redirect('/');
        }
        
    }
}
