<?php

namespace Modules\Payment\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;
use Modules\Doctor\Entities\Doctor;
use Modules\Patient\Entities\Patient;
use Modules\Payment\Entities\Payment;
use Modules\Payment\Http\Requests\CreatePaymentRequest;
use Modules\Payment\Http\Requests\UpdatePaymentRequest;
use Modules\Payment\Repositories\PaymentRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class PaymentController extends AdminBaseController
{
    /**
     * @var PaymentRepository
     */
    private $payment;

    public function __construct(PaymentRepository $payment)
    {
        parent::__construct();

        $this->payment = $payment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $payments = $this->payment->all();
        $doctorss = Doctor::all();
        return view('payment::admin.payments.index', compact('payments', 'doctorss'),  ['patientss' => Patient::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $patient_amount = Patient::all();
        $doctorss = Doctor::all();
        $stack = array();
        foreach ($patient_amount as $amount){
            $test = json_decode($amount->patient_amount, true);
            $sum = array_sum($test);
            array_push($stack, $sum);
        }
//        dd($stack);
        return view('payment::admin.payments.create',compact('stack','doctorss'), ['patientss' => Patient::all()] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePaymentRequest $request
     * @return Response
     */
    public function store(CreatePaymentRequest $request)
    {

        $this->payment->create($request->all());
//        dd($request->all());
        return redirect()->route('admin.payment.payment.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('payment::payments.title.payments')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Payment $payment
     * @return Response
     */
    public function edit(Payment $payment)
    {
        return view('payment::admin.payments.edit', compact('payment'), ['patientss' => Patient::all()], ['doctorss' => Doctor::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Payment $payment
     * @param  UpdatePaymentRequest $request
     * @return Response
     */
    public function update(Payment $payment, UpdatePaymentRequest $request)
    {
        $this->payment->update($payment, $request->all());

        return redirect()->route('admin.payment.payment.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('payment::payments.title.payments')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Payment $payment
     * @return Response
     */
    public function destroy(Payment $payment)
    {
        $this->payment->destroy($payment);

        return redirect()->route('admin.payment.payment.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('payment::payments.title.payments')]));
    }
}
