<?php

namespace Crater\Http\Controllers\V1\Admin\Purchase;

use Crater\Http\Controllers\Controller;
use Crater\Http\Requests\SendInvoiceRequest;
use Crater\Models\Invoice;
use Illuminate\Mail\Markdown;

class SendPurchasePreviewController extends Controller
{
    /**
     * Mail a specific invoice to the corresponding customer's email address.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(SendInvoiceRequest $request, Invoice $invoice)
    {
        $this->authorize('send invoice', $invoice);

        $markdown = new Markdown(view(), config('mail.markdown'));

        return $markdown->render('emails.send.invoice', ['data' => $invoice->sendInvoiceData($request->all())]);
    }
}
