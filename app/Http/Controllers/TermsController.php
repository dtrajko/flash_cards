<?php

namespace App\Http\Controllers;

use App\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TermsController extends Controller
{
    public function index()
    {
        $terms = Term::all();
        return view('terms.index')->with(['terms' => $terms]);
    }

    public function create(Request $request)
    {
        $picture = $request->file('picture');
        $picture_new_filename = time() . '.' . strtolower($picture->getClientOriginalExtension());
        $picture->move(public_path('images/terms'), $picture_new_filename);

        $term = new Term;
        $term->picture = $picture_new_filename;
        $term->name = $request->name;
        $term->save();
        return back();
    }

    public function delete(Term $term)
    {
        File::delete(public_path('images/terms') . '/' . $term->picture);
        $term->delete();
        return back();
    }
}
