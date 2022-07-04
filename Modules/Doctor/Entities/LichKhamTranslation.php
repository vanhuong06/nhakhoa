<?php

namespace Modules\Doctor\Entities;

use Illuminate\Database\Eloquent\Model;

class LichKhamTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'doctor__lichkham_translations';
}
