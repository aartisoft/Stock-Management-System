<script>
    $(function(){

        $('#editAdmin').click(function (event) {
            var password= $('#password').val();
            var confirmPassword= $('#confirmPassword').val();
            if(password != confirmPassword){
                event.preventDefault();
                $('#messageDiv').html('<span>Password mismatch</span>')
            }
        })

    })
</script>
