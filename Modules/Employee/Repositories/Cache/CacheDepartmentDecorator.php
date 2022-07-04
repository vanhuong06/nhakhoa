<?php

namespace Modules\Employee\Repositories\Cache;

use Modules\Employee\Repositories\DepartmentRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDepartmentDecorator extends BaseCacheDecorator implements DepartmentRepository
{
    public function __construct(DepartmentRepository $department)
    {
        parent::__construct();
        $this->entityName = 'employee.departments';
        $this->repository = $department;
    }
}
