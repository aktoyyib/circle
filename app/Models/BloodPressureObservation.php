<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodPressureObservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id', 'observation'
    ];

    public function patient()
    {
        return $this->belongsTo('App\Models\Patients', 'patient_id');
    }

    protected $table = 'patients_blood_pressure_observations';
}
