<?php

namespace Modules\Medicine\Repositories\Cache;

use Modules\Medicine\Repositories\MedicineListRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheMedicineListDecorator extends BaseCacheDecorator implements MedicineListRepository
{
    public function __construct(MedicineListRepository $medicinelist)
    {
        parent::__construct();
        $this->entityName = 'medicine.medicinelists';
        $this->repository = $medicinelist;
    }
}
