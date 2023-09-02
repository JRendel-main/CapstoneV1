<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../../assets/libs/multiselect/jquery.multi-select.js"></script>
<script src="../../assets/libs/select2/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#expertiseFilter').select2({
            placeholder: 'Select expertise...',
            allowClear: true,
            width: '100%',
            dropdownAutoWidth: true,
            minimumResultsForSearch: Infinity,
        });
        $('#departmentFilter').select2({
            placeholder: 'Select department...',
            allowClear: true,
            width: '100%',
            dropdownAutoWidth: true,
            minimumResultsForSearch: Infinity,
        });
        var tutors = [];

        // Replace with your actual functions to fetch status and message for the tutor
        function getStatusForTutor(tutorId) {
            // Implement your logic here
            return tutorId; // Example status
        }

        function getMessageForTutor(tutorId) {
            // Implement your logic here
            return "Thank you for your assistance!"; // Example message
        }

        // get the tutor data from the database
        $.ajax({
            url: '../../server/tutee/get-tutors.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // generate the tutor cards
                if (response.success) {
                    tutors = response.tutors;
                    console.log(tutors);

                    // if the bio and about_me is null add placeholder


                    // Function to populate expertise options in the select element
                    function populateExpertiseOptions() {
                        var expertiseSet = new Set();

                        // Extract expertise from tutors and add to the set
                        tutors.forEach(function(tutor) {
                            tutor.expertise.forEach(function(expertise) {
                                expertiseSet.add(expertise);
                            });
                        });

                        // Populate the select element with expertise options
                        var selectElement = $('#expertiseFilter');
                        expertiseSet.forEach(function(expertise) {
                            selectElement.append($('<option>', {
                                value: expertise,
                                text: expertise
                            }));
                        });

                        // Initialize the select2 plugin
                        selectElement.select2();
                    }

                    // Function to populate department options in select element
                    function populateDepartmentOptions() {
                        var departmentSet = new Set();

                        // Extract departments from tutors and add to the set
                        tutors.forEach(function(tutor) {
                            departmentSet.add(tutor.department);
                        });

                        // Populate the select element with department options
                        var selectElement = $('#departmentFilter');
                        departmentSet.forEach(function(department) {
                            selectElement.append($('<option>', {
                                value: department,
                                text: department
                            }));
                        });

                        // Initialize the select2 plugin
                        selectElement.select2();
                    }

                    // Call the function to populate department options
                    populateDepartmentOptions();

                    // Call the function to populate expertise options
                    populateExpertiseOptions();

                    // Total: 50 tutors

                    // Function to generate tutor cards
                    function generateTutorCards(tutors) {
                        var tutorCards = '';
                        tutors.forEach(function(tutor) {
                            var expertiseBadges = tutor.expertise.map(function(expertise) {
                                return '<span class="badge badge-pill badge-primary">' + expertise + '</span>';
                            }).join('');

                            tutorCards += `
                <div class="col-lg-4">
                    <div class="card-box bg-pattern card-fixed-height">
                        <div class="text-center">
                            <img src="../../assets/images/users/user-1.jpg" alt="logo" class="avatar-xl rounded-circle mb-3">
                            <h4 class="mb-1 font-20">${tutor.fullname}</h4>
                            <p class="text-muted font-14">${tutor.department}</p>
                        </div>

                        <p class="font-14 text-center text-muted">
                            ${tutor.bio}
                        </p>

                        <div class="text-center">
    <a href="tutor-profile.php?peer_id=${tutor.peer_id}" class="btn btn-sm btn-success">
        <i class="mdi mdi-user"></i>
        View Profile
    </a>
</div>
                        <div class="row mt-4 text-center">
                            <div class="col-12">
                                <h5 class="font-weight-normal text-muted">Expertise</h5>
                                ${expertiseBadges}
                            </div>
                        </div>

                        <div class="row mt-3 text-center">
                            <div class="col-6">
                                <h5 class="font-weight-normal text-muted">Rating</h5>
                                <h4>${tutor.rating}/5</h4>
                            </div>
                            <div class="col-6">
                                <h5 class="font-weight-normal text-muted">Total Tutees</h5>
                                <h4>${tutor.tutee_count}</h4>
                            </div>
                        </div>
                        
                    </div> <!-- end card-box -->
                </div><!-- end col -->
            `;
                        });

                        $('#tutor-cards-container').html(tutorCards);
                    }

                    // Initial tutor card generation
                    generateTutorCards(tutors);

                    // Search for tutors based on the input value
                    $('#searchTutor').on('keyup', function() {
                        var inputValue = $(this).val().toLowerCase();
                        var filteredTutors = tutors.filter(function(tutor) {
                            return tutor.fullname.toLowerCase().includes(inputValue);
                        });
                        generateTutorCards(filteredTutors);
                    });

                    // Sort tutors based on the selected option
                    $('#status-select').on('change', function() {
                        var sortOption = $(this).val();
                        var sortedTutors = tutors.sort(function(a, b) {
                            if (sortOption == 'Name') {
                                return a.name.localeCompare(b.name);
                            } else if (sortOption == 'Department') {
                                return a.department.localeCompare(b.department);
                            } else if (sortOption == 'Rating') {
                                return b.rating - a.rating;
                            } else if (sortOption == 'Expertise') {
                                return a.expertise.join(' ').localeCompare(b.expertise.join(' '));
                            } else if (sortOption == 'Tutee Count') {
                                return b.totalTutees - a.totalTutees;
                            }
                        });
                        generateTutorCards(sortedTutors);
                    });

                    $('.view-profile-btn').click(function() {
                        var tutorId = $(this).data('id');

                        // Assume you have the logic to fetch status and message for the tutor
                        var status = getStatusForTutor(tutorId); // Replace with your actual function
                        var message = getMessageForTutor(tutorId); // Replace with your actual function

                        // Populate modal content with retrieved data
                        $('#profile-status').text(status);
                        $('#message-to-tutor').text(message);
                    });

                    // Filter tutors based on the selected expertise, department
                    $('#expertiseFilter, #departmentFilter').on('change', function() {
                        var expertiseFilter = $('#expertiseFilter').val();
                        var departmentFilter = $('#departmentFilter').val();
                        var filteredTutors = tutors.filter(function(tutor) {
                            return (expertiseFilter.length == 0 || expertiseFilter.some(function(expertise) {
                                return tutor.expertise.includes(expertise);
                            })) && (departmentFilter.length == 0 || departmentFilter.includes(tutor.department));
                        });
                        generateTutorCards(filteredTutors);
                    });


                } else {
                    console.log(response.message);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
        // Dummy tutor data
        // var tutors = [{
        //         name: 'John Doe',
        //         department: 'BSIT',
        //         expertise: ['Calculus', 'Physics', 'Chemistry'],
        //         rating: 4.5,
        //         totalTutees: 15
        //     },
        //     {
        //         name: 'Jane Smith',
        //         department: 'Biology',
        //         expertise: ['Biology', 'Anatomy', 'Genetics'],
        //         rating: 4.8,
        //         totalTutees: 22
        //     },
        //     {
        //         name: 'Michael Johnson',
        //         department: 'Mathematics',
        //         expertise: ['Algebra', 'Geometry', 'Statistics'],
        //         rating: 4.2,
        //         totalTutees: 12
        //     },
        //     // Adding more tutors...
        //     {
        //         name: 'Maria Rodriguez',
        //         department: 'Physics',
        //         expertise: ['Mechanics', 'Thermodynamics', 'Electromagnetism'],
        //         rating: 4.7,
        //         totalTutees: 18
        //     },
        //     {
        //         name: 'William Lee',
        //         department: 'Chemistry',
        //         expertise: ['Organic Chemistry', 'Inorganic Chemistry', 'Analytical Chemistry'],
        //         rating: 4.4,
        //         totalTutees: 10
        //     },
        //     {
        //         name: 'Jessica Brown',
        //         department: 'Psychology',
        //         expertise: ['Cognitive Psychology', 'Abnormal Psychology', 'Social Psychology'],
        //         rating: 4.9,
        //         totalTutees: 30
        //     },
        //     // Adding more tutors...
        //     {
        //         name: 'David Martinez',
        //         department: 'Economics',
        //         expertise: ['Microeconomics', 'Macroeconomics', 'International Trade'],
        //         rating: 4.3,
        //         totalTutees: 25
        //     },
        //     {
        //         name: 'Sophia Anderson',
        //         department: 'English Literature',
        //         expertise: ['Shakespeare', 'American Literature', 'British Romanticism'],
        //         rating: 4.7,
        //         totalTutees: 20
        //     },
        //     {
        //         name: 'Daniel Thompson',
        //         department: 'Geography',
        //         expertise: ['Physical Geography', 'Human Geography', 'Geographical Information Systems'],
        //         rating: 4.1,
        //         totalTutees: 16
        //     },
        //     // Adding more tutors...
        //     {
        //         name: 'Olivia White',
        //         department: 'Sociology',
        //         expertise: ['Social Movements', 'Cultural Sociology', 'Gender Studies'],
        //         rating: 4.5,
        //         totalTutees: 28
        //     },
        //     {
        //         name: 'James Martin',
        //         department: 'Music',
        //         expertise: ['Music Theory', 'Composition', 'Music History'],
        //         rating: 4.6,
        //         totalTutees: 14
        //     },
        //     {
        //         name: 'Ava Taylor',
        //         department: 'Art',
        //         expertise: ['Painting', 'Sculpture', 'Digital Art'],
        //         rating: 4.8,
        //         totalTutees: 19
        //     },
        //     // Adding more tutors...
        //     {
        //         name: 'Alexander Wilson',
        //         department: 'Political Science',
        //         expertise: ['Comparative Politics', 'International Relations', 'Political Theory'],
        //         rating: 4.2,
        //         totalTutees: 23
        //     },
        //     {
        //         name: 'Ella Adams',
        //         department: 'Languages',
        //         expertise: ['French', 'Spanish', 'German'],
        //         rating: 4.7,
        //         totalTutees: 27
        //     },
        //     {
        //         name: 'Noah Harris',
        //         department: 'Physics',
        //         expertise: ['Quantum Mechanics', 'Relativity', 'Astrophysics'],
        //         rating: 4.4,
        //         totalTutees: 11
        //     },
        //     // Adding more tutors...
        //     {
        //         name: 'Grace Turner',
        //         department: 'Chemistry',
        //         expertise: ['Physical Chemistry', 'Biochemistry', 'Nuclear Chemistry'],
        //         rating: 4.6,
        //         totalTutees: 26
        //     },
        //     {
        //         name: 'Liam Miller',
        //         department: 'Mathematics',
        //         expertise: ['Calculus', 'Linear Algebra', 'Number Theory'],
        //         rating: 4.3,
        //         totalTutees: 17
        //     },
        //     {
        //         name: 'Chloe Jackson',
        //         department: 'Biology',
        //         expertise: ['Microbiology', 'Ecology', 'Cell Biology'],
        //         rating: 4.9,
        //         totalTutees: 21
        //     },
        //     // Adding more tutors...
        //     {
        //         name: 'Benjamin Thompson',
        //         department: 'Computer Science',
        //         expertise: ['Operating Systems', 'Computer Architecture', 'Computer Networks'],
        //         rating: 4.5,
        //         totalTutees: 13
        //     },
        //     {
        //         name: 'Amelia Taylor',
        //         department: 'History',
        //         expertise: ['American History', 'European History', 'World History'],
        //         rating: 4.7,
        //         totalTutees: 32
        //     },
        //     {
        //         name: 'Mason Garcia',
        //         department: 'Psychology',
        //         expertise: ['Developmental Psychology', 'Personality Psychology', 'Behavioral Neuroscience'],
        //         rating: 4.2,
        //         totalTutees: 9
        //     }
        //     // Adding more tutors...
        // ];

    });
</script>