<?php

namespace App\Imports;

use App\Models\TabelD;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class ImportTabelD implements ToModel, WithHeadingRow, withValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    public function model(array $row)
    {
        return new TabelB([
            'kode_sales' => $row['kode_sales'],
            'nama_sales' => $row['nama_sales'],
        ]);
    }

    public function rules(): array
    {
        return [
            'kode_sales' => [
                'required',
                'unique:tabel_c,kode_toko'
            ],
        ];
    }
}
