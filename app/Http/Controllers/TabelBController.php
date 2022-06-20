<?php

namespace App\Http\Controllers;

use App\Models\TabelB;
use Illuminate\Http\Request;

class TabelBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tabelB::all();
        return view('tabel_b.index', compact('data'));    }

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
     * @param  \App\Models\TabelB  $tabelB
     * @return \Illuminate\Http\Response
     */
    public function show(TabelB $tabelB)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TabelB  $tabelB
     * @return \Illuminate\Http\Response
     */
    public function edit(TabelB $tabelB)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TabelB  $tabelB
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TabelB $tabelB)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TabelB  $tabelB
     * @return \Illuminate\Http\Response
     */
    public function destroy(TabelB $tabelB)
    {
        //
    }
}
