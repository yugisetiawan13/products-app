@extends('layouts.app2')

@section('title','Products')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6"><h4 class="card-title">Product</h4>
                    <a href="{{ route('products.add') }}" class="btn btn-primary btn-sm">+ Add</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('products') }}" mehod="GET" class="float-end">
                        <h5 for="">Search</h5>
                        <input type="text" class="form-control" name="search" value="{{ request()->search }}">
                    </form>
                </div>
            </div>
            
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Product Name</th>
                    <th>Unit</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Sales Price</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ($products as $val)
                        <tr>
                            <td>{{ $val->product_name }}</td>
                            <td>{{ $val->unit->unit_name }}</td>
                            <td>{{ $val->category->category_name}}</td>
                            <td>{{ $val->price}}</td>
                            <td>{{ $val->sales_price}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-success btn-sm btn-edit" href="{{ route('products.edit',$val['id']) }}">Edit</a>
                                   <form action="{{ route('products.delete', $val->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                       <button class="btn btn-danger btn-sm" type="submit">Delete</button> 
                                   </form>
                                </div>
                            </td>
                        </tr>   
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                No Data Here !!
                            </td>
                        </tr> 
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                       <td colspan="5">
                            {{ $products->appends(['search' => request()->search ])->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection