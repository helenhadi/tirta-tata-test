<?php

namespace App\Imports;

use App\Models\TabelC;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportTabelC implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TabelC([
            //
        ]);
    }
}
