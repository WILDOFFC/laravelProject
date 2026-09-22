<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function index() {
        $categories = Category::all();
        $countries = Country::all();
        return view('catalog.index', ['categories'=> $categories,'countries'=> $countries]);
    }

    public function search(HttpRequest $request): View
    {
        $products = Product::where('name', 'LIKE', '%' . $request->search . '%')->get();
        $categories = Category::all();
        $countries = Country::all();
        return view('search', ['products'=>$products, 'categories'=>$categories, 'countries'=>$countries]);
    }
}
