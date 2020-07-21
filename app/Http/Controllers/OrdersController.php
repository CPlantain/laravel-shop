<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function show()
    {
    	$order = Order::getCurrent();
    	
    	return view('order.show', compact('order'));
    }

    public function addProduct(Product $product)
    {
    	$order = Order::findOrMake();

    	$order->addProduct($product);

    	// if(substr_count(back(), route('cart'))){
    	// 	return back();
    	// }

    	return back()->with('success', "The product \"{$product->name}\" has been added to your cart");
    }

    public function removeProduct(Product $product)
    {
    	$order = Order::getCurrent();
    	
    	if (!$order) return back();

    	$order->removeProduct($product);

    	return back()->with('warning', "The product \"{$product->name}\" has been removed from your cart");
    }

    public function confirm()
    {
    	$order = Order::getCurrent();

    	return $order ? view('order.confirm', compact('order')) : redirect()->route('home');
    }

    public function place()
    {
    	$order = Order::getCurrent();

    	if (!$order) return redirect()->route('home');

    	$result = $order->place(request()->name, request()->phone);

    	$message = $result ? 'Your order has been accepted!' : 'Something went wrong.';

    	return redirect()->route('home')->with('success', $message);
    }
}
