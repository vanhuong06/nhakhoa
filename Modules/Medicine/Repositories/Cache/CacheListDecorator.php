<?php

namespace Modules\Medicine\Repositories\Cache;

use Modules\Medicine\Repositories\ListRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheListDecorator extends BaseCacheDecorator implements ListRepository
{
    public function __construct(ListRepository $list)
    {
        parent::__construct();
        $this->entityName = 'medicine.lists';
        $this->repository = $list;
    }
}
