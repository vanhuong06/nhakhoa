<?php

namespace Modules\Medicine\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Doctor\Entities\Doctor;
use Modules\Patient\Entities\Patient;

class Medicine extends Model
{
    use Translatable;

    protected $table = 'medicine__medicines';
    public $translatedAttributes = [];
    protected $fillable = [
        'medicine_code',
        'medicine_name',
        'medicine_price',
        'medicine_date',
        'medicine_option'
    ];

}
