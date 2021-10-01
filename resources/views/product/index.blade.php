@extends('layouts.dashboard')

@section('title', 'Product')
@section('home', route('product.index'))


@section('css')
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('d-content')
    <div class="row">
        <div class="col-12">
            @if(session()->has('message'))
            <div class="alert aler-danger">{{ session()->get('message') }}</div>
            @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Products</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name Arabic</th>
                                    <th>Name English</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Photo</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Detials Arabic</th>
                                    <th>Detials English</th>
                                    <th>Status</th>
                                    <th>Create At</th>
                                    <th>Update At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name_ar }}</td>
                                        <td>{{ $product->name_en }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td><img src="{{ $product->photo }}"></td>
                                        <td>{{ $product->subcategory()->first()->name_ar }}</td>
                                        <td>{{ $product->brand()->first()->name_ar }}</td>
                                        <td>{{ $product->detials_ar }}</td>
                                        <td>{{ $product->detials_ar }}</td>
                                        <td>{{ $product->status }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>{{ $product->updated_at }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <form action="{{ route('product.edit', $product->id ) }}" method="post">
                                                    <button class="btn btn-primary mr-1">Edit</button>
                                                </form>
                                                <form action="{{ route('product.delete', $product->id ) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection

