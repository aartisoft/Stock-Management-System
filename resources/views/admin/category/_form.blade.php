
    <div class="form-group">
        <label>
            <span class="label-text">Name</span><span class="text-danger">*</span>
            {{ Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Enter Category Name...']) }}

        </label>
    </div>

   <div class="form-group">
        <label>
            <span class="label-text">Parent</span>
            <select name="parent_id" required="" class="form-control">
                <option value="0">Select Parent Name</option>
                @foreach($parents as $parent)
                <option value="{{$parent->id}}">{{$parent->name}}</option>
                @endforeach
            </select>
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



