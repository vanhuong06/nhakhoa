<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;

class EmployeeTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'employee__employee_translations';
}
