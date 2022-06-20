<?php

namespace App\Http\Controllers;

use App\Exports\ExportTabelD;
use App\Imports\ImportTabelD;
use App\Models\TabelD;
use Illuminate\Http\Request;
use Excel;
use PDF;
use Validator;

class TabelDController extends Controller
{
    public function index()
    {
        $data = TabelD::all();
        return view('tabel_d.index', compact('data'));
    }

    public function save(Request $request)
    {
        try {
            $isCreate = $request->id==0 ? true : false;
            $kode_sales = $isCreate ? $request->kode_sales : $request->id;
            $nama_sales = $request->nama_sales;

            Validator::make($request->all(), [
                'kode_sales' => 'required|unique:tabel_d,kode_sales',
                'nama_sales' => 'required',
            ])->validate();

            $data = ($isCreate) ? new TabelD : TabelD::find($kode_sales);
            $data->kode_sales = $kode_sales;
            $data->nama_sales = $nama_sales;
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
            $delete = TabelD::find($request->id)->delete();

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

        Excel::import(new ImportTabelD, $request->file('file'));

        return redirect()->back()->with('success', 'Data import succeed!');
    }

    public function exportExcel()
    {
        return Excel::download(new ExportTabelD, 'TableD.xlsx');
    }

    public function exportPdf()
    {
        $data = TabelD::all();
        $pdf = PDF::loadView('tabel_b.exports.pdf', ['data' => $data]);

        return $pdf->download('TableD.pdf');
    }
}
