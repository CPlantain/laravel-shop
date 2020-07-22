<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsFilterRequest;
use \Debugbar;

class ProductsController extends Controller
{
    public function index(ProductsFilterRequest $request)
    {
        $products = Product::filteredBy($request->all())->paginate(6);

    	return view('products.index', compact('products'));
    }

    public function show(Category $category, Product $product)
    {
    	return view('products.show', compact('product'));
    }
}
