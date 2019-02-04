<script>
    $(function(){
        $('#companyId').change(function(){
            var companyId = $(this).val();
            var url = "{{url('ajaxCategoryLoadByCompanyId')}}" +"/"+ companyId;
            $.ajax({
                url:url,
                type:'GET',
                success: function(data){
                    $('#categoryId').html(data);
                }

            });

        });

        $('#categoryId').change(function(){
            var categoryId = $(this).val();
            var companyId = $('#companyId').val();
            var url = "{{url('ajaxItemLoadByCategoryId')}}" +"/"+ categoryId +"/"+ companyId;
            $.ajax({
                url:url,
                type:'GET',
                success: function(data){
                    $('#itemId').html(data);
                }

            });

        });

        $('#itemId').change(function(){
            var itemId = $(this).val();
            var url = "{{url('ajaxQuantityLoadByItemId')}}" +"/"+ itemId;
            $.ajax({
                url:url,
                type:'GET',
                success: function(data){
                    $('#availableQuantity').html(data);
                }

            });

        });

        var sum = 0;
        //var stockOutValue = '';

        $('#stockOutId').change(function(event){
            var availableQuantityId = $('#availableQuantityId').val();
            var stockOutValue  = $(this).val();
            if(availableQuantityId > 5){
                var data = availableQuantityId - stockOutValue;
                $('#availableQuantityId').val(data);
                sum =  parseInt(sum) + parseInt(stockOutValue);
                $('#stockOutId').val(sum);

                var unitPrice = $('#unitPrice').val();
                var data = parseFloat(unitPrice) * parseInt(sum);
                $('#totalPrice').val(data);
            }
            else{

                $('#messageStockIn').html('Item of Quantity is less than or equal 5.So Stock In First than Stock Out').css('color', 'red');
                $('#submit').click(function(event){
                    event.preventDefault();
                });

            }





        });

    });
</script>
