<?php

namespace Modules\Doctor\Repositories\Cache;

use Modules\Doctor\Repositories\LichKhamRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheLichKhamDecorator extends BaseCacheDecorator implements LichKhamRepository
{
    public function __construct(LichKhamRepository $lichkham)
    {
        parent::__construct();
        $this->entityName = 'doctor.lichkhams';
        $this->repository = $lichkham;
    }
}
