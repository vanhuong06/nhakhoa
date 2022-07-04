<?php

namespace Modules\Medicine\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Medicine\Entities\Medicine;
use Modules\Doctor\Entities\Doctor;
use Modules\Patient\Entities\Patient;

class Manage extends Model
{
    use Translatable;

    protected $table = 'medicine__manages';
    public $translatedAttributes = [];
    protected $fillable = [
        'manages_code',
        'manages_date',
        'patient_id',
        'doctor_id',
        'medicine_id',
    ];

    public function patientss()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
    public function doctorss(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
    public function mediciness(){
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }
}
