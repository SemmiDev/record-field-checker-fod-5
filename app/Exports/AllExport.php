<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;

class AllExport implements WithMultipleSheets
{
    use Exportable;

    public function sheets(): array
    {
        $sheets = [];

        // Sheet untuk Adjust Stuffing Box
        $sheets[] = new class implements FromView, WithTitle {
            use Exportable;

            public function view(): View
            {
                return view('export.template', [
                    'names' => $this->getData('adjust_stuffing_box'),
                ]);
            }

            public function title(): string
            {
                return 'Rekap Adjust Stuffing Box';
            }

            private function getData($type)
            {
                $names = DB::table('names')->distinct()->get();

                foreach ($names as $name) {
                    $name->count = DB::table('checker_fods')
                        ->where('name_id', $name->id)
                        ->where($type, 1)
                        ->count() ?? 0;
                }

                return $names;
            }
        };

        // Sheet untuk Top Soil
        $sheets[] = new class implements FromView, WithTitle {
            use Exportable;

            public function view(): View
            {
                return view('export.template', [
                    'names' => $this->getData('top_soil'),
                ]);
            }

            public function title(): string
            {
                return 'Rekap Top Soil';
            }

            private function getData($type)
            {
                $names = DB::table('names')->distinct()->get();

                foreach ($names as $name) {
                    $name->count = DB::table('checker_fods')
                        ->where('name_id', $name->id)
                        ->where($type, 1)
                        ->count() ?? 0;
                }

                return $names;
            }
        };

        // Sheet untuk CSRB
        $sheets[] = new class implements FromView, WithTitle {
            use Exportable;

            public function view(): View
            {
                return view('export.template', [
                    'names' => $this->getData('csrb'),
                ]);
            }

            public function title(): string
            {
                return 'Rekap CRSB';
            }

            private function getData($type)
            {
                $names = DB::table('names')->distinct()->get();

                foreach ($names as $name) {
                    $name->count = DB::table('checker_fods')
                        ->where('name_id', $name->id)
                        ->where($type, 1)
                        ->count() ?? 0;
                }

                return $names;
            }
        };

        return $sheets;
    }
}
