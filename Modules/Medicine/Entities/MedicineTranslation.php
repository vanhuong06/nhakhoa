<?php

namespace Modules\Medicine\Entities;

use Illuminate\Database\Eloquent\Model;

class MedicineTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'medicine__medicine_translations';
}
