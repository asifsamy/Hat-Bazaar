<?php

namespace App\Http\Middleware;

use Closure;
use App\Product;
use App\SubCategory;
use Cart;
use DB;

class CheckIDMiddleware
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
        $product = DB::table('products')
                ->where('id', $request->id)
                ->first();
        $subCategories = DB::table('sub_categories')
                ->where('id', $request->id)
                ->first();
        if($product || $subCategories){
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
