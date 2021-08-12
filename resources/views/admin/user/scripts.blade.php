<script>
$(function(){
    $("#departmentId").change(function(){
            var departmentId = $(this).val();
            var url = "{{url('admin/ajax_designation_by_id')}}"+'/'+departmentId;
            $.ajax({
                url:url,
                type:'GET',
                success:function(data){
                    $('#designationDiv').html(data);
                }
            });
    });

    $("#createUser").click(function(event){
            var password = $("#password").val();
            var confirmPassword = $("#confirmPassword").val();
            if(password != confirmPassword)
            {
                event.preventDefault();
                $("#message").html("<span>wrong password</span>");
            }
    });
});

</script>