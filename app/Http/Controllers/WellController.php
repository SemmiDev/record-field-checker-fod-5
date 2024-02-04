<?php

namespace App\Http\Controllers;

use App\Import\WellImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Import\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class WellController extends Controller
{
    public function index()
    {
        $wells = DB::table('wells')->get();
        return view('well.index', compact('wells'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:wells',
            'area' => 'nullable',
            'arse' => 'nullable',
        ]);

        DB::table('wells')->insert($data);

        return redirect()->route('wells.index')->with('toast_success', 'Well created successfully');
    }

    public function create()
    {
        return view('well.create');
    }

    public function edit($id)
    {
        $well = DB::table('wells')->find($id);

        if (!$well) {
            return redirect()->back()->with('error', 'Well not found');
        }

        return view('well.edit', compact('well'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'area' => 'nullable',
            'arse' => 'nullable',
        ]);

        $affected = DB::table('wells')->where('id', $id)->update($data);

        if ($affected === 0) {
            return redirect()->back()->with('error', 'Well not found');
        }

        return redirect()->route('wells.index')->with('toast_success', 'Well updated successfully');
    }

    public function destroy($id)
    {
        $deleted = DB::table('wells')->delete($id);

        if (!$deleted) {
            return redirect()->back()->with('error', 'Well not found');
        }

        return redirect()->back()->with('toast_success', 'Well deleted successfully');
    }

    public function import() {
        return view('well.import');
    }

    public function importProcess(Request $request) {
        $file = $request->file('file-import');
        $extension = $file->getClientOriginalExtension();

        if ($extension == 'csv') {
            Excel::import(new WellImport, $file, null, \Maatwebsite\Excel\Excel::CSV);
        } else {
            Excel::import(new WellImport, $file, null, \Maatwebsite\Excel\Excel::XLSX);
        }

        return redirect()->route('wells.index')->with('toast_success', 'Wells imported successfully');
    }
}
