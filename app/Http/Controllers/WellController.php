<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
