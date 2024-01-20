<?php

namespace App\Import;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class WellImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            DB::table('wells')->updateOrInsert(
                ['name' => $row[0]],
                ['name' => $row[0]]
            );
        }
    }
}
