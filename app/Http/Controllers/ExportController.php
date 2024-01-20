<?php

namespace App\Http\Controllers;

use App\Exports\AdjustStuffingBoxExport;
use App\Exports\AllExport;
use App\Exports\TopSoilExport;
use App\Exports\CsrbExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function index() {
        return view('export.index');
    }

    public function exportAdjustStuffingBox() {
        return Excel::download(new AdjustStuffingBoxExport, 'adjust_stuffing_box.xlsx');
    }

    public function exportTopSoil() {
        return Excel::download(new TopSoilExport, 'top_soil.xlsx');
    }

    public function exportCsrb() {
        return Excel::download(new CsrbExport, 'csrb.xlsx');
    }

    public function all() {
        return Excel::download(new AllExport(), 'all.xlsx');

//        $names = DB::table('names')->distinct()->get();
//        foreach ($names as $name) {
//            $name->count = DB::table('checker_fods')->where('name_id', $name->id)->where('adjust_stuffing_box', 1)->count() ?? 0;
//        }
//
//        $adjustStuffingBox = $names;
//
//        $names = DB::table('names')->distinct()->get();
//        foreach ($names as $name) {
//            $name->count = DB::table('checker_fods')->where('name_id', $name->id)->where('top_soil', 1)->count() ?? 0;
//        }
//
//        $topSoil = $names;
//
//        $names = DB::table('names')->distinct()->get();
//        foreach ($names as $name) {
//            $name->count = DB::table('checker_fods')->where('name_id', $name->id)->where('csrb', 1)->count() ?? 0;
//        }
//
//        $csrb = $names;
//
//        return view('export.template-long', [
//            'adjustStuffingBox' => $adjustStuffingBox,
//            'topSoil' => $topSoil,
//            'csrb' => $csrb,
//        ]);
    }
}
