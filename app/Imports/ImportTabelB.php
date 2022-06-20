<?php

namespace App\Imports;

use App\Models\TabelB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class ImportTabelB implements ToModel, WithHeadingRow, withValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    public function model(array $row)
    {
        return new TabelB([
            'kode_toko' => $row['kode_toko'],
            'nominal_transaksi' => $row['nominal_transaksi'],
        ]);
    }

    public function rules(): array
    {
        return [
            'kode_toko' => [
                'required',
                'numeric',
                'unique:tabel_b,kode_toko'
            ],
        ];
    }
}
