<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;

class SalaryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'employee__salary_translations';
}
