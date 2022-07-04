<?php

namespace Modules\Medicine\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Medicine\Entities\Medicine;
use Modules\Medicine\Http\Requests\CreateMedicineRequest;
use Modules\Medicine\Http\Requests\UpdateMedicineRequest;
use Modules\Medicine\Repositories\MedicineRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class MedicineController extends AdminBaseController
{
    /**
     * @var MedicineRepository
     */
    private $medicine;

    public function __construct(MedicineRepository $medicine)
    {
        parent::__construct();

        $this->medicine = $medicine;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $medicines = $this->medicine->all();

        return view('medicine::admin.medicines.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('medicine::admin.medicines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateMedicineRequest $request
     * @return Response
     */
    public function store(CreateMedicineRequest $request)
    {
        $this->medicine->create($request->all());

        return redirect()->route('admin.medicine.medicine.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('medicine::medicines.title.medicines')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Medicine $medicine
     * @return Response
     */
    public function edit(Medicine $medicine)
    {
        return view('medicine::admin.medicines.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Medicine $medicine
     * @param  UpdateMedicineRequest $request
     * @return Response
     */
    public function update(Medicine $medicine, UpdateMedicineRequest $request)
    {
        $this->medicine->update($medicine, $request->all());

        return redirect()->route('admin.medicine.medicine.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('medicine::medicines.title.medicines')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Medicine $medicine
     * @return Response
     */
    public function destroy(Medicine $medicine)
    {
        $this->medicine->destroy($medicine);

        return redirect()->route('admin.medicine.medicine.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('medicine::medicines.title.medicines')]));
    }
}
