<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patients;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $returns = [
            'page' =>  'patient' 
        ];

        return view('patients.index', $returns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $returns = [
            'page' =>  'patient' 
        ];

        return view('patients.create', $returns);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required|in:M,F',  
        ]);
    
        $input = $request->all();  
    
        $user = Patients::create($input); 
    
        return redirect()->route('patients.index')
                        ->with('success','Patient created successfully');
    }
 
}
