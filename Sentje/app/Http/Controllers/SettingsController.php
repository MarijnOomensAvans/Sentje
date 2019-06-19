<?php

namespace Sentje\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sentje\User;

class SettingsController extends Controller
{
    public function index()
    {
        return view('usersettings');
    }

    public function update(Request $request)
    {
        $user = User::where('id', Auth::user()->id);
        if ($request['language'] == 'ru') {
            $user->update([
                'lang' => 'ru'
            ]);
            return redirect(url('locale/ru'));
        } else {
            $user->update([
                'lang' => 'en'
            ]);
            return redirect(url('locale/en'));
        }
    }
}
