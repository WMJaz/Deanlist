
<script>
      // View
      $.ajax({
            url: "./controller/index.php",
            type: "POST",
            cache: false,
            success: function(data){
                $('#dataTable').html(data); 
            }
        });

    $(document).ready(function() {
        $('#myTable').DataTable();

        // SAVE
        $('#save').on('click', function() {
            var firstName = $('#firstName').val();
            var lastName = $('#lastName').val();
            var user_email = $('#user_email').val();
            var user_password = $('#user_password').val();
            var user_type = $('#user_type').val();
            var curriculum = $('#curriculum').val();


            if(firstName!="" && lastName!="" && user_email!="" && user_password!="" && user_type!="" && curriculum!=""){
                $.ajax({
                    url: "./controller/store.php",
                    type: "POST",
                    data: {
                        firstName: firstName,
                        lastName: lastName,
                        user_email: user_email,
                        user_password: user_password,
                        user_type: user_type,	
                        curriculum: curriculum,		
                    },
                    cache: false,
                    
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        if(dataResult.statusCode == 200){
                            $('#formAdd').find('input:text, select').val('');
                            $('#addModal').modal('hide');
                            $("#success").show();
                            $('#success').html('Data added successfully !'); 						
                        }
                        else if(dataResult.statusCode == 201){
                            alert("Error occured !");
                        }
                        
                    }
                });
            }
            else{
                alert('Please fill all the field !');
            }
        });


        //Update
        $(function () {
            $('#editModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); /*Button that triggered the modal*/
                var firstName   = button.data('firstname');
                var lastName    = button.data('lastname');
                var user_email  = button.data('user_email');
                var user_type   = button.data('user_type');
                var curriculum  = button.data('curriculum');       
                var user_status = button.data('user_status');
                var user_id     = button.data('user_id');
                var curriculum  = button.data('curriculum');
                
                var modal = $(this);
                modal.find('#firstName').val(firstName);
                modal.find('#lastName').val(lastName);
                modal.find('#user_email').val(user_email);
                modal.find('#user_type').val(user_type);
                modal.find('#curriculum').val(curriculum);        
                modal.find('#user_status').val(user_status);
                modal.find('#user_id').val(user_id);
                modal.find('#curriculum').val(curriculum);
            });
        });

        $(document).on("click", "#update", function() { 
            $.ajax({
                url: "./controller/update.php",
                type: "POST",
                cache: false,
                data:{
                    user_id: $('#user_id').val(),
                    curriculum: $('#editModal #curriculum').val(),
                    user_type: $('#editModal #user_type').val(),
                    user_status: $('#editModal #user_status').val(),
                },
                success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode == 200) {
                        $('#editModal').modal().hide();
                        $("#success").show();
                        $('#success').html('Data updated successfully !'); 
                        location.reload();					
                    } else if(dataResult.statusCode == 201) {
                        alert("Error occured !");
                    }
                }
            });
        }); 


        // Delete
        $(function () {
            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); /*Button that triggered the modal*/
                var user_id     = button.data('user_id');
                
                var modal = $(this);
                modal.find('#user_id').val(user_id);
            });
        });

        $(document).on("click", "#delete", function() { 
            var $ele = $(this).parent().parent();
            $.ajax({
                url: "./controller/destroy.php",
                type: "POST",
                cache: false,
                data:{
                    user_id: $('#user_id').val(),
                },
                success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        $('#deleteModal').modal().hide();
                        $("#success").show();
                        $('#success').html('Data deleted successfully!'); 
                        location.reload();
                    }
                }
            });
        });
    });
</script>