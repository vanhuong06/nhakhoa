<?php

namespace Modules\Appointment\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Doctor\Entities\Doctor;
use Modules\Patient\Entities\Patient;

class Appointment extends Model
{
    use Translatable;

    protected $casts = [
        'appointment_time' => 'datetime',
    ];
    protected $table = 'appointment__appointments';
    public $translatedAttributes = [];
    protected $fillable     = [
        'patient_id',
        'doctor_id',
        'appointment_time'
    ];

    public function patientss()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
    public function doctorss(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
