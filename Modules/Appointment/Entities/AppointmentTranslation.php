<?php

namespace Modules\Appointment\Entities;

use Illuminate\Database\Eloquent\Model;

class AppointmentTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'patient_id'
    ];
    protected $table = 'appointment_translations';
}
