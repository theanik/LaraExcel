@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Customer') }}</div>

                <div class="card-body">
                    <div class="row">
                        <a href="{{ route('export_all') }}" class="btn btn-outline-primary">Export Customer All</a>
                        <a href="{{ route('export_view') }}" class="btn btn-outline-primary">Export Customer View</a>
                    </div>
                   
                    @include('customer.table', $customers);
                </div>
            </div>
        </div>
    </div>
</div>
@endsection