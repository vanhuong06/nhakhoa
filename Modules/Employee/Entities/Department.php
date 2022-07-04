<?php

namespace Modules\Employee\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use Translatable;

    protected $table = 'employee__departments';
    public $translatedAttributes = [];
    protected $fillable = [];
}
