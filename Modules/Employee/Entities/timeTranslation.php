<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;

class timeTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'employee__time_translations';
}
