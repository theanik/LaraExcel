@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Customer') }}</div>

                @if (session('message'))
                    <div class="alert alert-info">{{ session('message') }}</div>
                @endif

                <div class="card-body">
                    <div class="row">
                        <a href="{{ route('export_all') }}" class="btn btn-outline-primary">Export Customer All</a>
                        <a href="{{ route('export_view') }}" class="btn btn-outline-primary">Export Customer View</a>

                        <a href="{{ route('export_format', 'html') }}" class="btn btn-outline-primary">Export HTML</a>
                        <a href="{{ route('export_format', 'csv') }}" class="btn btn-outline-primary">Export CSV</a>
                        <a href="{{ route('export_format', 'Dompdf') }}" class="btn btn-outline-primary">Export PDF</a>

                        <a href="{{ route('exprot_multipe_sheets') }}" class="btn btn-outline-danger">Export Customer Multisheets</a>
                        <a href="{{ route('export_headings') }}" class="btn btn-outline-danger">Export with Headings</a>
                        
                        <a href="{{ route('export_customer_sale') }}" class="btn btn-outline-danger">Export Customer Sale</a>
                        <a href="{{ route('export_customer_sale_total') }}" class="btn btn-outline-success">Export Customer Sale Total</a>

                    </div>
                    <div class="row p-5">
                        <form action="{{ route('customer_import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="import" />
                            <button type="submit">Import Excel</button>
                        </form>
                    </div>
                   
                    @include('customer.table', $customers);
                </div>
            </div>
        </div>
    </div>
</div>
@endsection