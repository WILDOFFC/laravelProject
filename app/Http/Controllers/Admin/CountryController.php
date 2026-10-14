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
        $countries = Country::all();
        return view("countries.index", ['countries' => $countries]);
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(Request $request)
    {
        $country = new Country();

        $country->name=$request->country_name;

        $country->save();

        return back()->with('success', 'Страна создана!');
    }

    public function edit(Request $request)
    {
        $country = Country::find($request->country);
        return view('countries.edit', ['country' => $country]);
    }

    public function update(Request $request, country $country)
    {
        $c = country::where('name', $country->name);
        $c -> update(['name' => $request->country_name]);

        return redirect()->route('countries.index')->with('success', 'Страна обновлена!');
    }

    public function destroy(country $country)
    {
        $country->delete();

        return redirect()->route('countries.index')->with('success', 'Страна успешно удалена!');
    }
}
