<?php

namespace Sentje\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index() {
        return view('usersettings');
    }
}
