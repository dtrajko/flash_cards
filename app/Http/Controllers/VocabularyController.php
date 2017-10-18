<?php

namespace App\Http\Controllers;

use App\Vocabulary;
use App\Language;
use App\Term;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function verify(Request $request)
    {
        $term_id = $request->input('term_id');
        $language_id = $request->input('language_id');
        $vocabulary_id = $request->input('vocabulary_id');

        $vocabulary_id_db = Vocabulary::select('id')
            ->where('term_id', $term_id)
            ->where('language_id', $language_id)
            ->first()->id;

        $response_msg = ($vocabulary_id_db == $vocabulary_id) ? 'true' : 'false';

        $response = array(
            'status' => 'success',
            'msg' => $response_msg,
        );
        return response()->json($response);
    }
}
