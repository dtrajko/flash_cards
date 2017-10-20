<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';

    protected $fillable = ['name', 'value', 'created_at', 'updated_at'];

    public static $score = null;
    public static $score_total = null;

    public static function init_score()
    {
        // initialize score and score_total records in settings table
        // and set them to zero if not exist
        self::$score = Settings::where('name', 'score')->first();
        self::$score_total = Settings::where('name', 'score_total')->first();

        if (empty(self::$score))
        {
            self::$score = Settings::create(['name' => 'score', 'value' => 0]);
        }
        if (empty(self::$score_total))
        {
            self::$score_total = Settings::create(['name' => 'score_total', 'value' => 0]);
        }

        // set current score to zero at the beginning of the game
        self::$score->value = 0;
        self::$score->save();
    }

    public static function update_score($outcome)
    {
        self::$score = self::where('name', 'score')->first();
        self::$score_total = self::where('name', 'score_total')->first();

        if ($outcome == 1)
        {
            // success, increment score by 1
            self::$score->value++;
            self::$score->save();
            if (self::$score->value > self::$score_total->value)
            {
                self::$score_total->value = self::$score->value;
                self::$score_total->save();
            }
        }
        elseif ($outcome == 0)
        {
            // failure,reset the score to 0
            self::$score->value = 0;
            self::$score->save();
        }
    }
}
