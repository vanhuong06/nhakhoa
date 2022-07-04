<?php

namespace Modules\Employee\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Employee\Entities\Employee;

class Salary extends Model
{
    use Translatable;

    protected $table = 'employee__salaries';
    public $translatedAttributes = [];
    protected $fillable = [
        'emp_id',
        'salary_basic',
        'salary_bonus',
        'salary_cms',
        'salary_yt',
        'salary_xh',
        'salary_tn'
    ];

    public function employees()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }
}
