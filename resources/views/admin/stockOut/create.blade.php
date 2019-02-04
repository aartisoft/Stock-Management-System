@extends('admin.layouts.master')
@section('contentBody')
    <div class="row gutter-20">
        <div class="col-md-8 mx-auto">
        {{ Form::open(['route'=>'stockOut.store']) }}
        <!-- Panel Start -->
            <div class="panel">
                <div class="panel-heading p-sm-4">
                    <h3 class="panel-title text-primary" style="font-size: 25px">Stock Out Form</h3>
                </div>
                @include('admin.layouts._validation_messages')

                <div class="panel-content">
                    @include('admin.stockOut._form')

                    <input type="submit" name="submit" value="Submit" id="submit" class="btn btn-sm btn-rounded btn-success"/>
                    <input type="reset" name="reset" value="Reset" class="btn btn-sm btn-rounded btn-danger" />

                </div>
            </div>
        {{ Form::close() }}
        <!-- Panel End -->
        </div>
    </div>
@endsection
@section('scripts')
    @include('admin.stockOut._scripts')
@endsection


