<script>
    $(document).ready(function() {
        $('#schedule_title').hide();
        $('#rating_form').hide();
        $.ajax({
            url: '../../server/tutee/get-schedule.php',
            type: 'GET',
            success: function(response) {
                if (response === '') {
                    $('#schedule_title').hide();
                    $('#schedule_name').html('');
                    $('#schedule_table').html('<h3 class="text-center">No Schedule</h3>');
                } else {
                    $('#documentation').DataTable({
                        columnDefs: [{
                            orderable: false,
                            targets: [2, 3]
                        }],
                        columns: [{
                                title: "Title",
                                data: "title"
                            },
                            {
                                title: "Date",
                                data: "date"
                            },
                            {
                                title: "Time",
                                data: "time"
                            },
                            {
                                title: "Tutor Name",
                                data: "tutor_name"
                            },
                            {
                                title: "Status",
                                data: "status"
                            },
                            {
                                title: "Action",
                                data: "action"
                            }
                        ],
                        responsive: true,
                        data: JSON.parse(response),
                    });
                    // log the results


                    // when the add button is clicked
                    $('#documentation tbody').on('click', '.add-docu', function() {
                        var data = $('#documentation').DataTable().row($(this).parents('tr')).data();
                        // get the title and id 
                        var title = data['title'];
                        var id = data['id'];

                        console.log(title);
                        $('#schedule_title').show();
                        $('#schedule_name').html('ADD DOCUMENTATION TO ' + title);
                        $('#rating_form').show();

                        $("#btn-submit").click(function() {
                            // Get form data
                            var feedback = $("#product-meta-title").val();
                            var rating = $("select[name='rating']").val();
                            var fileInput = document.getElementById("uploadDocu");
                            var file = fileInput.files[0];
                            var filename = file.name;
                            var formData = new FormData();

                            // Add feedback and rating to the FormData object
                            formData.append('feedback', feedback);
                            formData.append('rating', rating);
                            formData.append("file", file);
                            formData.append("filena,e", filename);



                            // add the tutor_id and request_id to formData object
                            var tutor_id = data.tutor_id;
                            var request_id = data.request_id;

                            formData.append('tutor_id', tutor_id);
                            formData.append('request_id', id);

                            // check if all form is filled
                            if (feedback == '' || rating == '') {
                                alert('Please fill up the blanks.')
                                return false;
                            }

                            // if feedback, rating and documentation photo is empty
                            console.log(data.tutor_id);

                            // Send the data to the backend using AJAX
                            $.ajax({
                                url: '../../server/tutee/upload-documentation.php', // Replace with your backend URL
                                type: 'POST',
                                data: formData,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                    // check if success is true or false
                                    var data = JSON.parse(response);
                                    if (data.success == true) {
                                        swal.fire({
                                            title: "Success!",
                                            text: data.message,
                                            icon: "success",
                                            confirmButtonText: "OK",
                                            closeOnConfirm: false
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                location.reload();
                                            }
                                        })
                                    } else {
                                        swal.fire({
                                            title: "Failed!",
                                            text: data.message,
                                            icon: "error",
                                            confirmButtonText: "OK",
                                            closeOnConfirm: false
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                location.reload();
                                            }
                                        });
                                    }
                                },
                                error: function(error) {
                                    // Handle errors
                                    console.error('Error:', error);
                                    // You can display an error message here
                                }
                            });
                        });
                    });
                    // when btn-submit clicked


                }
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });

    });
</script>