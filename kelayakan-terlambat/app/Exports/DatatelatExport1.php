<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\Rayon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DatatelatExport1 implements FromCollection, WithHeadings
{
    protected $lates1;

    public function __construct()
    {
        $rayonIds = Rayon::where('user_id', Auth::user()->id)->pluck('id');
        $this->lates1 = Student::whereIn('rayon_id', $rayonIds)->get();
    }

    public function collection()
    {
        return Student::with(['rombel', 'rayon', 'lates'])
            ->whereIn('rayon_id', $this->lates1->pluck('rayon_id'))
            ->select('nis', 'name', 'rombel_id', 'rayon_id')
            ->withCount('lates') 
            ->get()
            ->map(function ($student) {
                return [
                    'NIS' => $student->nis,
                    'Nama' => $student->name,
                    'Rombel' => optional($student->rombel)->rombel, 
                    'Rayon' => optional($student->rayon)->rayon, 
                    'Total Keterlambatan' => $student->lates_count,
                ];
            });
    }

    public function headings(): array
    {
        return ['NIS', 'Nama', 'Rombel', 'Rayon', 'Total Keterlambatan'];
    }
}