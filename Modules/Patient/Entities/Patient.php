<?php

namespace Modules\Patient\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Appointment\Entities\Appointment;

class Patient extends Model
{
    use Translatable;

    protected $cast=['patient_treaments'=>'array'];
    protected $table = 'patient__patients';
    public $translatedAttributes = [];
    protected $fillable = [
        'patient_code',
        'patient_id',
        'patient_name',
        'patient_dob',
        'patient_treaments',
        'patient_amount',
        'patient_address',
        'patient_phone'];

    public function appointmentss()
    {
        return $this->hasMany(Appointment::class, 'patient_code');
    }
}
