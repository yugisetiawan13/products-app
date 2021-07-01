@extends('layouts.app2')

@section('title','Products Add')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products') }}">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product Add</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6"><h4 class="card-title">Product Add</h4>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('products') }}" class="btn btn-warning btn-sm float-end">Back</a>
                    {{-- <form action="{{ route('category') }}" mehod="GET" class="float-end">
                        <h5 for="">Search</h5>
                        <input type="text" class="form-control" name="search" value="{{ request()->search }}">
                    </form> --}}
                </div>
            </div>
        </div>
        <form action="{{ route('products.store') }}" method="POST">
            <div class="card-body">
                <table class="table table-responsive" id="t_product">
                    <thead>
                        <tr>
                            <td>Product Name</td>
                            <td>Sku</td>
                            <td>Unit</td>
                            <td>Category</td>
                            <td width="10%">Price</td>
                            <td width="10%">Sell Price</td>
                            <td>Description</td>
                            <td><button type="button" class="btn btn-primary btn-sm" id="add_row"><i class="las la-plus"></i> Row</button></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="product_name[0]" placeholder="Name" id="product_name_0">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="sku[0]" placeholder="Code Product" id="sku_0">
                            </td>
                            <td>
                                <select name="unit_id[0]" id="unit_0" class="form-control">
                                    <option value="">--Select Unit--</option>
                                    @foreach ($unit as $u)
                                    <option value="{{ $u->id }}">{{ $u->unit_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="category_id[0]" id="category_0" class="form-control">
                                    <option value="">--Select Category--</option>
                                    @foreach ($category as $c)
                                    <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="price[0]" id="price_0" class="form-control" width="10%">
                            </td>
                            <td>
                                <input type="number" name="sale_price[0]" id="sale_price_0" class="form-control" width="10%">
                            </td>
                            <td>
                                <textarea name="description[0]" id="description_0" cols="1" rows="1" class="form-control"></textarea>
                            </td>
                            <td></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="d-grid">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-block btn md">Save <i class="las la-plus"></i></button>
                </div>
            </div>
        </form>
    </div>

@endsection

@push('custom-js')
<script>
    $(document).ready(function(){
        
        let count = 0;

        $('#add_row').on('click',function(){

            count += 1

            let html = `
                <tr>
                    <td>
                        <input type="text" class="form-control" name="product_name[${count}]" placeholder="Name" id="product_name_${count}">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="sku[${count}]" placeholder="Code Product" id="sku_${count}">
                    </td>
                    <td>
                        <select name="unit_id[${count}]" id="unit_${count}" class="form-control">
                            <option value="">--Select Unit--</option>
                            @foreach ($unit as $u)
                            <option value="{{ $u->id }}">{{ $u->unit_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="category_id[${count}]" id="category_${count}" class="form-control">
                            <option value="">--Select Category--</option>
                            @foreach ($category as $c)
                            <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" name="price[${count}]" id="price_${count}" class="form-control" width="10%">
                    </td>
                    <td>
                        <input type="number" name="sale_price[${count}]" id="sale_price_${count}" class="form-control" width="10%">
                    </td>
                    <td>
                        <textarea name="description[${count}]" id="description_${count}" cols="1" rows="1" class="form-control"></textarea>
                    </td>
                    <td><button type="button" class="btn btn-danger btn-md btn-delete"><i class="las la-times"></i></button></td>
                </tr>
            `


            $('#t_product tbody').append(html);

        })


        $('#t_product').on('click', '.btn-delete' , function(){
            $(this).closest('tr').remove()
        })

    })
</script>
@endpush