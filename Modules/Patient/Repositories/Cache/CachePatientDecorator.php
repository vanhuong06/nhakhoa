<?php

namespace Modules\Patient\Repositories\Cache;

use Modules\Patient\Repositories\PatientRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePatientDecorator extends BaseCacheDecorator implements PatientRepository
{
    public function __construct(PatientRepository $patient)
    {
        parent::__construct();
        $this->entityName = 'patient.patients';
        $this->repository = $patient;
    }
}
