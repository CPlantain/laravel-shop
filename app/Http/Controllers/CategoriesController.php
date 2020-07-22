<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\ProductsFilterRequest;

class CategoriesController extends Controller
{
    public function index()
    {
    	$categories = Category::paginate(6);

    	return view('categories.index', compact('categories'));
    }

    public function show(ProductsFilterRequest $request, Category $category)
    {
    	$products = $category->products()->filteredBy($request->all())->paginate(6);
    	
    	return view('categories.show', compact('category', 'products'));
    }
}
