<?php

namespace App\Http\Livewire;

use Livewire\Component;  
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class UsersTable extends DataTableComponent
{

    public function query() : Builder
    {
        // return User::with('role')
        //     ->withCount('permissions');
        return User::query();
    }

    public function columns() : array
    {
        return [
            Column::make('ID')
                ->searchable()
                ->sortable(),
            Column::make('First Name', 'firstname')
                ->searchable()
                ->sortable(),
                Column::make('LastName', 'lastname')
                ->searchable()
                ->sortable(),
            Column::make('E-mail', 'email')
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

