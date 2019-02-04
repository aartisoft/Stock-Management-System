<script>
    $(function(){

        $('#stockInId').change(function () {
            var available_quantity = $('#availableQuantityId').val();
            var stockInValue  = $('#stockInId').val();
            var data = parseInt(stockInValue) + parseInt(available_quantity);
            $('#availableQuantityId').val(data);

            var available_quantity = data;
            var unitPrice = $('#unitPrice').val();
            var data = parseFloat(unitPrice) * parseInt(available_quantity);
            $('#totalPrice').val(data);

        });

        $('#unitPrice').keyup(function (){
            var available_quantity = $('#availableQuantityId').val();
            var unitPrice = $('#unitPrice').val();
            var data = parseFloat(unitPrice) * parseInt(available_quantity);
            $('#totalPrice').val(data);
        });


    });
</script>
