
<div class="form-group">
    <label>
        <span class="label-text">Name</span><span class="text-danger">*</span>
        {{ Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Enter Item Name...']) }}

    </label>
</div>

<div class="form-group">
    <label>
        <span class="label-text">Company Name</span><span class="text-danger">*</span>
        {{ Form::select('company_id',$companies,null,['class'=>'form-control','id'=>'companyId','placeholder'=>'Select Company Name','required']) }}

    </label>
</div>


<div class="form-group">
    <label>
        <span class="label-text">Category Name</span><span class="text-danger">*</span>
        {{ Form::select('category_id',$categories,null,['class'=>'form-control','id'=>'categoryId','placeholder'=>'Select Category Name','required']) }}

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




