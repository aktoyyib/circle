<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BloodPressureObservation;
use App\Models\Patients;
use App\Exports\BpoExport;
use Auth;
use Maatwebsite\Excel\Facades\Excel;

class BpoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $returns = [
            'page'  =>  'bpo',
            'user'  =>  $user,
        ];

        return view('bpo.index', $returns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patients::get();
        $returns = [
            'page' =>  'bpo',
            'patients' =>  $patients
        ];

        return view('bpo.create', $returns);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages =  [
            'patient_id.required'   =>  'Patient field is required',
            'observation.required'  =>  'Observation field is required'
        ];

        $this->validate($request, [
            'patient_id' => 'required',
            'observation' => 'required|in:High,Low,Medium',  
        ], $messages);
    
        $input = $request->all();  
    
        $bpo = BloodPressureObservation::create($input); 
    
        return redirect()->route('bpo.index')
                        ->with('success','Blood pressure observation recorded successfully');
    }

    public function export() 
    {
        return Excel::download(new BpoExport, 'bpo.xlsx');
    }

     
}
