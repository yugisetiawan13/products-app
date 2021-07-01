@extends('layouts.app2')

@section('title','Unit Edit')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('unit') }}">unit</a></li>
            <li class="breadcrumb-item active" aria-current="page">Unit Edit</li>
            <li class="breadcrumb-item active" aria-current="page">{{ $units->id }}</li>
        </ol>
    </nav>

    @include('includes.notification')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6"><h4 class="card-title">unit Edit</h4>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('unit') }}" class="btn btn-warning btn-sm float-end">Back</a>
                    {{-- <form action="{{ route('category') }}" mehod="GET" class="float-end">
                        <h5 for="">Search</h5>
                        <input type="text" class="form-control" name="search" value="{{ request()->search }}">
                    </form> --}}
                </div>
            </div>
        </div>
        <form action="{{ route('unit.update',$units->id)}}" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Unit Name</label>
                    <input type="text" class="form-control @error('unit_name') is-invalid @enderror" id="unit_name" name="unit_name" value="{{ old('unit_name',$units->unit_name) }}" aria-describedby="emailHelp">
                    @error('unit_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Description</label>
                    <textarea name="desc" id="desc" cols="10" rows="10" value="" class="form-control @error('desc') is-invalid @enderror">{{ old('desc',$units->desc) }}</textarea>
                    @error('desc')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <div class="d-grid">'
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-warning btn-block btn md">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection