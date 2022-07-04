<?php

namespace Modules\Doctor\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class LichKham extends Model
{
    use Translatable;

    protected $table = 'doctor__lichkhams';
    public $translatedAttributes = [];
    protected $fillable = [];
}
