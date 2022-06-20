<?php

namespace App\Http\Controllers;

use App\Exports\ExportTabelC;
use App\Imports\ImportTabelC;
use App\Models\TabelC;
use Illuminate\Http\Request;
use Excel;
use PDF;
use Validator;

class TabelCController extends Controller
{
    public function index()
    {
        $data = TabelC::all();
        return view('tabel_c.index', compact('data'));
    }

    public function save(Request $request)
    {
        try {
            $isCreate = $request->id==0 ? true : false;
            $kode_toko = $isCreate ? $request->kode_toko : $request->id;
            $area_sales = $request->area_sales;

            Validator::make($request->all(), [
                'kode_toko' => !is_null($kode_toko) ? 'numeric' : '',
                'area_sales' => 'required',
            ])->validate();

            $data = ($isCreate) ? new TabelC : TabelC::find($kode_toko);
            if (!is_null($kode_toko)) $data->kode_toko = $kode_toko;
            $data->area_sales = $area_sales;
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
            $delete = TabelC::find($request->id)->delete();

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

        Excel::import(new ImportTabelC, $request->file('file'));

        return redirect()->back()->with('success', 'Data import succeed!');
    }

    public function exportExcel()
    {
        return Excel::download(new ExportTabelC, 'TableC.xlsx');
    }

    public function exportPdf()
    {
        $data = TabelC::all();
        $pdf = PDF::loadView('tabel_c.exports.pdf', ['data' => $data]);

        return $pdf->download('TableC.pdf');
    }
}
