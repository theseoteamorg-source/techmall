@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Currencies</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.currencies.create') }}" class="btn btn-primary">Add Currency</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Country</th>
                                <th>Currency Code</th>
                                <th>Currency Name</th>
                                <th>Exchange Rate</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($currencies as $currency)
                            <tr>
                                <td>{{ $currency->country }}</td>
                                <td>{{ $currency->currency_code }}</td>
                                <td>{{ $currency->currency_name }}</td>
                                <td>{{ $currency->exchange_rate }}</td>
                                <td>
                                    <a href="{{ route('admin.currencies.edit', $currency->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.currencies.destroy', $currency->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
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
