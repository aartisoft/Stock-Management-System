<div class="form-group">
    <label>
        <span class="label-text">Category Name</span><span class="text-danger">*</span>
        {{ Form::select('category_id',$categories,null,['class'=>'form-control','id'=>'categoryId','placeholder'=>'Select Category Name','required']) }}

    </label>
</div>



