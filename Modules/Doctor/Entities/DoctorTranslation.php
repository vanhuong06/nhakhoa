<?php

namespace Modules\Doctor\Entities;

use Illuminate\Database\Eloquent\Model;

class DoctorTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'doctor__doctor_translations';
}
