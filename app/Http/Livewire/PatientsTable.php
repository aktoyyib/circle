<?php

namespace App\Http\Livewire;

use Livewire\Component;  
use App\Models\Patients;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\TableComponent;

class PatientsTable extends TableComponent
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
            Column::make('ID')
                ->searchable()
                ->sortable(),
            Column::make('Name')
                ->searchable()
                ->sortable(),
            Column::make('Gender', 'gender')
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

