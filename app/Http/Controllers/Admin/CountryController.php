<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Country::all();
        return view("categories.index", ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $country = new country();

        $country->name = $request->country_name;

        $country->save();

        return back();
    }

    public function edit(Request $request)
    {
        $country = $request->country;
        return view('categories.edit', ['country' => $country]);
    }

    public function update(Request $request, country $country)
    {
        $c = country::where('slug', $country->name);
        $slug = Str::slug($request->country_name);
        $c -> update(['name' => $request->country_name, 'slug'=> $slug]);

        return redirect()->route('categories.index');
    }

    public function destroy(country $country)
    {
        $country->delete();

        return redirect()->route('categories.index');
    }
}
