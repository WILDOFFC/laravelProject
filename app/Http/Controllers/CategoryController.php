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
        $products = $category->products();
        if(request()->filled('p_from'))
            $products->where('price' ,'>=', request('p_from'));
        if(request()->filled('p_to'))
            $products->where('price','<=', request('p_to'));
        $products = $products->get();
        $countries = Country::all();
        return view('categories.show', ['products' => $products, 'categories' => $category, 'countries'=>$countries]);
    }

    public function filterPrice()
    {
        $p_from = request('p_from');
    }
}
