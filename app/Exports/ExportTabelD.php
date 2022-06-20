<?php

namespace App\Exports;

use App\Models\TabelD;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportTabelD implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = TabelD::all();
        return view('tabel_d.exports.excel', ['data' => $data]);
    }
}
