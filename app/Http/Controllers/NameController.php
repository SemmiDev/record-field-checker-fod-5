<?php

namespace App\Http\Controllers;

use App\Import\NameImport;
use App\Import\WellImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class NameController extends Controller
{
    public function index()
    {
        $names = DB::table('names')->orderBy('name')->get();
        return view('name.index', compact('names'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:names',
        ]);

        DB::table('names')->insert($data);
        return redirect()->route('names.index')->with('toast_success', 'Name created successfully');
    }

    public function create() {
        return view('name.create');
    }

    public function edit($id)
    {
        $name = DB::table('names')->find($id);
        return view('name.edit', compact('name'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        DB::table('names')->where('id', $id)->update($data);
        return redirect()->route('names.index')->with('toast_success', 'Name updated successfully');
    }

    public function destroy($id)
    {
        DB::table('names')->delete($id);
        return redirect()->back()->with('toast_success', 'Name deleted successfully');
    }

    public function import() {
        return view('name.import');
    }

    public function importProcess(Request $request) {
        $file = $request->file('file-import');
        $extension = $file->getClientOriginalExtension();

        if ($extension == 'csv') {
            Excel::import(new NameImport, $file, null, \Maatwebsite\Excel\Excel::CSV);
        } else {
            Excel::import(new NameImport, $file, null, \Maatwebsite\Excel\Excel::XLSX);
        }

        return redirect()->route('names.index')->with('toast_success', 'Names imported successfully');
    }
}
