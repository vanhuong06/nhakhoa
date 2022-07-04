<?php

namespace Modules\Employee\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Modules\Employee\Entities\Department;
use Modules\Employee\Entities\Employee;
use Modules\Employee\Http\Requests\CreateDepartmentRequest;
use Modules\Employee\Http\Requests\UpdateDepartmentRequest;
use Modules\Employee\Repositories\DepartmentRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DepartmentController extends AdminBaseController
{
    /**
     * @var DepartmentRepository
     */
    private $department;

    public function __construct(DepartmentRepository $department)
    {
        parent::__construct();

        $this->department = $department;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $doctors = DB::table('employee__employees')
            ->where('employee_job', '=' , 'Bác sĩ')
            ->get();


        $departments = $this->department->all();

        return view('employee::admin.departments.index', compact('departments'));
    }

    public function getResult(Request $request)
    {
        if ($request->ajax()) {

            $results = Employee::select('employee_job')
                ->groupBy('employee_job')
                ->get();

            return response()->json($results);
        }
    }


    public function records(Request $request)
    {
        if ($request->ajax()) {
             if (request('res') === "Bác sĩ") {
                $employ = Employee::where('employee_job', '=', request('res'))
                    ->latest()
                    ->get();
            } else if(request('res') === "Y tá"){
                $employ = Employee::where('employee_job', '=', request('res'))
                    ->latest()
                    ->get();
            }else if(request('res') === "All"){
                 $employ = Db::table('employee__employees')
                     ->get();
             }


            return response()->json([
                'employ' => $employ
            ]);
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('employee::admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateDepartmentRequest $request
     * @return Response
     */
    public function store(CreateDepartmentRequest $request)
    {
        $this->department->create($request->all());

        return redirect()->route('admin.employee.department.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('employee::departments.title.departments')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Department $department
     * @return Response
     */
    public function edit(Department $department)
    {
        return view('employee::admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Department $department
     * @param  UpdateDepartmentRequest $request
     * @return Response
     */
    public function update(Department $department, UpdateDepartmentRequest $request)
    {
        $this->department->update($department, $request->all());

        return redirect()->route('admin.employee.department.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('employee::departments.title.departments')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Department $department
     * @return Response
     */
    public function destroy(Department $department)
    {
        $this->department->destroy($department);

        return redirect()->route('admin.employee.department.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('employee::departments.title.departments')]));
    }
}
