<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Karta;
use App\User;
use App\Cars;
use App\Trailers;
use DB;
use Auth;
class KartaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$karta = DB::table('karta')->get();
        $karta = User::where('id', Auth::user()->id)->get();
        $ciezarowka = Cars::where('kierowca', Auth::user()->name)->get();
        $naczepa = Trailers::where('kierowca', Auth::user()->name)->get();
        return view('karta.index')->with(compact(['karta', 'ciezarowka', 'naczepa']));
    }

    public function mapy (User $user)
    {
        return view('karta.mapy', compact('user'));
    }

    public function updatemapy(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('karta');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('karta.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
