<?php

namespace Modules\Medicine\Repositories\Cache;

use Modules\Medicine\Repositories\ManageRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheManageDecorator extends BaseCacheDecorator implements ManageRepository
{
    public function __construct(ManageRepository $manage)
    {
        parent::__construct();
        $this->entityName = 'medicine.manages';
        $this->repository = $manage;
    }
}
