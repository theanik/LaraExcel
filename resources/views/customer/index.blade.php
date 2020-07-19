@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Customer') }}</div>

                <div class="card-body">
                    <div class="row">
                        <a href="" class="btn btn-outline-primary">Export Customer</a>
                    </div>
                    <table class="table table-striped mt-3">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $item)
                              <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->address }}</td>
                              </tr>
                            @endforeach
                          
                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection