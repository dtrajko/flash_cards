<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;

class SettingsController extends Controller
{
    public function update_score($outcome)
    {
        Settings::update_score($outcome);
    }
}
