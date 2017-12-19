<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    protected $table = 'vocabulary';

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
    }

    public static function prepareOptions($voc_option_correct, $voc_options_random)
    {
        $voc_options_result = [];
        $correct_in_array = false;
        foreach ($voc_options_random as $key_random => $value_random)
        {
            $voc_options_result[] = $value_random;
            if ($value_random->id == $voc_option_correct->id)
            {
                $correct_in_array = true;
            }
        }
        if (!$correct_in_array)
        {
            // if correct option is not in the random array, pick a random option to replace with a correct option
            $voc_options_result = [];
            $index_to_replace = random_int(0, count($voc_options_random) - 1);
            $index_counter = 0;
            foreach ($voc_options_random as $key_random => $value_random)
            {
                if ($index_counter == $index_to_replace)
                {
                    $voc_options_result[] = $voc_option_correct;
                }
                else
                {
                    $voc_options_result[] = $value_random;
                }
                $index_counter++;
            }
        }
        // set the 'correct_option' to true or false for each option
        foreach ($voc_options_result as $key_result => $value_result)
        {
            $voc_options_result[$key_result]['option_correct'] = false;
            if ($value_result->id == $voc_option_correct->id)
            {
                $voc_options_result[$key_result]['option_correct'] = true;
            }
        }
        return $voc_options_result;
    }
    
    public function search($keyword)
    {
        if (empty($keyword)) return [];

        $results = Vocabulary::select('vocabulary.id', 'translation', 'name', 'language_id', 'term_id')
            ->join('terms', 'term_id', '=', 'terms.id')
            ->where('translation', 'like', "%" . $keyword . "%")
	    ->orWhere('name', 'like', "%" . $keyword . "%")
            ->orderBy('translation')
            ->get();
        return $results;
    }
}
