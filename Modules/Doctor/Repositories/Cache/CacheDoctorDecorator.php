<?php

namespace Modules\Doctor\Repositories\Cache;

use Modules\Doctor\Repositories\DoctorRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDoctorDecorator extends BaseCacheDecorator implements DoctorRepository
{
    public function __construct(DoctorRepository $doctor)
    {
        parent::__construct();
        $this->entityName = 'doctor.doctors';
        $this->repository = $doctor;
    }
}
