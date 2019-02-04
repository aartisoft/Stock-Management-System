@extends('admin.layouts.master')
@section('contentBody')
    <div class="row gutter-20">
        <div class="col-md-8 mx-auto">
        {{ Form::open(['route'=>['admin_settings.update'],'files'=>true]) }}
        <!-- Panel Start -->
            <div class="panel">
                <div class="panel-heading p-sm-4">
                    <h3 class="panel-title text-primary" style="font-size: 25px;">Admin Update Form</h3>
                </div>
                @include('admin.layouts._validation_messages')

                <div class="panel-content">

                    <div class="form-group">
                        <label>
                            <span class="label-text">Name</span><span class="text-danger">*</span>
                            {{ Form::text('name',$admin->name,['class'=>'form-control','placeholder'=>'Enter Admin Name','required']) }}

                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <span class="label-text">Contact Number</span><span class="text-danger">*</span>
                            {{ Form::text('contactNo',$admin->contactNo,['class'=>'form-control','required']) }}

                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <span class="label-text">Address</span>
                            {{ Form::textarea('address',$admin->address,['class'=>'form-control']) }}

                        </label>
                    </div>

                    <div class="form-group">
                        <label>
                            <span class="label-text">Email</span><span class="text-danger">*</span>
                            {{ Form::email('email',$admin->email,['class'=>'form-control','required']) }}

                        </label>
                    </div>

                    <div class="form-group">
                        <label>
                            <span class="label-text">Password</span>
                            {{ Form::password('password',['class'=>'form-control','id'=>'password' ]) }}

                        </label>
                    </div>
                    <div id="messageDiv" style="color: red"></div>
                    <div class="form-group">
                        <label>
                            <span class="label-text">Confirm Password</span>
                            {{ Form::password('password_confirmation',['class'=>'form-control','id'=>'confirmPassword']) }}

                        </label>
                    </div>

                    <div class="form-group">
                        <label>
                            <span class="label-text">Image</span>
                            {{ Form::file('image',['class'=>'form-control','placeholder'=>'Logo']) }}

                        </label>
                    </div>
                    <div class="form-group form-inline">
                        <label>
                            <span class="label-text">Status</span><span class="text-danger">* &nbsp;&nbsp;</span>
                            {{ Form::radio('status','Active',null,['required','checked']) }}
                            {{ Form::label('status1','Active') }}<span> &nbsp;&nbsp;</span>

                            {{ Form::radio('status','Inactive',null,['required']) }}
                            {{ Form::label('status2','Inactive') }}


                        </label>
                    </div>

                    <input type="submit" name="submit" value="Submit" id="editAdmin" class="btn btn-sm btn-rounded btn-success"/>
                    <input type="reset" name="reset" value="Reset" class="btn btn-sm btn-rounded btn-danger" />

                </div>
            </div>
        {{ Form::close() }}
        <!-- Panel End -->
        </div>
    </div>
@endsection
@section('scripts')
    @include('admin.adminSetting._scripts')
@endsection

