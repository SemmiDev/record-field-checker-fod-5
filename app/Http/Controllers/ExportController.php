<?php

namespace App\Http\Controllers;

use App\Exports\AdjustStuffingBoxExport;
use App\Exports\TopSoilExport;
use App\Exports\CsrbExport;
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
}
