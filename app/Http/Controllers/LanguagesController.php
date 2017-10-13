<?php

namespace App\Http\Controllers;

use DB;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguagesController extends Controller
{
    public function home()
    {
        // $languages = DB::table('languages')->get();
        $languages = Language::all();
        return view('languages.index')->with(['languages' => $languages]);
    }
}
