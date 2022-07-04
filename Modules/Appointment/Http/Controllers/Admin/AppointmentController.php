<?php

namespace Modules\Appointment\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Appointment\Entities\Appointment;
use Modules\Appointment\Http\Requests\CreateAppointmentRequest;
use Modules\Appointment\Http\Requests\UpdateAppointmentRequest;
use Modules\Appointment\Repositories\AppointmentRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Doctor\Entities\Doctor;
use Modules\Patient\Entities\Patient;

class AppointmentController extends AdminBaseController
{
    /**
     * @var AppointmentRepository
     */
    private $appointment;

    public function __construct(AppointmentRepository $appointment)
    {
        parent::__construct();

        $this->appointment = $appointment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $appointments = $this->appointment->all();
        $patientss= Patient::all();
//        dd($patientss);die();

        return view('appointment::admin.appointments.index', compact('appointments', 'patientss'), ['doctorss' => Doctor::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
//        dd(['patientss' =>Patient::all()]);die();
        return view('appointment::admin.appointments.create', ['patientss' => Patient::all()], ['doctorss' => Doctor::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateAppointmentRequest $request
     * @return Response
     */
    public function store(CreateAppointmentRequest $request)
    {
//        dd($request->doctor_id);die();
//        $this->appointment->create($request->all());
        if(isset($request->doctor_id)){
            $data = new Appointment();
            $data->patient_id = $request->patient_id;
            $data->appointment_time = $request->appointment_time;
            $data->doctor_id = $request->doctor_id;
//            dd($data->save());
            $data->save();
        }


        return redirect()->route('admin.appointment.appointment.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('appointment::appointments.title.appointments')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Appointment $appointment
     * @return Response
     */
    public function edit(Appointment $appointment)
    {
        return view('appointment::admin.appointments.edit', compact('appointment'), ['patientss' => Patient::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Appointment $appointment
     * @param  UpdateAppointmentRequest $request
     * @return Response
     */
    public function update(Appointment $appointment, UpdateAppointmentRequest $request)
    {
        $this->appointment->update($appointment, $request->all());

        return redirect()->route('admin.appointment.appointment.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('appointment::appointments.title.appointments')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Appointment $appointment
     * @return Response
     */
    public function destroy(Appointment $appointment)
    {
        $this->appointment->destroy($appointment);

        return redirect()->route('admin.appointment.appointment.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('appointment::appointments.title.appointments')]));
    }
}
