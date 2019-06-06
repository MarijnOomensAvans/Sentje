<?php

namespace Sentje\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index() {
        return view('usersettings');
    }

    public function update(Request $request) {
        if($request['language'] == 'ru') {
            return redirect(url('locale/ru'));
        }
        else {
            return redirect(url('locale/en'));
        }
    }


}
