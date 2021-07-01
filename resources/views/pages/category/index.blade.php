@extends('layouts.app2')

@section('title','Category')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Category</li>
        </ol>
    </nav>


    @include('includes.notification')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6"><h4 class="card-title">Category</h4>
                    <a href="{{ route('category.add') }}" class="btn btn-primary btn-sm">+ Add</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('category') }}" mehod="GET" class="float-end">
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
                    @forelse ($categories as $c)
                        <tr>
                            <td>{{ $c->category_name }}</td>
                            <td>{{ $c->desc }}</td>
                            <td>{{ $c->products_count}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-success btn-sm btn-edit" href="{{ route('category.edit',$c->id) }}">Edit</a>
                                    <a class="btn btn-danger btn-sm btn-delete" href="{{ route('category.delete',$c->id) }}">Delete</a>
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
                            {{ $categories->appends(['search' => request()->search ])->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


    {{-- <div class="modal fade" tabindex="-1" id="modal_delete">
        <form action="{{ route('category.delete') }}" method="POST">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Hapus data {{ $categories->category_name }}</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </form>
    </div> --}}
@endsection

@push('custom-js')
    {{-- <script>
        $(document).ready(function(){
            $('.btn_delete').on('click' , function(){
                $('#modal_delete').modal('show')
            })
        })
    </script> --}}
@endpush