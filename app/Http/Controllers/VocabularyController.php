<?php

namespace App\Http\Controllers;

use App\Vocabulary;
use App\Language;
use App\Term;
use Illuminate\Http\Request;

class VocabularyController extends Controller
{
    public function index()
    {
        $vocabulary = Vocabulary::all();
        $languages = Language::getLanguages();
        $terms = Term::getTerms();
        return view('vocabulary.index')->with([
            'vocabulary' => $vocabulary,
            'languages' => $languages,
            'terms' => $terms,
        ]);
    }

    public function create(Request $request)
    {
        $vocabulary = new Vocabulary;
        $vocabulary->translation = $request->translation;
        $vocabulary->language_id = $request->language_id;
        $vocabulary->term_id = $request->term_id;
        $vocabulary->save();
        return back();
    }

    public function delete(Vocabulary $vocabulary)
    {
        $vocabulary->delete();
        return back();
    }
}
