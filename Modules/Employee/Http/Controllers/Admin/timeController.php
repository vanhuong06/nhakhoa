<?php

namespace Modules\Employee\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Modules\Employee\Entities\Employee;
use Modules\Employee\Entities\time;
use Modules\Employee\Http\Requests\CreatetimeRequest;
use Modules\Employee\Http\Requests\UpdatetimeRequest;
use Modules\Employee\Repositories\timeRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class timeController extends AdminBaseController
{
    /**
     * @var timeRepository
     */
    private $time;

    public function __construct(timeRepository $time)
    {
        parent::__construct();

        $this->time = $time;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $times = $this->time->all();
        $test1 = DB::table('employee__employees')
            ->get();
        $test = Db::table('employee__times')
            ->select(DB::raw('count(attendance_time)  as total_time'), 'emp_id')
            ->groupby('emp_id')
            ->get()->toArray();

//        dd($test1);
        return view('employee::admin.times.index', compact('times', 'test','test1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
//        $employee = DB::table('employee__employees')
//            ->get();
//        dd(['employees' => Employee::all()]);die();
        return view('employee::admin.times.create')->with(['employees' => Employee::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatetimeRequest $request
     * @return Response
     */
    public function store(CreatetimeRequest $request)
    {
//        dd($request->all());

        if (isset($request->attd)) {
            foreach ($request->attd as $keys => $values) {
                foreach ($values as $key => $value) {
                    if ($employee = Employee::whereId(request('emp_id'))->first()) {
//                        dd($employee = Employee::whereId(request('emp_id'))->first()); die();
                        if (
                            !time::whereAttendance_time($keys)
                                ->whereEmp_id($key)
                                ->first()
                        )
                         {
                            $data = new time();

                            $data->emp_id = $key;
                            $emp_req = Employee::whereId($data->emp_id)->first();
//                            $data ->attendance_time = Carbon::now()->format('d-m-Y');
                            $data->attendance_time = $keys;
//                            dd($data);
                            // $emps = date('H:i:s', strtotime($employee->schedules->first()->time_in));
                            // if (!($emps >= $data->attendance_time)) {
                            //     $data->status = 0;

                            // }
                            $data->save();
                        }
                    }
                }
            }
        }
//        $this->time->create($request->all());

        return redirect()->route('admin.employee.time.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('employee::times.title.times')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  time $time
     * @return Response
     */
    public function edit(time $time)
    {
        return view('employee::admin.times.edit', compact('time'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  time $time
     * @param  UpdatetimeRequest $request
     * @return Response
     */
    public function update(time $time, UpdatetimeRequest $request)
    {
        $this->time->update($time, $request->all());

        return redirect()->route('admin.employee.time.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('employee::times.title.times')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  time $time
     * @return Response
     */
    public function destroy(time $time)
    {
        $this->time->destroy($time);

        return redirect()->route('admin.employee.time.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('employee::times.title.times')]));
    }
}
