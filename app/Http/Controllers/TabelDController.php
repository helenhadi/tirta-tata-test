<?php

namespace App\Http\Controllers;

use App\Models\TabelD;
use Illuminate\Http\Request;

class TabelDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TabelD::all();
        return view('tabel_d.index', compact('data'));    }

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
     * @param  \App\Models\TabelD  $tabelD
     * @return \Illuminate\Http\Response
     */
    public function show(TabelD $tabelD)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TabelD  $tabelD
     * @return \Illuminate\Http\Response
     */
    public function edit(TabelD $tabelD)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TabelD  $tabelD
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TabelD $tabelD)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TabelD  $tabelD
     * @return \Illuminate\Http\Response
     */
    public function destroy(TabelD $tabelD)
    {
        //
    }
}
