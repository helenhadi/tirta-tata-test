<?php

namespace App\Http\Controllers;

use App\Models\TabelC;
use Illuminate\Http\Request;

class TabelCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TabelC::all();
        return view('tabel_c.index', compact('data'));    }

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
     * @param  \App\Models\TabelC  $tabelC
     * @return \Illuminate\Http\Response
     */
    public function show(TabelC $tabelC)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TabelC  $tabelC
     * @return \Illuminate\Http\Response
     */
    public function edit(TabelC $tabelC)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TabelC  $tabelC
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TabelC $tabelC)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TabelC  $tabelC
     * @return \Illuminate\Http\Response
     */
    public function destroy(TabelC $tabelC)
    {
        //
    }
}
