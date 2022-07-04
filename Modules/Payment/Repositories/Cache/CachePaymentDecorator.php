<?php

namespace Modules\Payment\Repositories\Cache;

use Modules\Payment\Repositories\PaymentRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePaymentDecorator extends BaseCacheDecorator implements PaymentRepository
{
    public function __construct(PaymentRepository $payment)
    {
        parent::__construct();
        $this->entityName = 'payment.payments';
        $this->repository = $payment;
    }
}
