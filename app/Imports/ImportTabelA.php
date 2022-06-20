<?php

namespace App\Imports;

use App\Models\TabelA;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;


class ImportTabelA implements ToModel, WithHeadingRow, withValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    public function model(array $row)
    {
        return new TabelA([
            'kode_baru' => $row['kode_baru'],
            'kode_lama' => $row['kode_lama'],
        ]);
    }

    public function rules(): array
    {
        return [
            'kode_baru' => [
                'required',
                'numeric',
                'unique:tabel_a,kode_baru'
            ],
        ];
    }
}
