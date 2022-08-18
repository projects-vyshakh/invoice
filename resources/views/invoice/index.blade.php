@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Invoice: ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <p>Invoice No: {{ $invoiceNumber }}</p>
                    </div>

                    <div class="form-group"><strong>Customer Details</strong></div>
                    <div class="form-group">Name: {{ $customerDetails['name']}}</div>
                    <div class="form-group">Address: {{ $customerDetails['address']}}</div>

                    <div class="form-group">
                        <p>Lines:</p>
                    </div>

                    @if($lines)
                    <table>
                        <tr>
                            <th></th>
                        </tr>
                        <body>
                            @for ($i =0;  $i < count($lines); $i++)
                                <tr>
                                    <td>@php print_r($lines[$i]['description'])@endphp</td>
                                    <td>@php print_r($lines[$i]['quantity']).print_r('x').print_r($lines[$i]['rate']).print_r('=').print_r($lines[$i]['amount'])@endphp</td>
                                </tr>
                            @endfor

                        </body>
                    </table>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
