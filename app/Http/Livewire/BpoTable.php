<?php

namespace App\Http\Livewire;

use Livewire\Component;  
use App\Models\BloodPressureObservation;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class BpoTable extends DataTableComponent
{

    public function query() : Builder
    {
        // return Patient::with('role')
        //     ->withCount('permissions');
        return BloodPressureObservation::with('patient');
    }

    public function columns() : array
    {
        return [
            Column::make('ID', 'id')
                ->searchable()
                ->sortable(),
            Column::make('Patient Name', 'patient.name')
                ->searchable()
                ->sortable(),
            Column::make('Observation', 'observation')
                ->searchable()
                ->sortable(),
            // Column::make('Role', 'role.name')
            //     ->searchable()
            //     ->sortable(),
            // Column::make('Permissions', 'permissions_count')
            //     ->sortable(),
            // Column::make('Actions')
            //     ->view('backend.auth.user.includes.actions'),
        ];
    }
}

