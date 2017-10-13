<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    public function home()
    {
        $languages = ['English', 'Deutsch', 'Français'];
        return view('languages.index')->with(['languages' => $languages]);
    }
}
