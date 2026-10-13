<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use Illuminate\View\View;

class CountryController extends Controller
{
    public function show(Country $country): View
    {
        $products = $country->product();

        if (request()->filled('sortBy')) {
            $sort = request('sortBy');
            switch ($sort) {
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
        $categories = Category::all();

        return view('countries.show', ['products' => $products, 'country' => $country, 'categories'=> $categories]);
    }
}
