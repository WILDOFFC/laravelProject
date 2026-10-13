<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create(Request $request)
    {
        if ($request->bot_check != '') {
            return back()->with('success', 'Вы оставили комментарий!');
        }
        $r = new Review();
        $r->rating = $request->rating;
        $r->text = $request->text;
        $r->user_id = Auth::user()->id;
        $r->product_id = $request->product_id;
        $r->save();

        return back();
    }

    public function index()
    {
        $reviews = Review::where('moderate', 0)->get();

        return view('reviews.index', ['reviews' => $reviews]);
    }

    public function status_update(Request $request)
    {
        if ($request->status) {
            $r = Review::find($request->review);
            $r->moderate = 1;
            $r->save();
        } else {
            $r = Review::find($request->review);
            $r->delete();
        }
        return back();
    }
}
