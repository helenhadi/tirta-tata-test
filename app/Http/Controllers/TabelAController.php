<?php

namespace App\Http\Controllers;

use App\Exports\ExportTabelA;
use App\Imports\ImportTabelA;
use App\Models\TabelA;
use Illuminate\Http\Request;
use Excel;
use PDF;
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
            $delete = TabelA::find($request->id)->delete();

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

        Excel::import(new ImportTabelA, $request->file('file'));

        return redirect()->back()->with('success', 'Data import succeed!');
    }

    public function exportExcel()
    {
        return Excel::download(new ExportTabelA, 'TableA.xlsx');
    }

    public function exportPdf()
    {
        $data = TabelA::all();
        $pdf = PDF::loadView('tabel_a.exports.pdf', ['data' => $data]);

        return $pdf->download('TableA.pdf');
    }
}
