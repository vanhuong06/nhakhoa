<?php

namespace Modules\Medicine\Repositories\Cache;

use Modules\Medicine\Repositories\DanhSachRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDanhSachDecorator extends BaseCacheDecorator implements DanhSachRepository
{
    public function __construct(DanhSachRepository $danhsach)
    {
        parent::__construct();
        $this->entityName = 'medicine.danhsaches';
        $this->repository = $danhsach;
    }
}
