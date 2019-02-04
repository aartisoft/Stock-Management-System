
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

<div class="form-group">
    <label>
        <span class="label-text">Item Name</span><span class="text-danger">*</span>
        {{ Form::select('item_id',$items,null,['class'=>'form-control','id'=>'itemId','placeholder'=>'Select Item Name','required']) }}

    </label>
</div>

<div class="form-group" id="availableQuantity">
    <label>
        <span class="label-text">Available Quantity</span><span class="text-danger">*</span>
        {{ Form::number('available_quantity',null,['class'=>'form-control','id'=>'availableQuantityId','readonly','required']) }}

    </label>
</div>
<div class="form-group" id="messageStockIn">

</div>


<div class="form-group">
    <label>
        <span class="label-text">Stock Out Quantity</span><span class="text-danger">*</span>
        {{ Form::number('stockOut_quantity',null,['class'=>'form-control','id'=>'stockOutId','placeholder'=>'Enter Stock Out Quantity...','required']) }}

    </label>
</div>

<div class="form-group">
    <label>
        <span class="label-text">Total Price</span><span class="text-danger">*</span>
        {{ Form::number('total_price',null,['class'=>'form-control','id'=>'totalPrice','step'=>'.01','readonly','required']) }}

    </label>
</div>
<div class="form-group">
    <label>
        <span class="label-text">Date</span><span class="text-danger">*</span>
        {{ Form::date('date',null,['class'=>'form-control','required']) }}

    </label>
</div>
<div class="form-group form-inline">
    <label>
        <span class="label-text">Product Status</span><span class="text-danger">* &nbsp;&nbsp;</span>
        {{ Form::radio('product_status','Sell',null,['required','checked']) }}
        {{ Form::label('status1','Sell') }}<span> &nbsp;&nbsp;</span>

        {{ Form::radio('product_status','Damage',null,['required']) }}
        {{ Form::label('status2','Damage') }}<span> &nbsp;&nbsp;</span>

        {{ Form::radio('product_status','Lost',null,['required']) }}
        {{ Form::label('status3','Lost') }}


    </label>
</div>






