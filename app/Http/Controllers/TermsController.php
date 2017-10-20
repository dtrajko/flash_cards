<?php

namespace App\Http\Controllers;

use App\Term;
use App\Vocabulary;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use \DB as DB;

class TermsController extends Controller
{
    public function index()
    {
        $terms = Term::all()->sortBy('name');

        return view('terms.index')->with(['terms' => $terms]);
    }

    public function create(Request $request)
    {
        $picture_new_filename = '';
        $picture = $request->file('picture');

        if ($picture) {
            $picture_new_filename = time() . '.' . strtolower($picture->getClientOriginalExtension());
            Image::make($picture->getRealPath())
                ->resize(null, 200, function ($constraint) { $constraint->aspectRatio(); })
                ->save(public_path('images/terms') . '/' . $picture_new_filename);
        }

        $term = new Term;
        $term->picture = $picture_new_filename;
        $term->name = $request->name;
        $term->save();
        return back();
    }

    public function details(Term $term)
    {
        $vocabulary = Vocabulary::where('term_id', $term->id)->get();
        $languages = Language::getLanguages();
        return view('terms.details')->with(['term' => $term, 'vocabulary' => $vocabulary, 'languages' => $languages]);
    }

    public function delete(Term $term)
    {
        File::delete(public_path('images/terms') . '/' . $term->picture);
        Vocabulary::where('term_id', $term->id)->delete();
        $term->delete();
        return back();
    }
}
