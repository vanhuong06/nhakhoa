<?php

namespace Modules\Employee\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use Translatable;

    protected $table = 'employee__employees';
    public $translatedAttributes = [];
    protected $fillable = [
        'employee_code',
        'employee_address',
        'employee_name',
        'employee_phone',
        'employee_date',
        'employee_job',
        'employee_rank'
    ];

    public function time(){
        return $this->hasMany(time::class);
    }
}
