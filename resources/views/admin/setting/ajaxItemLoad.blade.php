
<div class="form-group">
    <label>
        <span class="label-text">Item Name</span><span class="text-danger">*</span>
        {{ Form::select('item_id',$items,null,['class'=>'form-control','id'=>'itemId','placeholder'=>'Select Item Name','required']) }}

    </label>
</div>
