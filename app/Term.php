<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    public static function getTerms()
    {
        return self::orderBy('name', 'asc')->get();
    }

    public function voc_items()
    {
        return $this->hasMany('App\Vocabulary');
    }

    public function voc_count()
    {
        return count($this->voc_items());
    }
}
