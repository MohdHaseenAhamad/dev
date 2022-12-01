<!DOCTYPE html>
<html>

<head>
    
    <title>@lang('Debit Note') - {{$invoice->debit_number}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style type="text/css">
        .blue_color{color: #00008B;}
        @page{
            margin-top: 140px;
        }   
        /* -- Base -- */
        body {
            font-family: "DejaVu Sans";
        }
        .arabic {
            font-family: "Lateef";
            font-size:13px;
            /*letter-spacing:1px;*/
        }
        html {
            margin: 0px;
            padding: 0px;
            margin-top: 50px;
        }

        .text-center {
            text-align: center
        }

        hr {
            margin: 0 30px 0 30px;
            color: rgba(0, 0, 0, 0.2);
            border: 0.5px solid #EAF1FB;
        }

        /* -- Header -- */

        .header-bottom-divider {
            color: rgba(0, 0, 0, 0.2);
            position: absolute;
            top: 90px;
            left: 0px;
            width: 100%;
        }

        .header-container {
            position: absolute;
            width: 100%;
            height: 90px;
            left: 0px;
            top: 40px;
        }

        .header-logo {
            margin-top: 10px;
            text-transform: capitalize;
            color: #00008B;
        }
        .letter-head{
            height: 120px;
            width:100%;
        }
        

        .header {
            font-size: 20px;
            color: rgba(0, 0, 0, 0.7);
        }

        .content-wrapper {
            width:100%;
            display: block;
            padding-top: 2px;
        }

        .company-address-container {
            padding-top: 15px;
            padding-left: 30px;
            float: left;
            width: 30%;
            margin-bottom: 2px;
        }

        .company-address-container h1 {
            font-size: 10px;
            line-height: 22px;
            letter-spacing: 0.05em;
            margin-bottom: 0px;
            margin-top: 10px;
        }

        .company-address {
            margin-top: 2px;
            text-align: left;
            font-size: 12px;
            line-height: 15px;
            color: #595959;
            width: 480px;
            word-wrap: break-word;
        }

        .invoice-details-container {
            float: right;
            padding: 10px 30px 0 0;
        }

        .attribute-label {
            font-size: 10px;
            line-height: 18px;
            padding-right: 40px;
            text-align: left;
            color: #55547A;
        }

        .attribute-value {
            font-size: 9px;
            line-height: 18px;
            text-align: right;
        }

        /* -- Billing -- */

        .billing-address-container {
            padding-top: 50px;
            float: left;
            width:100%;
            padding-left: 30px;
        }

        .billing-address-label {
            font-size: 10px;
            line-height: 18px;
            padding: 0px;
            margin-top: 27px;
            margin-bottom: 0px;
        }

        .billing-address-name {
            max-width: 160px;
            font-size: 9px;
            line-height: 15px;
            padding: 0px;
            margin: 0px;
        }

        .billing-address {
            font-size: 12px;
            line-height: 15px;
            color: #595959;
            padding: 45px 0px 0px 30px;
            margin: 0px;
            width: 160px;
            word-wrap: break-word;
        }

        /* -- Items Table -- */

        .items-table {
            padding: 0px 5px 10px 20px;
            page-break-before: avoid;
            word-break: break-word
            /*page-break-after: auto;*/
        }

        .items-table hr {
            height: 0.1px;
        }

        .item-table-heading {
            font-size: 9px;
            text-align: center;
            padding: 1px 5px 1px 5px;
        }

        tr.item-table-heading-row th {
            border-bottom: 0.620315px solid #E8E8E8;
            font-size: 9px;
            line-height: 14px;
        }

        tr.item-row td {
            font-size: 9px;
            /*line-height: 18px;*/
        }

        .item-cell {
            font-size: 9px;
            text-align: center;
            padding: 1px;
            color: #040405;
        }

        .item-description {
            color: #595959;
            font-size: 8px;
            line-height: 12px;
        }

        /* -- Total Display Table -- */

        .total-display-container {
            /*padding: 0 25px;*/
        }

        .total-display-table {
            border-top: none;
            page-break-inside: avoid;
            page-break-before: auto;
            /*page-break-after: auto;*/
        }

        .total-table-attribute-label {
            font-size: 9px;
            color: #000;
            text-align: left;
            padding-left: 10px;
        }

        .total-table-attribute-value {
            font-weight: bold;
            text-align: right;
            font-size: 9px;
            color: #040405;
            padding-right: 10px;
            padding-top: 1px;
            padding-bottom: 1px;
        }

        .total-border-left {
            border: 1px solid #E8E8E8 !important;
            border-right: 0px !important;
            padding-top: 0px;
            padding: 8px !important;
        }

        .total-border-right {
            border: 1px solid #E8E8E8 !important;
            border-left: 0px !important;
            padding-top: 0px;
            padding: 8px !important;
        }

        /* -- Notes -- */

        .notes {
            font-size: 9px;
            color: #595959;
            padding:5px 10px;
            width: 100%;
            text-align: left;
            page-break-inside: avoid;
            border:1px solid #E8E8E8;
        }

        .notes-label {
            font-size: 12px;
            line-height: 22px;
            letter-spacing: 0.05em;
            color: #040405;
            white-space: nowrap;
            height: 19.87px;
            padding-bottom: 10px;
        }

        /* -- Helpers -- */

        .text-primary {
            color: #5851DB;
        }

        .text-center {
            text-align: center
        }

        table .text-left {
            text-align: left;
        }

        table .text-right {
            text-align: right;
        }

        .border-0 {
            border: none;
        }
        .pb-2 {
            padding-top: 2px;
            padding-bottom: 2px;
        }

        .pb-8 {
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .pb-3 {
            padding: 3px 0;
        }
        .py-2 {
            padding-top: 2px;
            padding-bottom: 2px;
        }

        .py-8 {
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .py-3 {
            padding: 3px 0;
        }

        .pr-20{
            padding-right: 20px;
        }

        .pr-10 {
            padding-right: 10px;
        }

        .pl-20 {
            padding-left: 20px;
        }

        .pl-10 {
            padding-left: 10px;
        }

        .pl-0 {
            padding-left: 0;
        }
        .company_address h3{
            display:block;
            font-size: 13px;
            color: #595959;
            margin-bottom:15px;
        }
        .company_address p{
            line-height: 15px;
        }
        .company_address{
            font-size: 12px;
            color: #595959;
            margin-top: 0px;
            word-wrap: break-word;
            letter-spacing: 0.05em;
        }
        .invoice_static_top{
            text-transform:uppercase;
            width:100%;
            text-align:center;
            font-size:14px;
        }
        .invoice_no td{
            font-size:11px;
        }
        .custom_table{
            text-align:center;
        }
        .client_table, .custom_table,.bank_table,.items-table{
            border:1px solid #a9a8b1;
            font-size:9px;
            border-collapse:collapse;
            word-break: break-word
        }
        .background_client, .custom_table .tr_blue, .bank_table th, .item-table-heading{
            background-color:rgba(241,245,249,1);
        }
        .client_table td, .custom_table td, .bank_table td, .bank_table th{
            padding:1px 5px;
        }
        .price_table .border, .client_table .border, .custom_table .border, .bank_table .border, .items-table th, .items-table td{
            border:1px solid #a9a8b1;
            border-collapse:collapse;
        }
        .th_left{
            text-align:left;
        }
        .bottom_static{
            margin-top:-10px;
            text-align:center;
            /*position: fixed;*/
             font-size:11px;
    /*bottom: 0;*/
            width:100%;
        }
        
        @page {
            @if($letterhead)
                background: url({{$letterhead}}) no-repeat 0 0;
                background-image-resize: 6;
            @endif
                margin-top:<?php echo $invoice->upper_margin?>cm;
                margin-bottom:<?php echo $invoice->lower_margin?>cm;
        }
        
        .qr_code{
            height:140px;    
        }
    </style>
</head>

<body>
    @if($invoice->is_edit == '1') 
        <watermarktext content="DRAFT DEBIT NOTE" />
    @endif
    @php
        $customer_country_name = ($customer && $customer->address && $customer->address->country && $customer->address->country->name) ? $customer->address->country->name : 'N/A';

        $company_country_name = ($company->address && $company->address->country && $company->address->country->name) ? $company->address->country->name : 'N/A';
    @endphp

    <hr >
    <div class="invoice_static_top">
        <h3 class="blue_color">
            {{\Lang::get('Debit Note',[],'en')}} / {{\Lang::get('Debit Note',[],'ar')}}</span>
        </h3>
    </div>
    <hr>
    <!-- <hr class="header- -divider my-5" style="color:#E8E8E8;" /> -->
    <div>
        <table width=100% class="invoice_no">
            <tr >
                <td width="50%" colspan="1">{{\Lang::get('Debit Note No',[],'en')}}:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{$invoice->debit_number}}</span></td>
                <td dir="rtl"><span class="arabic" >{{\Lang::get('Debit Note No',[],'ar')}}:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{$invoice->debit_number}}</span></td>
            </tr>
        </table>
    </div>
    <div class="content-wrapper">
        <div width="100%" >
            <table class="client_table" width=100% >
                <tr>
                    <td  colspan="4" style="background:white;color:#00008B;"><strong>{{\Lang::get('Company Details',[],'en')}}</strong></td>
                    <td  colspan="4" dir="rtl" style="background:white;color:#00008B;"><strong><span class="arabic" >{{\Lang::get('Company Details',[],'ar')}}</span></strong><strong></td>
                </tr>
                <tr>
                    <td  class="border background_client" width="11%">{{\Lang::get('Name',[],'en')}}</td>
                    <td colspan="3" class="border">
                        <strong>{{$company_details['name'] ?? 'NA'}}</strong>
                    </td>

                    <td colspan="3" class="border " dir="rtl">
                        <strong><span class="arabic" >{{$company_details['name_ar'] ?? 'NA'}}</span></strong>
                    </td>
                    <td  class="border background_client" dir="rtl" width="11%"><span class="arabic" >{{\Lang::get('Name',[],'ar')}}</span></td>
                </tr>
                <tr>
                    <td  class="border background_client">{{\Lang::get('Street Name',[],'en')}}</td>
                    <td colspan="3" class="border">{{$company_details['address']['address_street_1'] ?? 'NA'}}</td>

                    <td colspan="3" class="border" dir="rtl"><span class="arabic" >{{$company_details['address_street_1_ar'] ?? 'NA'}}</span></td>
                    <td class="border background_client" dir="rtl"><span class="arabic" >{{\Lang::get('Street Name',[],'ar')}}</span></td>
                </tr>
                <tr>
                    <td  class="border background_client"  >{{\Lang::get('Building No',[],'en')}}</td>
                    <td class="border" width="16%">{{$company_details['address']['address_street_2'] ?? 'NA'}}</td>
                    <td class="border background_client" width="12%">{{\Lang::get('State/Province',[],'en')}}</td>
                    <td class="border" width="12%">{{$company_details['address']['state'] ?? 'NA'}}</td>

                    <td class="border" dir="rtl" width="12%"><span class="arabic" >{{$company_details['state_ar'] ?? 'NA'}}</span></td>
                    <td  dir="rtl" class="border background_client" width="12%"><span class="arabic" >{{\Lang::get('State/Province',[],'ar')}}</span></td>
                    <td class="border" dir="rtl" width="16%"><span class="arabic" >{{$company_details['address_street_2_ar'] ?? 'NA'}}</span></td>
                    <td  dir="rtl" class="border background_client"><span class="arabic" >{{\Lang::get('Building No',[],'ar')}}</span></td>
                </tr>
                <tr>
                    <td class="border background_client">{{\Lang::get('Country',[],'en')}}</td>
                    <td class="border">{{$company_country_name ?? 'NA'}}</td>
                    <td class="border background_client">{{\Lang::get('District',[],'en')}}</td>
                    <td class="border">{{$company_details['address']['city'] ?? 'NA'}}</td>

                    <td class="border" dir="rtl"><span class="arabic" >{{$company_details['city_ar'] ?? 'NA'}}</span></td>
                    <td class="border background_client" dir="rtl"><span class="arabic" >{{\Lang::get('District',[],'ar')}}</span></td>
                    <td class="border" dir="rtl"><span class="arabic" >{{\Lang::get($company_country_name,[],'ar') ?? 'NA'}}</span></td>
                      <td class="border background_client" dir="rtl"  ><span class="arabic" >{{\Lang::get('Country',[],'ar')}}</span></td>
                </tr>
                <tr>
                    <td  class="border background_client"  >{{\Lang::get('Postl Code',[],'en')}}</td>
                    <td class="border">{{$company_details['address']['zip'] ?? 'NA'}}</td>
                    <td  class="border background_client">{{\Lang::get('CR No',[],'en')}}</td>
                    <td class="border"><strong>{{$company_details['cr'] ?? 'NA'}}</strong></td>

                    <td class="border" dir="rtl"><strong><span class="arabic" >{{$company_details['cr_ar'] ?? 'NA'}}</span></strong></td>
                    <td class="border background_client" dir="rtl"><span class="arabic" >{{\Lang::get('CR No',[],'ar')}}</span></td>
                    <td class="border" dir="rtl"><span class="arabic" >{{$company_details['zip_ar'] ?? 'NA'}}</span></td>
                    <td  class="border background_client" dir="rtl"  ><span class="arabic" >{{\Lang::get('Postl Code',[],'ar')}}</span></td>
                </tr>
                <tr>
                    <td  class="border background_client"  >{{\Lang::get('VAT Number',[],'en')}}</td>
                    <td class="border"  colspan="3"><strong>{{$company_details['vat'] ?? 'NA'}}</strong></td>
                    <td class="border"  dir="rtl" colspan="3"><strong><span class="arabic" >{{$company_details['vat_ar'] ?? 'NA'}}</span></strong></td>
                    <td  class="border background_client" dir="rtl"  ><span class="arabic" >{{\Lang::get('VAT Number',[],'ar')}}</span></td>
                </tr>
            </table>
        </div>
        <hr style="color:black;height:3px;">
        <div width="100%" style="">
            <table class="client_table" width=100% >
                <tr>
                    <td  colspan="4" style="background:white;color:#00008B;"><strong>{{\Lang::get('Client Details',[],'en')}}</strong></td>
                    <td  colspan="4" dir="rtl" style="background:white;color:#00008B;"><strong><span class="arabic" >{{\Lang::get('Client Details',[],'ar')}}</span></strong></td>
                </tr>
                <tr>
                    <td class="border background_client" width="11%">{{\Lang::get('Name',[],'en')}}</td>
                    <td colspan="3" class="border">
                        <strong>
                            {{
                                $supplier_details['name'] ?? 'N/A'
                            }}
                        </strong>
                    </td>

                    <td colspan="3" dir="rtl" class="border">
                        <span class="arabic" >
                            <strong>
                                {{ $supplier_details['name_ar'] ?? 'N/A' }}
                            </strong>
                        </span>
                    </td>
                    <td dir="rtl" class="border background_client" width="11%"><span class="arabic" >{{\Lang::get('Name',[],'ar')}}</span></td>
                </tr>
                <tr>
                    <td class="border background_client">{{\Lang::get('Street Name',[],'en')}}</td>
                    <td colspan="3" class="border">{{$supplier_details['address']['address_street_1'] ?? 'NA'}}</td>

                    <td colspan="3" class="border" dir="rtl"><span class="arabic" >{{$supplier_details['address_street_1_ar'] ?? 'NA'}}</span></td>
                    <td class="border background_client" dir="rtl"><span class="arabic" >{{\Lang::get('Street Name',[],'ar')}}</span></td>
                </tr>
                <tr>
                    <td class="border background_client">{{\Lang::get('Building No',[],'en')}}</td>
                    <td class="border" width="16%">{{$supplier_details['address']['address_street_2'] ?? 'NA'}}</td>
                    <td class="border background_client" width="12%">{{\Lang::get('State/Province',[],'en')}}</td>
                    <td class="border" width="12%">{{$supplier_details['address']['state'] ?? 'NA'}}</td>

                    <td class="border" dir="rtl"  width="12%"><span class="arabic" >{{$supplier_details['state_ar'] ?? 'NA'}}</span></td>
                    <td class="border background_client"  width="12%" dir="rtl"><span class="arabic" >{{\Lang::get('State/Province',[],'ar')}}</span></td>
                    <td class="border" dir="rtl" width="16%"><span class="arabic" >{{$supplier_details['address_street_2_ar'] ?? 'NA'}}</span></td>
                    <td class="border background_client" dir="rtl"><span class="arabic" >{{\Lang::get('Building No',[],'ar')}}</span></td>
                </tr>
                <tr>
                    <td class="border background_client">{{\Lang::get('Country',[],'en')}}</td>
                    <td class="border">{{$customer_country_name ?? 'NA'}}</td>
                    <td class="border background_client">{{\Lang::get('District',[],'en')}}</td>
                    <td class="border">{{$supplier_details['address']['city'] ?? 'NA'}}</td>

                    <td class="border" dir="rtl"><span class="arabic" >{{$supplier_details['city_ar'] ?? 'NA'}}</span></td>
                    <td class="border background_client" dir="rtl"><span class="arabic" >{{\Lang::get('District',[],'ar')}}</span></td>
                    <td class="border" dir="rtl"><span class="arabic" >{{\Lang::get($customer_country_name,[],'ar') ?? 'NA'}}</span></td>
                    <td class="border background_client" dir="rtl"><span class="arabic" >{{\Lang::get('Country',[],'ar')}}</span></td>
                </tr>
                <tr>
                    <td class="border background_client">{{\Lang::get('Postl Code',[],'en')}}</td>
                    <td class="border">{{$supplier_details['address']['zip'] ?? 'NA'}}</td>
                    <td class="border background_client">{{\Lang::get('CR No',[],'en')}}</td>
                    <td class="border"><strong>{{$supplier_details['prefix'] ?? 'NA'}}</strong></td>

                    <td class="border" dir="rtl"><strong><span class="arabic" >{{$supplier_details['prefix_ar'] ?? 'NA'}}</span></strong></td>
                    <td class="border background_client" dir="rtl"><span class="arabic" >{{\Lang::get('CR No',[],'ar')}}</span></td>
                    <td class="border" dir="rtl"><span class="arabic" >{{$supplier_details['zip_ar'] ?? 'NA'}}</span></td>
                    <td class="border background_client" dir="rtl"><span class="arabic" >{{\Lang::get('Postl Code',[],'ar')}}</span></td>
                </tr>
                <tr>
                    <td class="border background_client">{{\Lang::get('VAT Number',[],'en')}}</td>
                    <td class="border" colspan="3"><strong>{{$supplier_details['website'] ?? 'NA'}}</strong></td>
                    <td class="border" colspan="3" dir="rtl"><strong><span class="arabic" >{{$supplier_details['website_ar'] ?? 'NA'}}</span></strong></td>
                    <td class="border background_client" dir="rtl"><span class="arabic" >{{\Lang::get('VAT Number',[],'ar')}}</span></td>
                    
                </tr>
            </table>
        </div>

        <hr style="color:black;height:3px;">

        <div width="100%">
            <table class="custom_table" width="100%">
                <tr class="tr_blue">
                    <th class="border" width="18%"><span class="arabic" >{{\Lang::get('Debit Note Date',[],'ar')}}</span><br>{{\Lang::get('Debit Note Date',[],'en')}}</th>

                    <th class="border" width="18%"><span class="arabic" >{{\Lang::get('Purchase Date',[],'ar')}}</span><br>{{\Lang::get('Purchase Date',[],'en')}}</th>

                    <th class="border" width="18%"><span class="arabic" >{{\Lang::get('Purchase No',[],'ar')}}</span><br>{{\Lang::get('Purchase No',[],'en')}}</th>

                    <th class="border" width="28%"><span class="arabic" >{{\Lang::get('Reason of Debit Note',[],'ar')}}</span><br>{{\Lang::get('Reason of Debit Note',[],'en')}}</th>

                    <th class="border" width="28%"><span class="arabic" >{{\Lang::get('Reference',[],'ar')}}</span><br>{{\Lang::get('Reference',[],'en')}}</th>

                </tr>
                <tr>
                    <td class="border">{{$invoice->formattedDebitDate}}</td>
                    <td class="border">{{$invoice->purchase->formattedPurchaseDate}}</td>
                    <td class="border">{{$invoice->purchase->purchase_no}}</td>
                    <td class="border">{{$invoice->reason ?? 'N/A'}}</td>
                    <td class="border">{{$invoice->reference_number ?? 'N/A'}}</td>
                </tr>

            </table>
        </div>
        <hr style="color:black;height:3px;">
        <div width="100%" >
            <table width="100%" class="items-table" cellspacing="0" border="0">
                <tr class="item-table-heading-row">
                    <th  class=" item-table-heading">#</th>
                    <th  class="item-table-heading text-left" width="25%"><span class="arabic" >{{\Lang::get('pdf_items_label',[],'ar')}}</span><br>{{\Lang::get('pdf_items_label',[],'en')}}</th>
                    <th class="item-table-heading"><span class="arabic" >{{\Lang::get('pdf_quantity_label',[],'ar')}}</span><br>{{\Lang::get('pdf_quantity_label',[],'en')}}</th>
                    <th class="item-table-heading" ><span class="arabic" >{{\Lang::get('Unit Of Measurement',[],'ar')}}</span><br>{{\Lang::get('Unit Of Measurement',[],'en')}}</th>
                    <th class="item-table-heading" width="10%"><span class="arabic" >{{\Lang::get('pdf_unit_price_label',[],'ar')}}</span><br>{{\Lang::get('pdf_unit_price_label',[],'en')}}
                        ({{$invoice->customer->currency->symbol}})</th>
                    <th class="item-table-heading" ><span class="arabic" >{{\Lang::get('pdf_amount_label',[],'ar')}}</span><br>{{\Lang::get('pdf_amount_label',[],'en')}}
                    ({{$invoice->customer->currency->symbol}})</th>
                    @if($invoice->discount_per_item === 'YES')
                    <th class="item-table-heading"><span class="arabic" >{{\Lang::get('pdf_discount_label',[],'ar')}}</span><br>{{\Lang::get('pdf_discount_label',[],'en')}}
                    ({{$invoice->customer->currency->symbol}})</th>
                    @else
                    <th class="item-table-heading"><span class="arabic" >{{\Lang::get('pdf_deduction_label',[],'ar')}}</span><br>{{\Lang::get('pdf_deduction_label',[],'en')}}
                    ({{$invoice->customer->currency->symbol}})</th>
                    @endif

                    <th class="item-table-heading" ><span class="arabic" >{{\Lang::get('tax_rate',[],'ar')}}</span><br>{{\Lang::get('tax_rate',[],'en')}}</th>

                    @if($invoice->tax_per_item === 'YES')
                    <th class="item-table-heading"><span class="arabic" >{{\Lang::get('pdf_tax_label',[],'ar')}}</span><br>{{\Lang::get('pdf_tax_label',[],'en')}}
                    ({{$invoice->customer->currency->symbol}})</th>
                    @endif
                    <th class="item-table-heading" ><span class="arabic" >{{\Lang::get('pdf_taxable_amount_label',[],'ar')}}</span><br>{{\Lang::get('pdf_taxable_amount_label',[],'en')}}
                    ({{$invoice->customer->currency->symbol}})</th>
                </tr>
                @php
                    $index = 1;
                    $item_discount = 0;
                    $items_price = 0;
                @endphp
                @foreach ($invoice->items as $item)
                    <tr class="item-row">
                        <td
                            class="item-cell"
                            style="vertical-align: middle;"
                        >
                            {{$index}}
                        </td>
                        <td
                            class="item-cell text-left"
                            style="vertical-align: middle;"
                        >
                            <span>{{$item->name}}</span><br>
                            <span class="item-description">{!! nl2br(htmlspecialchars($item->description)) !!}</span>
                        </td>
                        <td
                            class="item-cell"
                            style="vertical-align: middle;"
                        >
                            {{$item->quantity}}
                        </td>
                        <td
                            class="item-cell"
                            style="vertical-align: middle;"
                        >
                            @if($item->unit_name) {{$item->unit_name}} @else - @endif
                        </td>
                        <td
                            class="item-cell"
                            style="vertical-align: middle;"
                        >
                            {!! format_money_pdf($item->price, $invoice->customer->currency,false) !!}
                        </td>
                        <td
                            class="item-cell"
                            style="vertical-align: middle;"
                        >
                           {!! format_money_pdf($item->price*$item->quantity, $invoice->customer->currency,false) !!}
                        </td>
                        @if($invoice->discount_per_item === 'YES')
                            <td
                                class="item-cell"
                                style="vertical-align: middle;"
                            >
                                @if($item->discount_type === 'fixed')
                                        {!! format_money_pdf($item->discount_val, $invoice->customer->currency,false) !!}
                                    @endif
                                    @if($item->discount_type === 'percentage')
                                        {{$item->discount}}%
                                    @endif
                            </td>
                        @else

                            <td
                                class="item-cell"
                                style="vertical-align: middle;"
                            >
                                @if($item->discount_type === 'fixed')
                                        {!! format_money_pdf($item->discount_val, $invoice->customer->currency,false) !!}
                                    @endif
                                    @if($item->discount_type === 'percentage')
                                        {{$item->discount}}%
                                    @endif
                            </td>
                        @endif
                        <td
                            class="item-cell"
                            style="vertical-align: middle;"
                        >

                            {{count($item->taxes) > 0 ? ($item->taxes[0] ? $item->taxes[0]->percent : 15) : 15}}%
                        </td>

                        @if($invoice->tax_per_item === 'YES')
                            <td
                                class="item-cell"
                                style="vertical-align: middle;"
                            >
                                {!! format_money_pdf($item->tax, $invoice->customer->currency,false) !!}
                            </td>
                        @endif

                        <td
                            class="item-cell"
                            style="vertical-align: middle;"
                        >
                            {!! format_money_pdf($item->total, $invoice->customer->currency,false) !!}
                        </td>
                    </tr>
                    @php
                        $index += 1;
                        $item_discount = $item_discount + ($item->discount_val ?? 0);
                        $items_price = $items_price + $item->price * $item->quantity;
                    @endphp
                @endforeach
            </table>
        </div>
        <hr style="color:black;height:3px;">
        <div width="100%">
            <table width="100%" cellspacing="0px"  class="total-display-table price_table @if(count($invoice->items) > 12) page-break @endif">
                <tr>
                    <td class="border" rowspan="10" width="40%" style="text-align:center;text-transform: capitalize;font-size:10px;"><strong><span class="arabic" >{{\Lang::get('Amount in words',[],'ar')}}</span> / {{\Lang::get('Amount in words',[],'en')}}</strong>
                        <br><span class="arabic" >{{$total_amount_in_ar.' '.\Lang::get('only',[],'ar')}}</span> / <br> {{$total_amount_in_en}} only</td>
                    <td width="45%" class="border total-table-attribute-label"><span dir="rtl" class="arabic" >{{\Lang::get('pdf_subtotal_exc_tax',[],'ar')}}</span> / {{\Lang::get('pdf_subtotal_exc_tax',[],'en')}}</td>
                    <td width="15%" class="py-2 border item-cell total-table-attribute-value">
                        {!! format_money_pdf($items_price, $invoice->customer->currency) !!}
                    </td>
                </tr>

                
                        <tr>
                            <td class="border total-table-attribute-label">
                                 @if ($invoice->discount_per_item === 'NO')
                                    <span dir="rtl" class="arabic">{{\Lang::get('pdf_deduction_label',[],'ar')}}</span> / {{\Lang::get('pdf_deduction_label',[],'en')}}
                                @else
                                    <span dir="rtl" class="arabic">{{\Lang::get('pdf_discount_label',[],'ar')}}</span> / {{\Lang::get('pdf_discount_label',[],'en')}}
                                @endif
                                
                            </td>
                            <td class="py-2 border item-cell total-table-attribute-value" >
                                    {!! format_money_pdf($item_discount + $invoice->discount_val, $invoice->customer->currency) !!}
                                
                            </td>
                        </tr>
                <tr>
                    <td class="border  total-table-attribute-label">
                        <span dir="rtl" class="arabic" >{{\Lang::get('total_taxable_amount',[],'ar')}}</span><br> / {{\Lang::get('total_taxable_amount',[],'en')}}
                    </td>
                    <td
                        class="py-8 border item-cell total-table-attribute-value"
                        style="color: #00008B"
                    >
                        {!! format_money_pdf($invoice->sub_total, $invoice->customer->currency) !!}
                    </td>
                </tr>

                @if ($invoice->tax_per_item === 'YES')
                    @foreach ($taxes as $tax)
                        <tr>
                            <td class="border total-table-attribute-label">
                                <!-- {{$tax->name.' ('.$tax->percent.'%)'}} -->
                                <span dir="rtl" class="arabic" >{{\Lang::get('total_vat',[],'ar')}}</span> / {{\Lang::get('total_vat',[],'en')}} (15%)
                            </td>
                            <td class="py-2 border item-cell total-table-attribute-value">
                                {!! format_money_pdf($tax->amount, $invoice->customer->currency) !!}
                            </td>
                        </tr>
                    @endforeach
                @else
                    @foreach ($invoice->taxes as $tax)
                        <tr>
                            <td class="border total-table-attribute-label">
                                {{$tax->name.' ('.$tax->percent.'%)'}}
                            </td>
                            <td class="py-2 border item-cell total-table-attribute-value">
                                {!! format_money_pdf($tax->amount, $invoice->customer->currency) !!}
                            </td>
                        </tr>
                    @endforeach
                @endif

                
                <tr>
                    <td class="border  total-table-attribute-label">
                        <span dir="rtl" class="arabic" >{{\Lang::get('pdf_total_amount_due',[],'ar')}}</span> / {{\Lang::get('pdf_total_amount_due',[],'en')}}
                    </td>
                    <td
                        class="py-8 border item-cell total-table-attribute-value"
                        style="color: #00008B"
                    >
                        {!! format_money_pdf($invoice->total, $invoice->customer->currency)!!}
                    </td>
                </tr>
            </table>
        </div>
        <hr style="color:black;height:3px;">
        <div width="100%">
            <table class="custom_table" width="100%">
                <tr class="tr_blue">
                    <th class="border" width="40%"><span class="arabic" >{{\Lang::get('Prepared By',[],'ar')}}</span><br>{{\Lang::get('Prepared By',[],'en')}}</th>
                    <th class="border" width="40%" style="text-align:center; border-right: 0.5px solid #ccc;"><span class="arabic" >{{\Lang::get('Recieved By',[],'ar')}}</span><br>{{\Lang::get('Recieved By',[],'en')}}</th>
                    <td rowspan="8" class="border" width="20%" style="text-align:center; border-right: 0.5px solid #ccc;">
                        <img class="qr_code" src="{{ $qrcode }}" alt="Qr Code">
                    </td>
                </tr>
                <tr>
                    <td class="border" style="text-align:center">
                        @if($signature)
                            @if($signature_image)
                                <img class="header-logo" style="max-width: 95px; block;" src="{{ $signature_image }}" alt="prepared_by signature"><br>
                            @endif

                            <strong>{{$signature->name}}</strong><br>
                        @else
                            <br><br><br><br><br><br><br><br><br>
                        @endif
                    </td>
                    <td class="border" style="text-align:center;">
                        
                    </td>
                </tr>
            </table>
        </div>

        <hr style="color:black;height:3px;">
        @if($notes)
            <div class="notes">
                <div class="notes-label">
                    {!! $note_heading !!}
                </div>
                
                {!! $notes !!}
            </div>
        @endif

    </div>
</body>

</html>
