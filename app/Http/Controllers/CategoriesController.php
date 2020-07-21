<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function index()
    {
    	$categories = Category::paginate(6);

    	return view('categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
    	$products = $category->products()->paginate(6);
    	
    	return view('categories.show', compact('category', 'products'));
    }
}
