<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::paginate(5);
        $categories = Category::all();
        $countries = Country::all();
        $productsLast = Product::orderBy('id', 'desc')->limit(5)->get();
        return view('products.index', ['products' => $products, 'categories' => $categories, 'productsLast' => $productsLast, 'countries'=>$countries]);
    }

    public function show(Product $product): View
    {
        $country = Country::find($product->country_id);
        $category = Category::find($product->categories_id);
        return view('products.show', ['product' => $product, 'country' => $country, 'category' => $category]);
    }

    public function country($countries): View
    {
        $products = Product::where('country_id', $countries)->get();
        $categories = Category::all();
        $country = Country::find($countries);
        return view('countries.index', ['products' => $products, 'country'=>$country, 'categories'=>$categories]);
    }
}
