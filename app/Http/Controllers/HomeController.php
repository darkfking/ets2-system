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
        $ogolne = DB::table('users')->get();
        $rozpiski = Rozpiski::where('status', '3')->get();
        return view('home')->with(compact(['firm', 'ogolne', 'rozpiski']));
    }

    public function admin()
    {
        $firm = Firms::all();
        return view('admin', compact('firm'));
    }

}
