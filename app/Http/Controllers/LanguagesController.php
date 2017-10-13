<?php

namespace App\Http\Controllers;

use DB;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguagesController extends Controller
{
    /**
     * @return $this
     */
    public function home()
    {
        // $languages = DB::table('languages')->get();
        $languages = Language::all();
        return view('languages.index')->with(['languages' => $languages]);
    }

    /**
     * @param Language $language
     * @return Language
     */
    public function show(Language $language)
    {
        return view('languages.show')->with(['language' => $language]);
    }
}
