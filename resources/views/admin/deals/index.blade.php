@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Deals</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('admin.deals.create') }}" class="btn btn-sm btn-outline-secondary">
                    Add New
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Deal Type</th>
                        <th>Products</th>
                        <th>Discount</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deals as $deal)
                        <tr>
                            <td>{{ $deal->id }}</td>
                            <td>{{ $deal->name }}</td>
                            <td>{{ ucfirst($deal->deal_type) }}</td>
                            <td>
                                @if ($deal->deal_type == 'discount')
                                    {{ $deal->product->name ?? '' }}
                                @elseif ($deal->deal_type == 'combo')
                                    @foreach ($deal->comboProducts() as $product)
                                        <span class="badge bg-secondary">{{ $product->name }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td>{{ $deal->discount_percentage }}%</td>
                            <td>{{ $deal->start_date?->format('Y-m-d') }}</td>
                            <td>{{ $deal->end_date?->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('admin.deals.edit', $deal->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.deals.destroy', $deal->id) }}" method="POST" style="display: inline-block;">
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
@endsection
