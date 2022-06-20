<?php

namespace App\Imports;

use App\Models\TabelD;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportTabelD implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TabelD([
            //
        ]);
    }
}
