<?php

namespace App\Http\Controllers;

use App\Vocabulary;
use App\Language;
use App\Term;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class VocabularyController extends Controller
{
    public function index(Term $term)
    {
        $vocabulary = Vocabulary::select()->orderBy('translation', 'asc')->paginate(10);
        $voc_count = Vocabulary::count();
        $languages = Language::getLanguages();
        $terms = Term::getTerms();
        return view('vocabulary.index')->with([
            'vocabulary' => $vocabulary,
            'voc_count' => $voc_count,
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

        if ($response_msg == 'true')
        {
            // increment current score
            Settings::update_score(1);
        } elseif ($response_msg == 'false')
        {
            // decrement current score
            Settings::update_score(-1);
            // reset the score
            // Settings::update_score(0);
        }

        $response = array(
            'status' => 'success',
            'msg' => $response_msg,
        );
        return response()->json($response);
    }

    public function display(Vocabulary $vocabulary)
    {
        $terms = Term::getTerms();
        $languages = Language::getLanguages();
        return view('vocabulary.display')->with(['vocabulary' => $vocabulary, 'languages' => $languages, 'terms' => $terms]);
    }

    public function update(Vocabulary $vocabulary, Request $request)
    {
        if (!empty($request->translation) && !empty($request->term_id) && !empty($request->language_id))
        {
            $vocabulary->translation = $request->translation;
            $vocabulary->term_id = $request->term_id;
            $vocabulary->language_id = $request->language_id;
        }
        $vocabulary->save();
        return back();
    }

    public function search($keyword = null)
    {
        if ($keyword == null) $results = new \Illuminate\Database\Eloquent\Collection;
        else {
            $vocabulary = new Vocabulary;
            $results = $vocabulary->search($keyword);
        }
        return view('vocabulary.search')->with(['keyword' => $keyword, 'results' => $results]);
    }
}
