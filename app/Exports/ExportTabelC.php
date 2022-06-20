<?php

namespace App\Exports;

use App\Models\TabelC;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportTabelC implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = TabelC::all();
        return view('tabel_c.exports.excel', ['data' => $data]);
    }
}
