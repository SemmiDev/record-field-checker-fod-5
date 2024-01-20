<?php

namespace App\Import;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class TeamImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            DB::table('teams')->updateOrInsert(
                ['name' => $row[0]],
                ['name' => $row[0]]
            );
        }
    }
}
