<?php

namespace App\Exports;

use App\Models\Crud;
use Maatwebsite\Excel\Concerns\FromCollection;

class CrudExport implements FromCollection
{
    public function collection()
    {
        return Crud::all();
    }
}
