<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    public function show(Category $category): View
    {
        $products = Product::where('category_id', $category->id)->get();
        $countries = Country::all();
        return view('categories.show', ['products' => $products, 'categories' => $category, 'countries'=>$countries]);
    }
}
