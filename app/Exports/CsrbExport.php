<?php


namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class CsrbExport implements FromView
{
    public function view(): View
    {

        $names = DB::table('names')->distinct()->get();
        foreach ($names as $name) {
            $name->count = DB::table('checker_fods')->where('name_id', $name->id)->where('adjust_stuffing_box', 1)->count() ?? 0;
        }

        return view('export.template', [
            'names' => $names,
        ]);
    }
}
