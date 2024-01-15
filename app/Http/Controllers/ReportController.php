<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $filterBy = $request->get('filterBy'); // adjust_stuffing_box, top_soil, csrb
        $status = $request->get('status'); // yes, no

        $names = DB::table('names')->distinct()->get();

        if ($filterBy == "adjust_stuffing_box") {
            if ($status == 1) {
                foreach ($names as $name) {
                    $name->count = DB::table('checker_fods')->where('name_id', $name->id)->where('adjust_stuffing_box', 1)->count() ?? 0;
                }
            } else {
                foreach ($names as $name) {
                    $name->count = DB::table('checker_fods')->where('name_id', $name->id)->where('adjust_stuffing_box', 0)->count() ?? 0;
                }
            }
        } else if ($filterBy == "top_soil") {
            if ($status == 1) {
                foreach ($names as $name) {
                    $name->count = DB::table('checker_fods')->where('name_id', $name->id)->where('top_soil', 1)->count() ?? 0;
                }
            } else {
                foreach ($names as $name) {
                    $name->count = DB::table('checker_fods')->where('name_id', $name->id)->where('top_soil', 0)->count() ?? 0;
                }
            }
        } else if ($filterBy == "csrb") {
            if ($status == 1) {
                foreach ($names as $name) {
                    $name->count = DB::table('checker_fods')->where('name_id', $name->id)->where('csrb', 1)->count() ?? 0;
                }
            } else {
                foreach ($names as $name) {
                    $name->count = DB::table('checker_fods')->where('name_id', $name->id)->where('csrb', 0)->count() ?? 0;
                }
            }
        } else {
            foreach ($names as $name) {
                $name->count = 0;
            }
        }

        return view('report.index', [
            'names' => $names,
            'filterBy' => $filterBy,
            'status' => $status,
        ]);
    }
}
