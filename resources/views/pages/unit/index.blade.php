@extends('layouts.app2')

@section('title','Unit')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Unit</li>
        </ol>
    </nav>

    @include('includes.notification')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6"><h4 class="card-title">Unit</h4>
                    <a href="{{ route('unit.add') }}" class="btn btn-primary btn-sm">+ Add </a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('unit') }}" mehod="GET" class="float-end">
                        <h5 for="">Search</h5>
                        <input type="text" class="form-control" name="search" value="{{ request()->search }}">
                    </form>
                </div>
            </div>
            
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Desctiption</th>
                    <th>Product Count</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ($units as $u)
                        <tr>
                            <td>{{ $u->unit_name }}</td>
                            <td>{{ $u->desc }}</td>
                            <td>{{ $u->products_count}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-success btn-sm btn-edit" href="{{ route('unit.edit',$u->id) }}">Edit</a>
                                    <a  class="btn btn-danger btn-sm btn-delete" href="{{ route('unit.delete',$u->id) }}">Delete</a>
                                </div>
                            </td>
                        </tr>   
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                No Data Here !!
                            </td>
                        </tr> 
                    @endforelse
                    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">
                            {{ $units->appends(['search' => request()->search ])->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    
@endsection