<?php

namespace App\Http\Controllers\User;

use App\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
    	// dd(auth()->user()->orders()->where('status', 1)->get());
    	$orders = Auth::user()->orders()->where('status', 1)->get();
    	return view('user.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if (!Auth::user()->orders->contains($order)) {
            return abort(404);
        }
        
    	return view('user.orders.show', compact('order'));
    }
}
