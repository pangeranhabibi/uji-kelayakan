<?php

namespace App\Exports;

use App\Models\lates;
use Maatwebsite\Excel\Concerns\FromCollection;
use  Maatwebsite\Excel\Concerns\WithHeadings;

class DatatelatExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection    
    */
    public function collection()
    {
        
        return lates::with('student')
        ->get()
        ->groupBy('student_id')
        ->map(function ($group) {
            $lates = $group->first(); 

            return [
                $lates->student->nis,
                $lates->student->name,
                $lates->student->rombel->rombel,
                $lates->student->rayon->rayon,
                $group->count()
            ];
        });
    
}

public function headings(): array {
    return [
        'NIS', 'Nama', 'Rombel', 'Rayon', 'Jumlah Keterlambatan'
    ];
}
}
