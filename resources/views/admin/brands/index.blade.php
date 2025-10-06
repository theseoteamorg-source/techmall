@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Brands</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">Add Brand</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($brands as $brand)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if($brand->logo)
                                                    <img src="{{ asset('storage/brands/' . $brand->logo) }}" alt="{{ $brand->name }}" width="100">
                                                @endif
                                            </td>
                                            <td>{{ $brand->name }}</td>
                                            <td>{{ $brand->slug }}</td>
                                            <td>
                                                <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this brand?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
