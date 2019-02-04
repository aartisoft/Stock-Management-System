@extends('admin.layouts.master')
@section('contentBody')
    <div class="panel" style="overflow:auto;">
        <!-- Records Header Start -->
        <div class="records--header">

            <div class="actions mx-auto">

                {{ Form::model(request(),['method'=>'get','class'=>'search flex-wrap flex-md-nowrap']) }}
                {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Category Name']) }}
                {{ Form::select('parent_id',$parents,null,['class'=>'form-control','placeholder'=>'Select Parent']) }}
                {{ Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control','placeholder'=>'Select Status']) }}
                <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                {{ Form::close() }}

                <a href="{{ route('category.create') }}" class="addProduct btn btn-lg btn-rounded btn-warning"><i class="fa fa-plus"></i> Add New Category</a>


            </div>
        </div>
        <!-- Records Header End -->
    </div>
    <div class="panel">
        <!-- Records List Start -->
        <div class="table-responsive">
            <h3 style="text-align: center;color:#1b4b72">Category List</h3>
            <table class="table table-striped custom-table m-b-0 datatable">

                <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Parent Name</th>
                    <th>Status</th>
                    <th class="not-sortable">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)

                    <tr>
                        <td>{{ $serial++}}</td>
                        <td>{{ $category->name }}</td>
                       <td>{{ $category->parent['name']?$category->parent['name']:'self'}}</td>
                        <td>{{ $category->status }}</td>

                        <td>
                            <div class="dropleft">
                                <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                <div class="dropdown-menu">

                                    <a href="{{ route('category.edit',$category->id) }}" class="dropdown-item">Edit</a>

                                    <a href="#" class="dropdown-item" onclick="return confirm('Delete All infromation from this record.')">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
            {{ $categories->links() }}


        </div>
        <!-- Records List End -->
    </div>

@endsection
