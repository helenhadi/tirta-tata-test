<?php

namespace App\Imports;

use App\Models\TabelB;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportTabelB implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TabelB([
            //
        ]);
    }
}
