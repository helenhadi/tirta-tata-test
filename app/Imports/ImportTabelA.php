<?php

namespace App\Imports;

use App\Models\TabelA;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportTabelA implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TabelA([
            'kode_baru' => $row[0],
            'kode_lama' => $row[1],
        ]);
    }
}
