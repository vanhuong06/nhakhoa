<?php

namespace Modules\Employee\Repositories\Cache;

use Modules\Employee\Repositories\SalaryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSalaryDecorator extends BaseCacheDecorator implements SalaryRepository
{
    public function __construct(SalaryRepository $salary)
    {
        parent::__construct();
        $this->entityName = 'employee.salaries';
        $this->repository = $salary;
    }
}
