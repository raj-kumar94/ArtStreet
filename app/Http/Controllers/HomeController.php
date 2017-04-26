<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use TCG\Voyager\Models\Category;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categ = Category::all();
        // return $categ;
        return view('home')->with('categ',$categ);
    }

    public function notifications()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return view('notification')->with('nots', Auth::user()->notifications);
    }
}
