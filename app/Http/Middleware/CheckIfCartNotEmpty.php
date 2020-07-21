<?php

namespace App\Http\Middleware;

use Closure;
use App\Order;

class CheckIfCartNotEmpty
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
        $order = Order::getCurrent();
        
        if (!$order || $order->products->isEmpty()) {
            return redirect()->route('home')->with('warning', 'Your cart is empty!');
        } 

        return $next($request);
    }
}
