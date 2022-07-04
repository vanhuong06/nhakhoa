<?php

namespace Modules\Invoice\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Doctor\Entities\Doctor;
use Modules\Patient\Entities\Patient;

class Invoice extends Model
{
    use Translatable;

    protected $table = 'invoice__invoices';
    public $translatedAttributes = [];
    protected $fillable = [];
    public function patientss()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
    public function doctorss(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
