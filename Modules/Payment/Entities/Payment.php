<?php

namespace Modules\Payment\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Doctor\Entities\Doctor;
use Modules\Patient\Entities\Patient;

class Payment extends Model
{
    use Translatable;

    protected $table = 'payment__payments';
    public $translatedAttributes = [];
    protected $fillable = [
        'payment_code',
        'patient_id',
        'doctor_id',
        'payment_time',
        'payment_amount',
        'payment_method',
        'payment_status'
    ];

    public function patientss()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
    public function doctorss(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
