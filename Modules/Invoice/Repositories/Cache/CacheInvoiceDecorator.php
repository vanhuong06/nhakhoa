<?php

namespace Modules\Invoice\Repositories\Cache;

use Modules\Invoice\Repositories\InvoiceRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheInvoiceDecorator extends BaseCacheDecorator implements InvoiceRepository
{
    public function __construct(InvoiceRepository $invoice)
    {
        parent::__construct();
        $this->entityName = 'invoice.invoices';
        $this->repository = $invoice;
    }
}
