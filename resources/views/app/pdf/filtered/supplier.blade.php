<!DOCTYPE html>
<html lang="en">
<head>
    <title>@lang('Supplier Summary')</title>

    <style type="text/css">
        @page {
            margin-top: 1.2cm; 
            margin-bottom: 0.5cm;
            margin-left: 0.2cm; 
            margin-right: 0.2cm; 
            footer: page-footer;
        }
        table.pdf_table {
            width: 100%;
        }
        table.pdf_table th {
            font-weight: bold;
            background: #a6caf0;
        }
        table.pdf_table td, table.pdf_table th {
            border: 0.5px solid #ccc;
            font-size: 10px;
            text-align: center;
            padding: 2px;
        }
        div.company_details {
            text-align: center;
        }
        div.company_details div.header p.name {
            font-weight: bold;
            color: #555;
            font-size: 15px;
            margin-bottom: 0;
        }
        div.company_details div.header p.address {
            margin: 0px 0 8px;
            font-size: 12px;
            color: #555;
        }
        div.company_details div.header h2 {
            margin: 5px;
            text-transform: uppercase;
            color: #034b96;
            font-size: 18px;
        }
        div.company_details div.footer {
            border-top: 2px solid #227fe0;
        }
        div.company_details div.footer p {
            margin: 5px;
            font-size: 12px;
        }
    </style>

</head>
<body>

    <htmlpagefooter name="page-footer">
        <div style="font-size: 10px; color: #555; padding-bottom: 5px; text-align: center;">Page No. {PAGENO} of {nbpg}</div>
    </htmlpagefooter>

    <div style="padding: 25px 0 25px 0">
        @if(count($suppliers) > 0)
            <div class="company_details">
                    @if($suppliers[0]->company->logo_path)
                        <div style="position: absolute; width: 125px; max-height: 75px; left: 0;bottom:0;"><img id="logo" style="width: 100%" src="{{ $suppliers[0]->company->logo_path }}"></div>
                    @endif
                <div class="header" style="margin-top: -80px">

                    <p class="name">{{ $suppliers[0]->company->name }}</p>
                    
                    @if( $suppliers[0]->company->address->address_street_1)
                        <p class="address">{{ ucwords( $suppliers[0]->company->address->address_street_1) }}
                            {{ 
                                ! $suppliers[0]->company->address->city ? '' 
                                : (", ".ucwords( $suppliers[0]->company->address->city)) 
                            }}
                            {{ 
                                ! $suppliers[0]->company->address->state ? '' 
                                : (", ".ucwords( $suppliers[0]->company->address->state)) 
                            }}
                            {{
                                ! $suppliers[0]->company->address->country ? '' 
                                : (", ".ucwords( $suppliers[0]->company->address->country->code))
                            }}
                        </p>
                    @endif

                    <h2>@lang('Supplier Summary')</h2>
                </div>
                
            </div>
        @endif

        <table class="pdf_table" cellspacing="0">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>CR No</th>
                    <th>VAT No</th>
                    <th>Added On</th>
                </tr>
            </thead>
            <tbody>
                @php $sr_no = 1 @endphp
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $sr_no++ }}</td>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->phone }}</td>
                        <td>{{ $supplier->prefix }}</td>
                        <td>{{ $supplier->website }}</td>
                        <td>{{$supplier->formattedCreatedAt}}</td>                            
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>
</html>
