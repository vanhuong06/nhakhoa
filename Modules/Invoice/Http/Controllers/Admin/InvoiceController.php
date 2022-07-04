<?php

namespace Modules\Invoice\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Modules\Invoice\Entities\Invoice;
use Modules\Invoice\Http\Requests\CreateInvoiceRequest;
use Modules\Invoice\Http\Requests\UpdateInvoiceRequest;
use Modules\Invoice\Repositories\InvoiceRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Patient\Entities\Patient;

class InvoiceController extends AdminBaseController
{
    /**
     * @var InvoiceRepository
     */
    private $invoice;

    public function __construct(InvoiceRepository $invoice)
    {
        parent::__construct();

        $this->invoice = $invoice;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        $invoices = $this->invoice->all();
        $todayProfit = DB::table('payment__payments')
            ->whereDate('created_at', Carbon::today())
//            ->whereMonth('payment_time', '05')
//            ->whereYear('created_at', '2021')
            ->get();
        $monthProfit = DB::table('payment__payments')
            ->whereMonth('payment_time', Carbon::now()->format('m'))
            ->get();
        $month = $monthProfit->pluck('payment_amount')->toArray();
        $month_sum = array_sum($month);
        $invoices = $todayProfit;
        $test  = $todayProfit->pluck('payment_amount')->toArray();
        $invoice_sum = array_sum($test);
        $today = Carbon::now()->format('Y-m-d');
        $monthCurrent = Carbon::now()->format('m-Y');

        return view('invoice::admin.invoices.index', compact('invoices', 'invoice_sum', 'today', 'month_sum', 'monthCurrent'), ['patientss' => Patient::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('invoice::admin.invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateInvoiceRequest $request
     * @return Response
     */
    public function store(CreateInvoiceRequest $request)
    {
        $this->invoice->create($request->all());

        return redirect()->route('admin.invoice.invoice.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('invoice::invoices.title.invoices')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Invoice $invoice
     * @return Response
     */
    public function edit(Invoice $invoice)
    {
        return view('invoice::admin.invoices.edit', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Invoice $invoice
     * @param  UpdateInvoiceRequest $request
     * @return Response
     */
    public function update(Invoice $invoice, UpdateInvoiceRequest $request)
    {
        $this->invoice->update($invoice, $request->all());

        return redirect()->route('admin.invoice.invoice.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('invoice::invoices.title.invoices')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Invoice $invoice
     * @return Response
     */
    public function destroy(Invoice $invoice)
    {
        $this->invoice->destroy($invoice);

        return redirect()->route('admin.invoice.invoice.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('invoice::invoices.title.invoices')]));
    }
}
