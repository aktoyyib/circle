<?php

namespace App\Http\Livewire;

use Livewire\Component;  
use App\Models\Patients;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class PatientsTable extends DataTableComponent
{

    public function query() : Builder
    {
        // return Patient::with('role')
        //     ->withCount('permissions');
        return Patients::query();
    }

    public function columns() : array
    {
        return [
            Column::make('ID', 'id')
                ->searchable()
                ->sortable(),
            Column::make('Name', 'name')
                ->searchable()
                ->sortable(),
            Column::make('Gender', 'gender')
                ->searchable()
                ->sortable(),
            Column::make('Created On', 'created_at')
                ->sortable()
                ->format(function($value) {
                    return date('F d, Y', strtotime($value));
                }), 
            // Column::make('Action')
            //     ->sortable()
            //     ->format(function($value, $column, $row) {
            //         return view('patients.includes.actions')->withUser($row);
            //     }), 
        ];
    }
}

