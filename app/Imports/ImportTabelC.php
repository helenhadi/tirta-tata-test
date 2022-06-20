<?php

namespace App\Imports;

use App\Models\TabelC;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class ImportTabelC implements ToModel, WithHeadingRow, withValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    public function model(array $row)
    {
        return new TabelB([
            'kode_toko' => $row['kode_toko'],
            'area_sales' => $row['area_sales'],
        ]);
    }

    public function rules(): array
    {
        return [
            'kode_toko' => [
                'required',
                'numeric',
                'unique:tabel_c,kode_toko'
            ],
        ];
    }
}
