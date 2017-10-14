<?php

namespace App\Http\Controllers;

use App\Term;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index()
    {
        $terms = Term::all();
        return view('terms.index')->with(['terms' => $terms]);
    }

    public function create(Request $request)
    {
        $term = new Term;
        $term->picture = $request->picture;
        $term->name = $request->name;
        $term->save();
        return back();
    }

    public function delete(Term $term)
    {
        $term->delete();
        return back();
    }
}
