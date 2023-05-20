
<script>
      // View
      $.ajax({
            url: "../controller/subject/index.php",
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
            var subject_id      = $('#subject_id').val();
            var subject_code    = $('#subject_code').val();
            var subject_name    = $('#subject_name').val();
            var semester        = $('#semester').val();
            var curriculum      = $('#curriculum').val();
            var year_level      = $('#year_level').val();
            var unit_lec	    = $('#unit_lec').val();
            var unit_lab	    = $('#unit_lab').val();
            var pre_req         = $('#pre_req').val();



            if(subject_id!="" && subject_code!="" && subject_name!="" && semester!="" && curriculum!="" && year_level!="" && unit_lec!="" && unit_lab!="" && pre_req!=""){
                $.ajax({
                    url: "../controller/subject/store.php",
                    type: "POST",
                    data: {
                        subject_id: subject_id,
                        subject_code: subject_code,
                        subject_name: subject_name,
                        semester: semester,
                        curriculum: curriculum,		
                        year_level: year_level,		
                        unit_lec: unit_lec,	
                        unit_lab: unit_lab,	
                        pre_req: pre_req,
                    },
                    cache: false,
                    
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        if(dataResult.statusCode == 200){
                            $('#formAdd').find('input:text, select').val('');
                            $('#addModal').modal('hide');
                            $("#success").show();
                            $('#success').html('Data added successfully !');
                            location.reload();					
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
                var subject_id          = button.data('subject_id');
                var subject_code        = button.data('subject_code');
                var subject_name        = button.data('subject_name');
                var semester            = button.data('semester');
                var curriculum          = button.data('curriculum');
                var year_level          = button.data('year_level');
                var unit_lec            = button.data('unit_lec');
                var unit_lab            = button.data('unit_lab');
                var pre_req             = button.data('pre_req');
                var subject_unique_id   = button.data('subject_unique_id');
                
                var modal = $(this);
                modal.find('#subject_id').val(subject_id);
                modal.find('#subject_code').val(subject_code);
                modal.find('#subject_name').val(subject_name);
                modal.find('#semester').val(semester);
                modal.find('#curriculum').val(curriculum);
                modal.find('#year_level').val(year_level);
                modal.find('#unit_lec').val(unit_lec);
                modal.find('#unit_lab').val(unit_lab);
                modal.find('#pre_req').val(pre_req);
                modal.find('#subject_unique_id').val(subject_unique_id);
            });
        });

        $(document).on("click", "#update", function() { 
            $.ajax({
                url: "../controller/subject/update.php",
                type: "POST",
                cache: false,
                data:{
                    subject_id: $('#editModal #subject_id').val(),
                    subject_code: $('#editModal #subject_code').val(),
                    subject_name: $('#editModal #subject_name').val(),
                    semester: $('#editModal #semester').val(),
                    curriculum: $('#editModal #curriculum').val(),
                    year_level: $('#editModal #year_level').val(),
                    unit_lec: $('#editModal #unit_lec').val(),
                    unit_lab: $('#editModal #unit_lab').val(),
                    pre_req: $('#editModal #pre_req').val(),
                    subject_unique_id: $('#editModal #subject_unique_id').val(),
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
                var subject_unique_id = button.data('subject_unique_id');
                
                var modal = $(this);
                modal.find('#subject_unique_id').val(subject_unique_id);
            });
        });

        $(document).on("click", "#delete", function() { 
            var $ele = $(this).parent().parent();
            $.ajax({
                url: "../controller/subject/destroy.php",
                type: "POST",
                cache: false,
                data:{
                    subject_unique_id: $('#subject_unique_id').val(),
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