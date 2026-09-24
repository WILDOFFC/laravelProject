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
            $sort = request('sortBy');
            switch($sort) {
                case 'asc':
                    $products->orderBy('name', 'asc');
                    break;
                case 'desc':
                    $products->orderBy('name', 'desc');
                    break;
                case 'priceUp':
                    $products->orderBy('price', 'asc');
                    break;
                case 'priceDown':
                    $products->orderBy('price', 'desc');
                    break;
                case 'newFirst':
                    $products->orderBy('date_created', 'asc');
                    break;
            }

        }


        if (request()->filled('p_from'))
            $products->where('price', '>=', request('p_from'));
        if (request()->filled('p_to'))
            $products->where('price', '<=', request('p_to'));

        if (request()->filled('filterByCountry')) {
            $products->where('country_id', '=', request('filterByCountry'));
        }
        $products = $products->paginate(3)->withQueryString();
        $countries = Country::all();
        return view('categories.show', ['products' => $products, 'categories' => $category, 'countries' => $countries]);
    }

    public function filterPrice()
    {
        $p_from = request('p_from');
    }
}
