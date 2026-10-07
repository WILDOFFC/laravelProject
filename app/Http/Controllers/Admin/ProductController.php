<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function create(): View
    {
        $categories = Category::all();
        $countries = Country::all();
        return view('products.create', ['categories' => $categories, 'countries' => $countries]);
    }

    public function store(ProductRequest $request): RedirectResponse
    {

        Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'price_opt' => $request->price_opt,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'country_id' => $request->country_id,
            //'image_path'=>$request->file('product_preview')->store('images', 'public')
        ]);

        return redirect()->route('products.index');
    }

    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return response()->route('products.index');
    }

    private function imageUpload(Request $request)
    {
        if ($request->hasFile('product_preview')){
            $image = $request->file('product_preview');
            $scaled=$image->scale(width:600);
            $resized = $image->resized(600,400);
        }
    }
}
