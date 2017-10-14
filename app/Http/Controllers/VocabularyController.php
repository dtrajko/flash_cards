<?php

namespace App\Http\Controllers;

use App\Vocabulary;
use Illuminate\Http\Request;

class VocabularyController extends Controller
{
    public function index()
    {
        $vocabulary = Vocabulary::all();
        return view('vocabulary.index')->with(['vocabulary' => $vocabulary]);
    }

    public function create(Request $request)
    {
        $vocabulary = new Vocabulary;
        $vocabulary->translation = $request->translation;
        $vocabulary->language_id = $request->language_id;
        $vocabulary->term_id = $request->term_id;
        $vocabulary->save();
    }

    public function delete(Vocabulary $vocabulary)
    {
        $vocabulary->delete();
    }
}
