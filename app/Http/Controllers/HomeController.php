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
            case 'a-import':
                return response()->json(array(
                    'ttl' => "Import Data Tabel A",
                    'msg' => view('tabel_a.import')->render()
                ), 200);
                break;
            case 'b':
                $data = ($id == 0) ? null : TabelB::find($id);
                return response()->json(array(
                    'ttl' => ($id == 0 ? "Tambah" : "Ubah")." Data Tabel B",
                    'msg' => view('tabel_b.form', compact('data'))->render()
                ), 200);
                break;
            case 'b-import':
                return response()->json(array(
                    'ttl' => "Import Data Tabel B",
                    'msg' => view('tabel_b.import')->render()
                ), 200);
                break;
            case 'c':
                $data = ($id == 0) ? null : TabelC::find($id);
                return response()->json(array(
                    'ttl' => ($id == 0 ? "Tambah" : "Ubah")." Data Tabel C",
                    'msg' => view('tabel_c.form', compact('data'))->render()
                ), 200);
                break;
            case 'c-import':
                return response()->json(array(
                    'ttl' => "Import Data Tabel C",
                    'msg' => view('tabel_c.import')->render()
                ), 200);
                break;
            case 'd':
                $data = ($id==0 && is_numeric($id)) ? null : TabelD::find($id);
                return response()->json(array(
                    'ttl' => ($id == 0 ? "Tambah" : "Ubah")." Data Tabel D",
                    'msg' => view('tabel_d.form', compact('data'))->render()
                ), 200);
                break;
            case 'd-import':
                return response()->json(array(
                    'ttl' => "Import Data Tabel D",
                    'msg' => view('tabel_d.import')->render()
                ), 200);
                break;
        }
    }
}
