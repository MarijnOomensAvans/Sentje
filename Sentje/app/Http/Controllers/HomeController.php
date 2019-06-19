<?php

namespace Sentje\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function landing()
    {
        if (Auth::guest()) {
            return view('auth/login');
        } else {
            $locale = Auth::user()->lang;
            if ($locale == 'ru') {
                return redirect(url('locale/ru'));
            } else {
                return redirect(url('locale/en'));
            }
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
