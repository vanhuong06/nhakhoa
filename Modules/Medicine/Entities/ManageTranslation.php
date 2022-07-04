<?php

namespace Modules\Medicine\Entities;

use Illuminate\Database\Eloquent\Model;

class ManageTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'medicine__manage_translations';
}
