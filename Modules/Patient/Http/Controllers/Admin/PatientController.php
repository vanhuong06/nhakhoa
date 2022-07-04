<?php

namespace Modules\Patient\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Patient\Entities\Patient;
use Modules\Patient\Http\Requests\CreatePatientRequest;
use Modules\Patient\Http\Requests\UpdatePatientRequest;
use Modules\Patient\Repositories\PatientRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class PatientController extends AdminBaseController
{
    /**
     * @var PatientRepository
     */
    private $patient;

    public function __construct(PatientRepository $patient)
    {
        parent::__construct();

        $this->patient = $patient;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $patients = $this->patient->all();
        return view('patient::admin.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('patient::admin.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePatientRequest $request
     * @return Response
     */
    public function store(CreatePatientRequest $request)
    {
//        $this->patient->create($request->all());
        $input = ($request->all());
        $input['patient_treaments'] = json_encode($input['patient_treaments']);
        $input['patient_amount'] = json_encode($input['patient_amount']);
        $this->patient->create($input);
        return redirect()->route('admin.patient.patient.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('patient::patients.title.patients')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Patient $patient
     * @return Response
     */
    public function edit(Patient $patient)
    {
        $array = $patient->patient_treaments;
        $array1 = json_decode($array, true);



        return view('patient::admin.patients.edit', compact('patient', 'array1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Patient $patient
     * @param  UpdatePatientRequest $request
     * @return Response
     */
    public function update(Patient $patient, UpdatePatientRequest $request)
    {
//        $this->patient->update($patient, $request->all());
        $input = $request->all();

//        dd(json_encode($request->input('vic_treatments'))); hoat dong
        $test =json_encode($request->input('patient_treatments'));
        $test1 =json_encode($request->input('patient_amount'));

        if(isset($test)){
            $patient->patient_treaments = $test;
            $patient->patient_amount = $test1;
            $input['patient_treatments'] = json_encode($input['patient_treatments']);
            $input['patient_amount'] = json_encode($input['patient_amount']);
            $this->patient->update($patient, $input);
        }

        return redirect()->route('admin.patient.patient.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('patient::patients.title.patients')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Patient $patient
     * @return Response
     */
    public function destroy(Patient $patient)
    {
        $this->patient->destroy($patient);

        return redirect()->route('admin.patient.patient.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('patient::patients.title.patients')]));
    }
}
