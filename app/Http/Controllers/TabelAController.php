<?php

namespace App\Http\Controllers;

use App\Models\TabelA;
use Illuminate\Http\Request;
use Validator;

class TabelAController extends Controller
{
    public function index()
    {
        $data = TabelA::all();
        return view('tabel_a.index', compact('data'));
    }

    public function save(Request $request)
    {
        try {
            $isCreate = $request->id==0 ? true : false;
            $kode_baru = $isCreate ? $request->kode_baru : $request->id;
            $kode_lama = $request->kode_lama;

            Validator::make($request->all(), [
                'kode_baru' => !is_null($kode_baru) ? 'numeric' : '',
                'kode_lama' => !is_null($kode_lama) ? 'numeric|unique:tabel_a,kode_lama' : '',
            ])->validate();

            $data = ($isCreate) ? new TabelA : TabelA::find($kode_baru);
            if (!is_null($kode_baru)) $data->kode_baru = $kode_baru;
            $data->kode_lama = $kode_lama;
            $save = $data->save();

            if ($save)
                return redirect()->back()->with('success', 'Data berhasil disimpan!');
            return redirect()->back()->with('error', 'Gagal menyimpan data! Silahkan coba ulang beberapa saat lagi.');
        }
        catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            $delete = TabelA::find($request->id)->delete();

            if ($delete)
                return redirect()->back()->with('success', 'Data berhasil dihapus!');
            return redirect()->back()->with('error', 'Gagal menghapus data! Silahkan coba ulang beberapa saat lagi.');
        } catch (\Illuminate\Database\QueryException $ex) {

        }
    }
}
