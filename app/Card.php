<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Term;
use App\Language;
use App\Vocabulary;
use App\Settings;
use Illuminate\Http\Request;
use \DB as DB;

class Card extends Model
{
    const OPTIONS_OFFERED = 4;

    /**
     * 
     * @return array
     */
    public static function getCardData()
    {
        $settings = [
            'score' => Settings::where('name', 'score')->first(),
            'score_total' => Settings::where('name', 'score_total')->first(),
        ];

        $term = Term::inRandomOrder()->first();
        $language = Language::where('enabled', 1)->inRandomOrder()->first();
        $voc_options_random = Vocabulary::select('vocabulary.*')
            ->join('languages', 'languages.id', '=', 'vocabulary.language_id')
	    ->where('languages.enabled', 1)
	    ->where('languages.name', $language->name)
            ->orderByRaw('RAND()')->limit(self::OPTIONS_OFFERED)->get();

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

        $data = [
            'term' => $term,
            'language' => $language,
            'voc_options' => $voc_options,
            'voc_option_correct' => $voc_option_correct,
            'settings' => $settings,
        ];

        return $data;
    }
}
