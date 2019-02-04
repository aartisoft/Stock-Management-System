@extends('admin.layouts.master')
@section('contentBody')
    <div class="panel" style="overflow:auto;">
        <!-- Records Header Start -->
        <div class="records--header">
            <div class="col-sm-12 text-right m-b-30">
                <a href="{{ route('item.create') }}" class="addProduct btn btn-lg btn-rounded btn-warning"><i class="fa fa-plus"></i> Add New Item</a>
            </div>

            <div class="actions mx-auto">

                {{ Form::model(request(),['method'=>'get','class'=>'search flex-wrap flex-md-nowrap']) }}
                {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Item Name']) }}
                {{ Form::select('company_id',$companies,null,['class'=>'form-control','id'=>'companyId','placeholder'=>'Select Company Name']) }}
                {{ Form::select('category_id',$categories,null,['class'=>'form-control','id'=>'categoryId','placeholder'=>'Select Category Name']) }}
                {{ Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control','placeholder'=>'Select Status']) }}
                <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                {{ Form::close() }}


            </div>
        </div>
        <!-- Records Header End -->
    </div>
    <div class="panel">
        <!-- Records List Start -->
        <div class="table-responsive">
            <h3 style="text-align: center;color:#1b4b72">Item List</h3>
            <table class="table table-striped custom-table m-b-0 datatable">

                <thead>
                <tr>
                    <th>#</th>
                    <th>Item Name</th>
                    <th>Company Name</th>
                    <th>Category Name</th>
                    <th>Unit Price</th>
                    <th>Available Quantity</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th class="not-sortable">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($items as $item)
                    <tr>
                        <td>{{ $serial++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->relCompany->name }}</td>
                        <td>{{ $item->relCategory->name }}</td>
                        <td>{{ $item->unit_price }}</td>
                        <td>{{ $item->available_quantity }}</td>
                        <td>{{ $item->total_price }}</td>
                        <td>{{ $item->status }}</td>

                        <td>
                            <div class="dropleft">
                                <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                <div class="dropdown-menu">
                                    <a href="{{ route('item.edit',$item->id) }}" class="dropdown-item">Stock In/Edit</a>
                                    <a href="#" class="dropdown-item" onclick="return confirm('Delete All infromation from this record.')">Delete</a>

                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $items->links() }}



        </div>
        <!-- Records List End -->
    </div>

@endsection

