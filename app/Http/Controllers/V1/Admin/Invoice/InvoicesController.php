<?php

namespace Crater\Http\Controllers\V1\Admin\Invoice;

use Crater\Http\Controllers\Controller;
use Crater\Http\Requests;
use Crater\Http\Requests\DeleteInvoiceRequest;
use Crater\Http\Resources\InvoiceResource;
use Crater\Jobs\GenerateInvoicePdfJob;
use Crater\Models\Invoice;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Invoice::class);
        $limit = $request->has('limit') ? $request->limit : 10;
        $invoices = Invoice::whereCompany()
            ->join('customers', 'customers.id', '=', 'invoices.customer_id')
            ->leftJoin('credits', 'credits.customer_sequence_number', '=', 'invoices.customer_sequence_number')
            ->whereOrder('invoices.invoice_date','desc')
            ->applyFilters($request->all())
            ->select('invoices.*', 'customers.name','credits.credit_number AS number','credits.id AS number_id')
            ->latest()
            ->paginateData($limit);
        return (InvoiceResource::collection($invoices))
            ->additional(['meta' => [
                'invoice_total_count' => Invoice::whereCompany()->count(),
            ]]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Requests\InvoicesRequest $request)
    {
        $this->authorize('create', Invoice::class);

        $invoice = Invoice::createInvoice($request);

        if ($request->has('invoiceSend')) {
            $invoice->send($request->subject, $request->body);
        }

        GenerateInvoicePdfJob::dispatch($invoice);

        return new InvoiceResource($invoice);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Crater\Models\Invoice $invoice
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, Invoice $invoice)
    {
        $this->authorize('view', $invoice);

        if($invoice->comp_name == '' || $invoice->cus_name == '' )
            $invoice = $invoice->updateCompanyDetails($request, $invoice);

        return new InvoiceResource($invoice);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Invoice $invoice
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Requests\InvoicesRequest $request, Invoice $invoice)
    {
        $this->authorize('update', $invoice);

        $invoice = $invoice->updateInvoice($request);

        if (is_string($invoice)) {
            return respondJson($invoice, $invoice);
        }

        GenerateInvoicePdfJob::dispatch($invoice, true);

        return new InvoiceResource($invoice);
    }

    /**
     * delete the specified resources in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(DeleteInvoiceRequest $request)
    {
        $this->authorize('delete multiple invoices');

        Invoice::destroy($request->ids);

        return response()->json([
            'success' => true,
        ]);
    }

    public function sentInvoicesNotInCredits(Request $request)
    {
        $this->authorize('viewAny', Invoice::class);

        $invoices = Invoice::whereCompany()
            ->leftJoin('credits', function($join) {
              $join->on('credits.invoice_id', '=', 'invoices.id');
            })->whereNull('credits.invoice_id')
            ->whereOrder('invoices.invoice_date','desc')
            ->applyFilters($request->all())
            ->select('invoices.*')
            ->get();

        // dd($invoices);

        return (InvoiceResource::collection($invoices))
        ->additional(['meta' => [
            'invoice_total_count' => Invoice::whereCompany()->count(),
        ]]);
    }
}
