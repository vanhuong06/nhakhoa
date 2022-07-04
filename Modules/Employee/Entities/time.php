<?php

namespace Modules\Employee\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Employee\Entities\Employee;

class time extends Model
{
    use Translatable;

    protected $table = 'employee__times';
    public $translatedAttributes = [];
    protected $fillable = [
        'emp_id',
        'attendance_time'
    ];
    public function employees()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }
}
