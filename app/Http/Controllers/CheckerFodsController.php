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

        foreach ($wells as $well) {
            $well->name = $well->name . ' - ' . $well->area . ' - ' . $well->arse;
        }

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

        $well_id = explode(' - ', $request->well_id)[0];
        $id = DB::table('wells')->where('name', $well_id)->first()->id;
        $data['well_id'] = $id;

        DB::table('checker_fods')->insert($data);

        return redirect()->route('dashboard')->with('toast_success', 'Checker FOD created successfully');
    }

    public function destroy($id) {
        DB::table('checker_fods')->where('id', $id)->delete();
        return redirect()->route('dashboard')->with('toast_success', 'Checker FOD deleted successfully');
    }

    public function edit($id)
    {
        $checkerFod = DB::table('checker_fods')->where('id', $id)->first();
        $wells = DB::table('wells')->get();
        $teams = DB::table('teams')->get();
        $names = DB::table('names')->get();

        foreach ($wells as $well) {
            $well->name = $well->name . ' - ' . $well->area . ' - ' . $well->arse;
        }

        return view('checker-fods.edit', [
            'checkerFod' => $checkerFod,
            'wells' => $wells,
            'teams' => $teams,
            'names' => $names,
        ]);
    }

    public function update(Request $request, $id)
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

        $data['updated_at'] = now();

        $well_id = explode(' - ', $request->well_id)[0];

        $data['well_id'] = DB::table('wells')->where('name', $well_id)->first()->id;
        DB::table('checker_fods')->where('id', $id)->update($data);


        return redirect()->route('dashboard')->with('toast_success', 'Checker FOD updated successfully');
    }
}
