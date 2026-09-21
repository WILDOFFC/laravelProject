<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Category;

class CatalogController extends Controller
{
    public function index() {
        $categories = Category::all();
        $countries = Country::all();
        return view('catalog.index', ['categories'=> $categories,'countries'=> $countries]);
    }
}
