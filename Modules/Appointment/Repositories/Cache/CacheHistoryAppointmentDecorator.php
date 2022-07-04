<?php

namespace Modules\Appointment\Repositories\Cache;

use Modules\Appointment\Repositories\HistoryAppointmentRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheHistoryAppointmentDecorator extends BaseCacheDecorator implements HistoryAppointmentRepository
{
    public function __construct(HistoryAppointmentRepository $historyappointment)
    {
        parent::__construct();
        $this->entityName = 'appointment.historyappointments';
        $this->repository = $historyappointment;
    }
}
