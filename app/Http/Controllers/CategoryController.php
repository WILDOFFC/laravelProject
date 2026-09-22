<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function PHPUnit\Framework\isEmpty;

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

        if (request()->filled('sortBy')) {
            $allowedColumns=['id', 'price', 'name', 'created_at'];
            $column = in_array(request('sortBy'), $allowedColumns) ?'name':'asc';
            $direction = request('sortBy') === 'desc' ? 'desc' : 'asc';
            $products->orderBy('id', $direction);
        }


        if (request()->filled('p_from'))
            $products->where('price', '>=', request('p_from'));
        if (request()->filled('p_to'))
            $products->where('price', '<=', request('p_to'));


        $products = $products->get();
        $countries = Country::all();
        return view('categories.show', ['products' => $products, 'categories' => $category, 'countries' => $countries]);
    }

    public function filterPrice()
    {
        $p_from = request('p_from');
    }
}
