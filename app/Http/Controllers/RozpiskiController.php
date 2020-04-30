<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Rozpiski;
use App\Cars;
use App\Trailers;
use App\Firms;

class RozpiskiController extends Controller
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
        $rozpiski = Rozpiski::where('kierowca', Auth::user()->name)->where('status', '0')->get();
        $rozpiskipop = Rozpiski::where('kierowca', Auth::user()->name)->where('status', '3')->get();
        return view('rozpiski.index')->with(compact(['rozpiski', 'rozpiskipop']));
    }

    public function admin()
    {
        $rozpiski = Rozpiski::where('status', '1')->orderBy('kierowca', 'DESC')->get();
        return view('rozpiski.admin', compact('rozpiski'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $podstawka = array("Austria", "Belgia", "Czechy", "Francja", "Holandia", "Luxembourg", "Niemcy", "Słowacja", "Szwajcaria", "Wielka Brytania", "Italia", "Polska");
        $promods = array("Andora","Austria","Belgia","Bośnia i Hercegowina","Bułgaria","Chorwacja","Cypr","Czechy","Dania","Estonia","Finlandia","Francja","Grecja","Hiszpania","Holandia","Irlandia","Islandia","Italia","Liechtenstein","Litwa","Łotwa","Macedonia","Mołdawia","Niemcy","Norwegia","Polska","Rumunia");
        $going = array("Węgry");
        $skan = array("Szwecja");
        $rus = array("Białoruś", "Rosja");

        if(Auth::user()->going == 1) {
            $podstawka = array_merge($podstawka, $going);
        }
        if(Auth::user()->skan == 1) {
            $podstawka = array_merge($podstawka, $skan);
        }
        if(Auth::user()->rusmapa == 1) {
            $podstawka = array_merge($podstawka, $rus);
        }
        if(Auth::user()->promods == 1) {
            $podstawka = array_merge($podstawka, $promods);
        }

        $kraje = array("Polska", "Niemcy", "Holandia", "Belgia");
        $losuj_kraj=array_rand($podstawka,2);
        for($i = 0; $i<20; $i++) {
            $rozpiska = new Rozpiski;
            $rozpiska->kraj1 = $podstawka[array_rand($podstawka)];
            $rozpiska->miasto1 = '';
            $rozpiska->kraj2 = $podstawka[array_rand($podstawka)];
            $rozpiska->miasto2 = '';
            $rozpiska->kmpuste = '';
            $rozpiska->kmztowarem = '';
            $rozpiska->koszty = '';
            $rozpiska->paliwo = '';
            $rozpiska->kierowca = Auth::user()->name;
            $rozpiska->status = '0';
            $rozpiska->save();
        }
        return redirect()->route('rozpiski.index');
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
    public function edit(Rozpiski $rozpiska)
    {
        return view('rozpiski.edit', compact('rozpiska'));
    }
    public function reject($rozpiska)
    {
        $roz = Rozpiski::where('id', $rozpiska)->first();
        $roz->status = "3";
        $roz->save();

        return redirect()->route('rozpiski.admin');
    }
    public function accept($rozpiska)
    {
        $roz = Rozpiski::where('id', $rozpiska)->first();
        
        $roz->status = "2";

        $kmpuste = $roz->kmpuste;
        $kmztowarem = $roz->kmztowarem;
        $koszty = $roz->koszty;
        $paliwo = $roz->paliwo;
        $kierowca = $roz->kierowca;
        $kilometry = $kmpuste + $kmztowarem;

        $kiero = User::where('name', $kierowca)->first();
        $kiero->kilometry += $kilometry;
        $kiero->paliwo += $paliwo;

        $tir = Cars::where('kierowca', $kierowca)->first();
        $tir->przebieg += $kilometry;

        $naczepa = Trailers::where('kierowca', $kierowca)->first();
        $naczepa->przebieg += $kilometry;

        $firma = Firms::first();
        $stawkapusta = $firma->stawkapusta;
        $stawkaladunek = $firma->stawkaladunek;
        $stawkafirma = $firma->stawkafirma;

        $kasapuste = $kmpuste * $stawkapusta;
        $kasaladunek = $kmztowarem * $stawkaladunek;
        $kasakoniec = $kasapuste + $kasaladunek + $koszty;

        $kiero->konto += $kasakoniec;

        $fkasa = $kmztowarem * $stawkafirma;
        $fkasakoniec = $fkasa - $kasakoniec;

        $firma->konto += $fkasakoniec;
        $firma->save();

        


        $naczepa->save();
        $tir->save();
        $kiero->save();
        $roz->save();

        return redirect()->route('rozpiski.admin');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rozpiski $rozpiska)
    {
        $rozpiska->update($request->all());
        return redirect()->route('rozpiski.index');
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
