<?php

namespace App\Http\Controllers;

use App\Language;
use App\Vocabulary;
use Illuminate\Http\Request;
use \App\Term;
use \DB as DB;

class CardsController extends Controller
{
    const OPTIONS_OFFERED = 4;

    public function index()
    {
        $term = Term::inRandomOrder()->first();
        $language = Language::where('enabled', 1)->inRandomOrder()->first();
        $voc_options_random = Vocabulary::select('vocabulary.*')
            ->join('languages', 'languages.id', '=', 'vocabulary.language_id')
            ->where('languages.enabled', 1)
            ->orderByRaw('RAND()')->limit(self::OPTIONS_OFFERED)->get();
        /*
        DB::listen(function($sql) {
            var_dump($sql);
        });
        */
        $voc_option_correct = Vocabulary::select('vocabulary.*')
            ->join('languages', 'languages.id', '=', 'vocabulary.language_id')
            ->join('terms', 'terms.id', '=', 'vocabulary.term_id')
            ->where('languages.enabled', 1)
            ->where('languages.name', $language->name)
            ->where('terms.name', $term->name)
            ->first();
        if(count($voc_option_correct) < 1) {
            exit("Missing vocabulary entry for term '" . $term->name . "' and language '" . $language->name . "'");
        }

        // $voc_options = $voc_options_random;
        $voc_options = Vocabulary::prepareOptions($voc_option_correct, $voc_options_random);

        return view('cards.index', [
            'term' => $term,
            'language' => $language,
            'voc_options' => $voc_options,
            'voc_option_correct' => $voc_option_correct,
        ]);
    }
}
