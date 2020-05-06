<?php

namespace App\Http\Controllers;
use App\Firms;
use App\User;
use App\Rozpiski;
use Auth;
use DB;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $firm = Firms::all();
        $ogolnep = DB::table('users')->orderBy('paliwo', 'DESC')->orderBy('kilometry','ASC')->get();
        $ogolne = DB::table('users')->orderBy('kilometry', 'DESC')->get();
        $ogolne1 = DB::table('users')->orderBy('konto', 'DESC')->get();
        $rozpiski = Rozpiski::where('status', '2')->get();
        return view('home')->with(compact(['firm', 'ogolne', 'ogolne1','ogolnep','rozpiski']));
    }

    public function admin()
    {
        $firm = Firms::all();
        return view('admin', compact('firm'));
    }

}
