<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function create()
    {
        $this->save();
    }

    public static function getLanguages()
    {
        return self::where('enabled', '1')
            ->orderBy('name', 'asc')
            ->get();
    }
}
