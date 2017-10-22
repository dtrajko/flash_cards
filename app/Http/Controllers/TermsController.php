<?php

namespace App\Http\Controllers;

use App\Term;
use App\Vocabulary;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use \DB as DB;

class TermsController extends Controller
{
    public function index()
    {
        $terms_count = Term::count();
        $terms = Term::select()->orderBy('name', 'asc')->paginate(6);

        return view('terms.index')->with(['terms' => $terms, 'terms_count' => $terms_count]);
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

    public function update(Term $term, Request $request)
    {
        $picture = $request->file('picture');
        if ($picture) {
            $picture_new_filename = time() . '.' . strtolower($picture->getClientOriginalExtension());
            Image::make($picture->getRealPath())
                ->resize(null, 200, function ($constraint) { $constraint->aspectRatio(); })
                ->save(public_path('images/terms') . '/' . $picture_new_filename);
            // delete the old image
            // var_dump(public_path('images/terms') . '/' . $term->picture); die();
            File::delete(public_path('images/terms') . '/' . $term->picture);
            $term->picture = $picture_new_filename;
        }
        if (!empty($request->name))
        {
            $term->name = $request->name;
        }
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
