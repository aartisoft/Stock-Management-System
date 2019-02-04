@extends('admin.layouts.master')
@section('contentBody')
    <div class="panel" style="overflow:auto;">
        <!-- Records Header Start -->
        <div class="records--header">

            <div class="actions mx-auto">

                {{ Form::model(request(),['method'=>'get','class'=>'search flex-wrap flex-md-nowrap']) }}
                {{ Form::select('item_id',$items,null,['class'=>'form-control','id'=>'itemId','placeholder'=>'Select Item']) }}
                {{ Form::date('start_date',null,['class'=>'form-control','placeholder'=>'Date']) }}
                {{ Form::date('end_date',null,['class'=>'form-control','placeholder'=>'Date']) }}
                <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                {{ Form::close() }}
                <a href="{{ route('stockOut.create') }}" class="addProduct btn btn-lg btn-rounded btn-warning">
                    <i class="fa fa-plus"></i>&nbsp;Stock Out</a>&nbsp;
                <a href="{{ route('stockOut.index','export') }}" class="addProduct btn btn-lg btn-rounded btn-success">Export</a>
            </div>
        </div>
        <!-- Records Header End -->
    </div>
    <div class="panel">
        <!-- Records List Start -->
        <div class="table-responsive">
            <h3 style="text-align: center;color:#1b4b72">Stock Out List</h3>
            <table class="table table-striped custom-table m-b-0 datatable">

                <thead>
                <tr>
                    <th>#</th>
                    <th>Item Name</th>
                    <th>Company Name</th>
                    <th>Category Name</th>
                    <th>Unit Price</th>
                    <th>Stock Out Quantity</th>
                    <th>Total Price</th>
                    <th>Product Status</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>

                @foreach($stockOuts as $stockOut)
                    <tr>
                        <td>{{ $serial++ }}</td>
                        <td>{{ $stockOut->relItem->name }}</td>
                        <td>{{ $stockOut->relCompany->name }}</td>
                        <td>{{ $stockOut->relCategory->name }}</td>
                        <td>{{ $stockOut->unit_price }}</td>
                        <td>{{ $stockOut->stockOut_quantity }}</td>
                        <td>{{ $stockOut->total_price }}</td>
                        <td>{{ $stockOut->product_status }}</td>
                        <td>{{ $stockOut->date }}</td>

                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $stockOuts->links() }}



        </div>
        <!-- Records List End -->
    </div>

@endsection
