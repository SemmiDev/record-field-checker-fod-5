<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
