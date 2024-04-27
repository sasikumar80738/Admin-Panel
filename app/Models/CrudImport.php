<?php

namespace App\Imports;

use App\Models\Crud;
use Maatwebsite\Excel\Concerns\ToModel;

class CrudImport implements ToModel
{
    public function model(array $row)
    {
        return new Crud([
            'title' => $row[0],
            'description' => $row[1],
            'created_at' => $row[2],
            'status' => $row[3],
        ]);
    }
}
