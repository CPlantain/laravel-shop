<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
    	$orders = Order::active()->paginate(10);
    	return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
    	return view('admin.orders.show', compact('order'));
    }
}
