@extends('layouts.app2')

@section('title','Unit Add')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('unit') }}">Unit</a></li>
            <li class="breadcrumb-item active" aria-current="page">Unit Edit</li>
        </ol>
    </nav>
    
    @include('includes.notification')
    
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6"><h4 class="card-title">Unit Add</h4>
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
        <form action="{{ route('unit.store')}}" method="POST">
            <div class="card-body"> 
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Unit Name</label>
                    <input type="text" class="form-control @error('unit_name') is-invalid @enderror" id="unit_name" name="unit_name" value="{{ old('unit_name') }}" aria-describedby="emailHelp">
                    @error('unit_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Description</label>
                    <textarea name="desc" id="desc" cols="10" rows="10" class="form-control @error('desc') is-invalid @enderror" >{{ old('desc') }}</textarea>
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
                    <button type="submit" class="btn btn-primary btn-block btn md">Save +</button>
                </div>
            </div>
        </form>
    </div>
@endsection