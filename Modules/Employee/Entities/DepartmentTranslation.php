<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;

class DepartmentTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'employee__department_translations';
}
