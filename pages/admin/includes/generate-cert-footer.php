<script>
    $(document).ready(function() {
        $('#step2').hide();
        $('#step3').hide();
        $('#step4').hide();
        $.ajax({
            url: '../../server/admin-dashboard/get-list.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // add select button to the table
                var action = '<button class="btn btn-success btn-rounded" id="select-tutor">Select</button>';

                // add the select button to the data
                for (var i = 0; i < data.length; i++) {
                    data[i]['action'] = action;
                }

                // data table
                $('#tutor-list').DataTable({
                    data: data,
                    columns: [{
                            title: "Tutor ID",
                            data: 'peer_id'
                        },
                        {
                            title: "Name",
                            data: 'fullname'
                        },
                        {
                            title: "Email",
                            data: 'email'
                        },
                        {
                            title: "Enrolled Students",
                            data: 'enrolled_students'
                        },
                        {
                            title: "Points",
                            data: 'points'
                        },
                        {
                            title: "Action",
                            data: 'action'
                        }
                    ],
                    "info": true,
                    "responsive": true,
                    // remove the show entries
                    "bLengthChange": false,
                    // remove the pagination
                    "bPaginate": false,
                });

                // when the select button is clicked
                $('#tutor-list tbody').on('click', '#select-tutor', function() {
                    var data = $('#tutor-list').DataTable().row($(this).parents('tr')).data();
                    // get the tutor id
                    var tutor_id = data['peer_id'];

                    // hide the first step
                    $('#step1').hide();

                    // show the second step
                    $('#step2').show();

                    // get the name of the tutor
                    var tutor_name = data['fullname'];
                    var tutor_email = data['email'];

                    // get the date today
                    var date = new Date();
                    var month = date.getMonth() + 1;
                    var day = date.getDate();
                    var year = date.getFullYear();

                    var today = month + '/' + day + '/' + year;

                    // set the name and date
                    $('#inputName').val(tutor_name);
                    $('#inputDate').val(today);

                    // when the generate button is clicked
                    $('#generate-certificate').click(function() {
                        event.preventDefault();
                        // get the certificate description
                        var cert_desc = $('#certdesc').val();
                        var tutor_id = data['peer_id'];
                        var tutor_name = data['fullname'];
                        var tutor_email = data['email'];

                        // hide the second step
                        $('#step2').hide();

                        // send to the server
                        $.ajax({
                            url: '../../generate-certificate/index.php',
                            type: 'POST',
                            data: {
                                tutor_id: tutor_id,
                                tutor_name: tutor_name,
                                cert_desc: cert_desc,
                                date: today
                            },
                            success: function(response) {},
                            error: function(xhr, status, error) {
                                console.log(xhr.responseText);
                            }
                        });
                        
                        // add swal alert
                        Swal.fire({
                            title: 'Success!',
                            text: 'Certificate generated successfully!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value) {
                                // put user email in the input
                                $('#email').val(data['email']);
                                $('#step3').show();

                                // when the send button is clicked
                                $('#send-certificate').click(function() {
                                    event.preventDefault();
                                    // get the email
                                    var email = $('#email').val();

                                    // send to the server
                                    $.ajax({
                                        url: '../../server/admin-dashboard/send-certificate.php',
                                        type: 'POST',
                                        data: {
                                            email: email,
                                            tutor_name: tutor_name
                                        },
                                        success: function(response) {
                                            
                                        },
                                        error: function(xhr, status, error) {
                                            console.log(xhr.responseText);
                                        },
                                        // add loading swal alert remove the button and add loading animation when sending email and refresh the page after 
                                        beforeSend: function() {
                                            Swal.fire({
                                                title: 'Sending...',
                                                html: 'Please wait while we send the certificate to the tutor.',
                                                allowOutsideClick: false,
                                                onBeforeOpen: () => {
                                                    Swal.showLoading()
                                                },
                                            });
                                        },
                                        complete: function() {
                                            Swal.fire({
                                                title: 'Success!',
                                                text: 'Certificate sent successfully!',
                                                icon: 'success',
                                                confirmButtonText: 'OK'
                                            }).then((result) => {
                                                if (result.value) {
                                                    location.reload();
                                                }
                                            });
                                        }
                                    });
                                });
                            }
                        });


                    });
                });
            }
        });
    });
</script>