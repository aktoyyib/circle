<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\BloodPressureObservation;
use Maatwebsite\Excel\Concerns\FromCollection; 
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BpoExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BloodPressureObservation::with(['patient:id,name'])->get();
    }

    public function map($bpo) : array {
        return [
            $bpo->id,
            $bpo->patient->name,
            $bpo->observation,  
            Carbon::parse($bpo->created_at)->toFormattedDateString()
        ] ;
 
 
    }

    public function headings(): array
    {
        return [
            'S/N',
            'Patient',
            'Blood Pressure Observation', 
            'Date Observed'
        ];
    }
}
