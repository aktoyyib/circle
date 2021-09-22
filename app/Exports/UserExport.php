<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UserExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function map($user) : array {
        return [
            $user->id,
            $user->firstname,
            $user->lastname,
            $user->email,  
            Carbon::parse($user->created_at)->toFormattedDateString()
        ] ;
 
 
    }

    public function headings(): array
    {
        return [
            'S/N',
            'First Name',
            'Last Name',
            'Email',
            'Date Registered'
        ];
    }
}
