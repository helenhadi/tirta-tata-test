<?php

namespace App\Http\Controllers;

use App\Exports\ExportTabelB;
use App\Imports\ImportTabelB;
use App\Models\TabelB;
use Illuminate\Http\Request;
use Excel;
use PDF;
use Validator;

class TabelBController extends Controller
{
    public function index()
    {
        $data = TabelB::all();
        return view('tabel_b.index', compact('data'));
    }

    public function save(Request $request)
    {
        try {
            $isCreate = $request->id==0 ? true : false;
            $kode_toko = $isCreate ? $request->kode_toko : $request->id;
            $nominal_transaksi = $request->nominal_transaksi;

            Validator::make($request->all(), [
                'kode_toko' => !is_null($kode_toko) ? 'numeric' : '',
                'nominal_transaksi' => 'required|numeric',
            ])->validate();

            $data = ($isCreate) ? new TabelB : TabelB::find($kode_toko);
            if (!is_null($kode_toko)) $data->kode_toko = $kode_toko;
            $data->nominal_transaksi = $nominal_transaksi;
            $save = $data->save();

            if ($save)
                return redirect()->back()->with('success', 'Data saved!');
            return redirect()->back()->with('error', 'Failed to save! Please try again later.');
        }
        catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            $delete = TabelB::find($request->id)->delete();

            if ($delete)
                return redirect()->back()->with('success', 'Data deleted!');
            return redirect()->back()->with('error', 'Failed to delete! Please try again later.');
        } catch (\Illuminate\Database\QueryException $ex) {

        }
    }

    public function import(Request $request)
    {
        Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx',
        ])->validate();

        Excel::import(new ImportTabelB, $request->file('file'));

        return redirect()->back()->with('success', 'Data import succeed!');
    }

    public function exportExcel()
    {
        return Excel::download(new ExportTabelB, 'TableB.xlsx');
    }

    public function exportPdf()
    {
        $data = TabelB::all();
        $pdf = PDF::loadView('tabel_b.exports.pdf', ['data' => $data]);

        return $pdf->download('TableB.pdf');
    }
}
