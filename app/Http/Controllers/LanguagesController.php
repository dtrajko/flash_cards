<?php

namespace App\Http\Controllers;

use DB;
use App\Language;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

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

    /**
     * @param Request $request
     * @return array
     */
    public function create(Request $request)
    {
        $language = new Language;
        $language->name = $request->name;
        $language->enabled = isset($request->enabled) ? 1 : 0;
        $language->create();
        redirect('/languages');
    }

    public function delete(Language $language)
    {
        $language->delete();
    }
}
