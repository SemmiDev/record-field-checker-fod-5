<?php

use App\Http\Controllers\CheckerFodController;
use App\Http\Controllers\CheckerFodsController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\NameController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\WellController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $totalWells = DB::table('wells')->count();
    $totalNames = DB::table('names')->count();
    $totalTeams = DB::table('teams')->count();

    $checkfods = DB::table('checker_fods')
        ->join('wells', 'checker_fods.well_id', '=', 'wells.id')
        ->join('names', 'checker_fods.name_id', '=', 'names.id')
        ->join('teams', 'checker_fods.team_id', '=', 'teams.id')
        ->select('checker_fods.*', 'wells.name as well_name', 'names.name as name_name', 'teams.name as team_name')
        ->orderBy('checker_fods.created_at', 'desc')
        ->get();

    return view('dashboard', [
        'totalWells' => $totalWells,
        'totalNames' => $totalNames,
        'totalTeams' => $totalTeams,
        'checkfods' => $checkfods,
    ]);
})->name('dashboard');

Route::get('/names', [NameController::class, 'index'])->name('names.index');
Route::get('/names/create', [NameController::class, 'create'])->name('names.create');
Route::post('/names', [NameController::class, 'store'])->name('names.store');
Route::get('/names/{id}/edit', [NameController::class, 'edit'])->name('names.edit');
Route::put('/names/{id}', [NameController::class, 'update'])->name('names.update');
Route::delete('/names/{id}', [NameController::class, 'destroy'])->name('names.destroy');

Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
Route::get('/teams/{id}/edit', [TeamController::class, 'edit'])->name('teams.edit');
Route::put('/teams/{id}', [TeamController::class, 'update'])->name('teams.update');
Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');

Route::get('/wells', [WellController::class, 'index'])->name('wells.index');
Route::get('/wells/create', [WellController::class, 'create'])->name('wells.create');
Route::post('/wells', [WellController::class, 'store'])->name('wells.store');
Route::get('/wells/{id}/edit', [WellController::class, 'edit'])->name('wells.edit');
Route::put('/wells/{id}', [WellController::class, 'update'])->name('wells.update');
Route::delete('/wells/{id}', [WellController::class, 'destroy'])->name('wells.destroy');

Route::get('/checker-fods/create', [CheckerFodsController::class, 'create'])->name('checker-fods.create');
Route::post('/checker-fods', [CheckerFodsController::class, 'store'])->name('checker-fods.store');
Route::get('/checker-fods/{id}/edit', [CheckerFodsController::class, 'edit'])->name('checker-fods.edit');
Route::put('/checker-fods/{id}', [CheckerFodsController::class, 'update'])->name('checker-fods.update');
Route::delete('/checker-fods/{id}', [CheckerFodsController::class, 'destroy'])->name('checker-fods.destroy');

Route::get("/reports", [ReportController::class, 'index'])->name('reports.index');

Route::get("/exports", [ExportController::class, 'index'])->name('exports.index');
Route::get("/exports/exportAdjustStuffingBox", [ExportController::class, 'exportAdjustStuffingBox'])->name('exports.exportAdjustStuffingBox');
Route::get("/exports/exportTopSoil", [ExportController::class, 'exportTopSoil'])->name('exports.exportTopSoil');
Route::get("/exports/exportCsrb", [ExportController::class, 'exportCsrb'])->name('exports.exportCsrb');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/account', [AccountController::class, 'show'])->name('account.show');
//     Route::put('/account', [AccountController::class, 'update'])->name('account.update');
// });

require __DIR__ . '/auth.php';
