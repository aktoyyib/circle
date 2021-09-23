<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patients;

class SelectSearch extends Component
{
    public $selPatient = '';
    public $patients;

    public function mount()
    {
        $this->patients = Patients::all();
    }

    public function render()
    {

        return view('livewire.select-search')->extends('layouts.app');
    }
}
