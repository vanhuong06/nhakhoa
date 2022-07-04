<?php

namespace Modules\Payment\Entities;

use Illuminate\Database\Eloquent\Model;

class PaymentTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'payment__payment_translations';
}
