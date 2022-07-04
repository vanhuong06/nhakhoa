<?php

namespace Modules\Invoice\Entities;

use Illuminate\Database\Eloquent\Model;

class InvoiceTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'invoice__invoice_translations';
}
