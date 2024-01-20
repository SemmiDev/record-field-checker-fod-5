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

        $fromDate = $request->get('fromDate'); // 2021-01-01
        if ($fromDate) {
            $fromDate = date('Y-m-d', strtotime($fromDate));
        }

        $toDate = $request->get('toDate'); // 2021-01-01
        if ($toDate) {
            $toDate = date('Y-m-d', strtotime($toDate));
        }

        $names = DB::table('names')->distinct()->get();

        if ($filterBy == "adjust_stuffing_box") {
            if ($status == 1) {
                foreach ($names as $name) {
                    $name->count = DB::table('checker_fods')
                        ->where('name_id', $name->id)
                        ->where('adjust_stuffing_box', 1)
                        ->when($fromDate, function ($query, $fromDate) {
                            return $query->whereDate('date', '>=', $fromDate);
                        })
                        ->when($toDate, function ($query, $toDate) {
                            return $query->whereDate('date', '<=', $toDate);
                        })
                        ->count() ?? 0;
                }
            } else {
                foreach ($names as $name) {
                    $name->count = DB::table('checker_fods')->where('name_id', $name->id)
                        ->where('adjust_stuffing_box', 0)
                          ->when($fromDate, function ($query, $fromDate) {
                            return $query->whereDate('date', '>=', $fromDate);
                        })
                        ->when($toDate, function ($query, $toDate) {
                            return $query->whereDate('date', '<=', $toDate);
                        })
                        ->count() ?? 0;
                }
            }
        } else if ($filterBy == "top_soil") {
            if ($status == 1) {
                foreach ($names as $name) {
                    $name->count = DB::table('checker_fods')->where('name_id', $name->id)->where('top_soil', 1)
                          ->when($fromDate, function ($query, $fromDate) {
                            return $query->whereDate('date', '>=', $fromDate);
                        })
                        ->when($toDate, function ($query, $toDate) {
                            return $query->whereDate('date', '<=', $toDate);
                        })
                        ->count() ?? 0;
                }
            } else {
                foreach ($names as $name) {
                    $name->count = DB::table('checker_fods')->where('name_id', $name->id)->where('top_soil', 0)
                          ->when($fromDate, function ($query, $fromDate) {
                            return $query->whereDate('date', '>=', $fromDate);
                        })
                        ->when($toDate, function ($query, $toDate) {
                            return $query->whereDate('date', '<=', $toDate);
                        })
                        ->count() ?? 0;
                }
            }
        } else if ($filterBy == "csrb") {
            if ($status == 1) {
                foreach ($names as $name) {
                    $name->count = DB::table('checker_fods')->where('name_id', $name->id)->where('csrb', 1)
                          ->when($fromDate, function ($query, $fromDate) {
                            return $query->whereDate('date', '>=', $fromDate);
                        })
                        ->when($toDate, function ($query, $toDate) {
                            return $query->whereDate('date', '<=', $toDate);
                        })
                        ->count() ?? 0;
                }
            } else {
                foreach ($names as $name) {
                    $name->count = DB::table('checker_fods')->where('name_id', $name->id)->where('csrb', 0)
                        ->when($fromDate, function ($query, $fromDate) {
                            return $query->whereDate('date', '>=', $fromDate);
                        })
                        ->when($toDate, function ($query, $toDate) {
                            return $query->whereDate('date', '<=', $toDate);
                        })
                        ->count() ?? 0;
                }
            }
        } else {
            foreach ($names as $name) {
                $name->count = 0;
            }
        }

        $names2 = DB::table('names')->distinct()->get();

        // secara keseluruhan
        $namesCRSB = [];
        $namesTopSoil = [];
        $namesAdjustStuffingBox = [];

        foreach ($names2 as $name) {
            $name->countCSRB = DB::table('checker_fods')->where('name_id', $name->id)->where('csrb', 1)
                ->when($fromDate, function ($query, $fromDate) {
                            return $query->whereDate('date', '>=', $fromDate);
                        })
                        ->when($toDate, function ($query, $toDate) {
                            return $query->whereDate('date', '<=', $toDate);
                        })
                ->count() ?? 0;
            $name->countTopSoil = DB::table('checker_fods')->where('name_id', $name->id)->where('top_soil', 1)
                ->when($fromDate, function ($query, $fromDate) {
                            return $query->whereDate('date', '>=', $fromDate);
                        })
                        ->when($toDate, function ($query, $toDate) {
                            return $query->whereDate('date', '<=', $toDate);
                        })
                ->count() ?? 0;
            $name->countAdjustStuffingBox = DB::table('checker_fods')->where('name_id', $name->id)->where('adjust_stuffing_box', 1)
                ->when($fromDate, function ($query, $fromDate) {
                            return $query->whereDate('date', '>=', $fromDate);
                        })
                        ->when($toDate, function ($query, $toDate) {
                            return $query->whereDate('date', '<=', $toDate);
                        })
                ->count() ?? 0;

            $namesCRSB[] = [
                'name' => $name->name,
                'count' => $name->countCSRB,
            ];

            $namesTopSoil[] = [
                'name' => $name->name,
                'count' => $name->countTopSoil,
            ];

            $namesAdjustStuffingBox[] = [
                'name' => $name->name,
                'count' => $name->countAdjustStuffingBox,
            ];

        }


        return view('report.index', [
            'names' => $names,
            'filterBy' => $filterBy,
            'status' => $status,

            'namesCRSB' => $namesCRSB,
            'namesTopSoil' => $namesTopSoil,
            'namesAdjustStuffingBox' => $namesAdjustStuffingBox,
        ]);
    }
}
