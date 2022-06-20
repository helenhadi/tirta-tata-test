<?php

namespace App\Http\Controllers;

use App\Models\TabelA;
use App\Models\TabelB;
use App\Models\TabelC;
use App\Models\TabelD;
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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }
    public function modal(Request $request)
    {
        $id = $request->id;
        switch ($request->type) {

            case 'a':
                $data = ($id == 0) ? null : TabelA::find($id);
                return response()->json(array(
                    'ttl' => ($id == 0 ? "Tambah" : "Ubah")." Data Tabel A",
                    'msg' => view('tabel_a.form', compact('data'))->render()
                ), 200);
                break;
        }
    }
}
