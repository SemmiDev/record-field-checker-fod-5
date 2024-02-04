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
            if (DB::table('wells')->where('name', $row[0])->exists()) {
                continue;
            }

            DB::table('wells')->insert([
                'name' => $row[0],
                'area' => $row[1],
                'arse' => $row[2],
            ]);
        }
    }
}
