<?php

namespace App\Exports;

use App\AmbilProduct;
use Maatwebsite\Excel\Concerns\FromCollection;

class Ambilexport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AmbilProduct::all();
    }
}
