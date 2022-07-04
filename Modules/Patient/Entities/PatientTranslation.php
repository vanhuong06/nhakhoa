<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class PatientTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'patient__patient_translations';
}
