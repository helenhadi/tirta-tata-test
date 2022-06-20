<?php

namespace App\Exports;

use App\Models\TabelB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportTabelB implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = TabelB::all();
        return view('tabel_b.exports.excel', ['data' => $data]);
    }
}
