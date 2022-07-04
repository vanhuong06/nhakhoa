<?php

namespace Modules\Doctor\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use Translatable;

    protected $table = 'doctor__doctors';
    public $translatedAttributes = [];
    protected $fillable = [
        'doctor_name',
        'doctor_code',
        'doctor_dob',
        'doctor_address',
        'doctor_phone',
        'doctor_date',
        'start_time',
        'end_time'
    ];
    public function appointmentsss()
    {
        return $this->hasMany(Appointment::class, 'doctor_code');
    }
}
