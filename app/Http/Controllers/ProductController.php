<?php

namespace App\Http\Controllers;

use     App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::paginate(3);
        $categories = Category::all();
        $countries = Country::all();
        $productsLast = Product::orderBy('id', 'desc')->limit(5)->get();
        return view('products.index', ['products' => $products, 'categories' => $categories, 'productsLast' => $productsLast, 'countries'=>$countries]);
    }

    public function show(Product $product): View
    {
        $country = Country::find($product->country_id);
        $category = Category::find($product->categories_id);
        $reviews = Review::where('product_id', $product->id)->where('moderate', 1)->get();
        return view('products.show', ['product' => $product, 'country' => $country, 'category' => $category, 'reviews'=>$reviews]);
    }

    public function country($countries): View
    {
        $products = Product::where('country_id', $countries)->get();
        $categories = Category::all();
        $country = Country::find($countries);
        return view('countries.index', ['products' => $products, 'country'=>$country, 'categories'=>$categories]);
    }
}
