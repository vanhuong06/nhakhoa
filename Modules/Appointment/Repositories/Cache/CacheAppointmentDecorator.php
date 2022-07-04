<?php

namespace Modules\Appointment\Repositories\Cache;

use Modules\Appointment\Repositories\AppointmentRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheAppointmentDecorator extends BaseCacheDecorator implements AppointmentRepository
{
    public function __construct(AppointmentRepository $appointment)
    {
        parent::__construct();
        $this->entityName = 'appointment.appointments';
        $this->repository = $appointment;
    }
}
