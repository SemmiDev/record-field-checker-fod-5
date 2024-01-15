<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function index()
    {
        $teams = DB::table('teams')->get();
        return view('team.index', compact('teams'));
    }

    public function create()
    {
        return view('team.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:teams',
        ]);

        DB::table('teams')->insert($data);
        return redirect()->route('teams.index')->with('toast_success', 'Team updated successfully');
    }

    public function edit($id)
    {
        $team = DB::table('teams')->find($id);
        return view('team.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        DB::table('teams')->where('id', $id)->update($data);
        return redirect()->route('teams.index')->with('toast_success', 'Team updated successfully');
    }

    public function destroy($id)
    {
        DB::table('teams')->delete($id);
        return redirect()->back()->with('toast_success', 'Team deleted successfully');
    }
}
