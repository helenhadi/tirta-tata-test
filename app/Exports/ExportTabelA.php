<?php

namespace App\Exports;

use App\Models\TabelA;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportTabelA implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $data = TabelA::all();
        return view('tabel_a.exports.excel', ['data' => $data]);
    }
}
