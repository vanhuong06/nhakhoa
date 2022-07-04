<?php

namespace Modules\Doctor\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Doctor\Entities\Doctor;
use Modules\Doctor\Http\Requests\CreateDoctorRequest;
use Modules\Doctor\Http\Requests\UpdateDoctorRequest;
use Modules\Doctor\Repositories\DoctorRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DoctorController extends AdminBaseController
{
    /**
     * @var DoctorRepository
     */
    private $doctor;

    public function __construct(DoctorRepository $doctor)
    {
        parent::__construct();

        $this->doctor = $doctor;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $doctors = $this->doctor->all();

        return view('doctor::admin.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('doctor::admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateDoctorRequest $request
     * @return Response
     */
    public function store(CreateDoctorRequest $request)
    {
        $this->doctor->create($request->all());

        return redirect()->route('admin.doctor.doctor.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('doctor::doctors.title.doctors')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Doctor $doctor
     * @return Response
     */
    public function edit(Doctor $doctor)
    {
        return view('doctor::admin.doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Doctor $doctor
     * @param  UpdateDoctorRequest $request
     * @return Response
     */
    public function update(Doctor $doctor, UpdateDoctorRequest $request)
    {
        $this->doctor->update($doctor, $request->all());

        return redirect()->route('admin.doctor.doctor.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('doctor::doctors.title.doctors')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Doctor $doctor
     * @return Response
     */
    public function destroy(Doctor $doctor)
    {
        $this->doctor->destroy($doctor);

        return redirect()->route('admin.doctor.doctor.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('doctor::doctors.title.doctors')]));
    }
}
