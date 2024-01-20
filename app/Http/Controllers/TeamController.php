<?php

namespace App\Http\Controllers;

use App\Import\NameImport;
use App\Import\TeamImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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


    public function import() {
        return view('team.import');
    }

    public function importProcess(Request $request) {
        $file = $request->file('file-import');
        $extension = $file->getClientOriginalExtension();

        if ($extension == 'csv') {
            Excel::import(new TeamImport, $file, null, \Maatwebsite\Excel\Excel::CSV);
        } else {
            Excel::import(new TeamImport, $file, null, \Maatwebsite\Excel\Excel::XLSX);
        }

        return redirect()->route('teams.index')->with('toast_success', 'Teams imported successfully');
    }
}
