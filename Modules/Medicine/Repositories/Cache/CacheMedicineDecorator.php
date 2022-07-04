<?php

namespace Modules\Medicine\Repositories\Cache;

use Modules\Medicine\Repositories\MedicineRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheMedicineDecorator extends BaseCacheDecorator implements MedicineRepository
{
    public function __construct(MedicineRepository $medicine)
    {
        parent::__construct();
        $this->entityName = 'medicine.medicines';
        $this->repository = $medicine;
    }
}
