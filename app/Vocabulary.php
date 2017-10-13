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
}
