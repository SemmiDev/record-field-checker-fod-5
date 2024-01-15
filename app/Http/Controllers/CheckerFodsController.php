<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckerFodsController extends Controller
{
    public function create()
    {
        $wells = DB::table('wells')->get();
        $teams = DB::table('teams')->get();
        $names = DB::table('names')->get();

        return view('checker-fods.create', [
            'wells' => $wells,
            'teams' => $teams,
            'names' => $names,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_id' => 'required',
            'team_id' => 'required',
            'well_id' => 'required',
            'date' => 'required',
            'adjust_stuffing_box' => 'required',
            'top_soil' => 'required',
            'csrb' => 'required',
        ]);

        $data['created_at'] = now();
        $data['updated_at'] = now();

        DB::table('checker_fods')->insert($data);

        return redirect()->route('dashboard')->with('toast_success', 'Checker FOD created successfully');
    }
}
