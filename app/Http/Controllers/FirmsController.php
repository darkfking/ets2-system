<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FirmsRequest;
use App\Firms;
use DB;
use App\User;
class FirmsController extends Controller
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
        $firms = Firms::all();
        $users = User::all();
        return view('firms.index')->with(compact(['firms', 'users']));
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
    
    public function stan(Firms $firm) 
    {
        return view('firms.stan', compact('firm'));
    }

    public function stanup(Request $request, Firms $firm)
    {
        $firm->update($request->all());
        return redirect()->route('admin');
    }

    public function ranga(User $user)
    {
        return view('firms.ranga', compact('user'));
    }

    public function rangaup(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('firms.index');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Firms $firm)
    {
        return view('firms.edit', compact('firm'));
    }

    public function update(FirmsRequest $request, Firms $firm)
    {
        $firm->update($request->all());
        return redirect()->route('firms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('firms.index');
    }
}
