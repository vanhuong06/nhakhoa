<?php

namespace Modules\Medicine\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Doctor\Entities\Doctor;
use Modules\Medicine\Entities\Manage;
use Modules\Medicine\Entities\Medicine;
use Modules\Medicine\Http\Requests\CreateManageRequest;
use Modules\Medicine\Http\Requests\UpdateManageRequest;
use Modules\Medicine\Repositories\ManageRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Patient\Entities\Patient;

class ManageController extends AdminBaseController
{
    /**
     * @var ManageRepository
     */
    private $manage;

    public function __construct(ManageRepository $manage)
    {
        parent::__construct();

        $this->manage = $manage;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $manages = $this->manage->all();

        return view('medicine::admin.manages.index', compact('manages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $doctorss = Doctor::all();
        $mediciness = Medicine::all();
        return view('medicine::admin.manages.create',  compact('mediciness', 'doctorss'),['patientss' => Patient::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateManageRequest $request
     * @return Response
     */
    public function store(CreateManageRequest $request)
    {
        $this->manage->create($request->all());

        return redirect()->route('admin.medicine.manage.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('medicine::manages.title.manages')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Manage $manage
     * @return Response
     */
    public function edit(Manage $manage)
    {
        return view('medicine::admin.manages.edit', compact('manage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Manage $manage
     * @param  UpdateManageRequest $request
     * @return Response
     */
    public function update(Manage $manage, UpdateManageRequest $request)
    {
        $this->manage->update($manage, $request->all());

        return redirect()->route('admin.medicine.manage.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('medicine::manages.title.manages')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Manage $manage
     * @return Response
     */
    public function destroy(Manage $manage)
    {
        $this->manage->destroy($manage);

        return redirect()->route('admin.medicine.manage.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('medicine::manages.title.manages')]));
    }
}
