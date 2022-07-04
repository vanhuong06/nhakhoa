<?php

namespace Modules\Doctor\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Modules\Doctor\Entities\LichKham;
use Modules\Doctor\Http\Requests\CreateLichKhamRequest;
use Modules\Doctor\Http\Requests\UpdateLichKhamRequest;
use Modules\Doctor\Repositories\LichKhamRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class LichKhamController extends AdminBaseController
{
    /**
     * @var LichKhamRepository
     */
    private $lichkham;

    public function __construct(LichKhamRepository $lichkham)
    {
        parent::__construct();

        $this->lichkham = $lichkham;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $lichkhams = $this->lichkham->all();

        $workinghours= Db::table('doctor__doctors')->get();
        $test = $workinghours;


        return view('doctor::admin.lichkhams.index', compact( 'test'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('doctor::admin.lichkhams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateLichKhamRequest $request
     * @return Response
     */
    public function store(CreateLichKhamRequest $request)
    {
        $this->lichkham->create($request->all());

        return redirect()->route('admin.doctor.lichkham.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('doctor::lichkhams.title.lichkhams')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  LichKham $lichkham
     * @return Response
     */
    public function edit(LichKham $lichkham)
    {
        return view('doctor::admin.lichkhams.edit', compact('lichkham'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LichKham $lichkham
     * @param  UpdateLichKhamRequest $request
     * @return Response
     */
    public function update(LichKham $lichkham, UpdateLichKhamRequest $request)
    {
        $this->lichkham->update($lichkham, $request->all());

        return redirect()->route('admin.doctor.lichkham.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('doctor::lichkhams.title.lichkhams')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  LichKham $lichkham
     * @return Response
     */
    public function destroy(LichKham $lichkham)
    {
        $this->lichkham->destroy($lichkham);

        return redirect()->route('admin.doctor.lichkham.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('doctor::lichkhams.title.lichkhams')]));
    }
}
