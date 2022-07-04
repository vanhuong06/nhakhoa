<?php

namespace Modules\Employee\Repositories\Cache;

use Modules\Employee\Repositories\timeRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachetimeDecorator extends BaseCacheDecorator implements timeRepository
{
    public function __construct(timeRepository $time)
    {
        parent::__construct();
        $this->entityName = 'employee.times';
        $this->repository = $time;
    }
}
