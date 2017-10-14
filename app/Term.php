<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    public static function getTerms()
    {
        return self::orderBy('name', 'asc')->get();
    }
}
