<?php

namespace Modules\Employee\Http\Controllers\Admin;

use App\Exports\EmpExport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Employee\Entities\Employee;
use Modules\Employee\Entities\Salary;
use Modules\Employee\Http\Requests\CreateSalaryRequest;
use Modules\Employee\Http\Requests\UpdateSalaryRequest;
use Modules\Employee\Repositories\SalaryRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class SalaryController extends AdminBaseController
{
    /**
     * @var SalaryRepository
     */
    private $salary;

    public function __construct(SalaryRepository $salary)
    {
        parent::__construct();

        $this->salary = $salary;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $salaries = $this->salary->all();

        return view('employee::admin.salaries.index', compact('salaries') , ['employees' => Employee::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        return view('employee::admin.salaries.create', ['employees' => Employee::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateSalaryRequest $request
     * @return Response
     */
    public function store(CreateSalaryRequest $request)
    {
        $this->salary->create($request->all());

        return redirect()->route('admin.employee.salary.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('employee::salaries.title.salaries')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Salary $salary
     * @return Response
     */
    public function edit(Salary $salary)
    {
        return view('employee::admin.salaries.edit', compact('salary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Salary $salary
     * @param  UpdateSalaryRequest $request
     * @return Response
     */
    public function update(Salary $salary, UpdateSalaryRequest $request)
    {
        $this->salary->update($salary, $request->all());

        return redirect()->route('admin.employee.salary.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('employee::salaries.title.salaries')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Salary $salary
     * @return Response
     */
    public function destroy(Salary $salary)
    {
        $this->salary->destroy($salary);

        return redirect()->route('admin.employee.salary.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('employee::salaries.title.salaries')]));
    }

    public function export()
    {
        return Excel::download(new EmpExport(), 'employee.xlsx');
    }
}
