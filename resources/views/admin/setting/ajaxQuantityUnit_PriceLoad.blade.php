<div class="form-group">
    <label>
        <span class="label-text">Available Quantity</span>
        {{ Form::number('available_quantity',$available_quantity,['class'=>'form-control','id'=>'availableQuantityId','readonly']) }}

    </label>
</div>

<div class="form-group">
    <label>
        <span class="label-text">Unit Price</span>
        {{ Form::number('unit_price',$unit_price,['class'=>'form-control','id'=>'unitPrice','step'=>'.01','readonly']) }}

    </label>
</div>
