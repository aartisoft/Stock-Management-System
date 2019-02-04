@extends('admin.layouts.master')
@section('contentBody')
    <div class="row gutter-20">
        <div class="col-md-8 mx-auto">
        {{ Form::model($item,['route'=>['item.update',$item->id],'method'=>'PUT']) }}
        <!-- Panel Start -->
            <div class="panel">
                <div class="panel-heading p-sm-4">
                    <h3 class="panel-title text-primary" style="font-size: 25px">Item Stock In & Update Form</h3>
                </div>
                @include('admin.layouts._validation_messages')

                <div class="panel-content">
                    @include('admin.item._form2')

                    <input type="submit" name="submit" id="submitButton" value="Submit" class="btn btn-sm btn-rounded btn-success"/>
                    <input type="reset" name="reset" value="Reset" class="btn btn-sm btn-rounded btn-danger" />

                </div>
            </div>
        {{ Form::close() }}
        <!-- Panel End -->
        </div>
    </div>
@endsection
@section('scripts')
    @include('admin.item._scripts')
@endsection

