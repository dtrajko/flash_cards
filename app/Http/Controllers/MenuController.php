<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;

class MenuController extends Controller
{
    public function index()
    {
        Settings::init_score();

        return view('menu.index');
    }
}
