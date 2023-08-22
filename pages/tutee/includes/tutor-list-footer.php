<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        // Dummy tutor data
        var tutors = [{
                name: "John Doe",
                department: "BSIT",
                bio: "I am a passionate BSIT tutor with a focus on helping students achieve their goals and excel in their studies.",
                expertise: ["Web Development", "Database Management", "Software Engineering", "Computer Programming"],
                rating: 4.8,
            },
            {
                name: "Jane Doe",
                department: "BSIT",
                bio: "I am a passionate BSIT tutor with a focus on helping students achieve their goals and excel in their studies.",
                expertise: ["Web Development", "Database Management", "Software Engineering", "Computer Programming"],
                rating: 3.1,
            },

        ];

        // Function to generate tutor cards
        function generateTutorCards(tutors) {
            var tutorCards = '';
            tutors.forEach(function(tutor) {
                var expertiseBadges = tutor.expertise.map(function(expertise) {
                    return '<span class="badge badge-pill badge-primary">' + expertise + '</span>';
                }).join('');

                tutorCards += `
                <div class="col-lg-4">
                    <div class="card-box bg-pattern">
                        <div class="text-center">
                            <img src="../../assets/images/users/user-1.jpg" alt="logo" class="avatar-xl rounded-circle mb-3">
                            <h4 class="mb-1 font-20">${tutor.name}</h4>
                            <p class="text-muted font-14">${tutor.department}</p>
                        </div>

                        <p class="font-14 text-center text-muted">
                            I am a passionate ${tutor.department.toLowerCase()} tutor with a focus on helping students achieve their goals and excel in their studies.
                        </p>

                        <div class="text-center">
                            <a href="javascript:void(0);" class="btn btn-sm btn-light">View more info</a>
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
                                <h4>${tutor.rating.toFixed(1)}/5</h4>
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
        $('#searchTutor').on('input', function() {
            // search for tutors name, department, expertise, and rating
            var searchValue = $(this).val().toLowerCase();
            var filteredTutors = tutors.filter(function(tutor) {
                return tutor.name.toLowerCase().includes(searchValue) ||
                    tutor.department.toLowerCase().includes(searchValue) ||
                    tutor.expertise.join(' ').toLowerCase().includes(searchValue) ||
                    tutor.rating.toString().includes(searchValue);
            });
            generateTutorCards(filteredTutors);
        });
        // Sort tutors based on the selected option
        $('#status-select').on('change', function() {
            var selectedOption = $(this).val().toLowerCase();
            var sortedTutors = tutors.sort(function(a, b) {
                if (selectedOption === 'name') {
                    return a.name.localeCompare(b.name);
                } else if (selectedOption === 'department') {
                    return a.department.localeCompare(b.department);
                } else if (selectedOption === 'rating') {
                    return b.rating - a.rating;
                } else if (selectedOption === 'expertise') {
                    return a.expertise.join(' ').localeCompare(b.expertise.join(' '));
                } else if (selectedOption === 'recent') {
                    return b.id - a.id;
                }
            });
            generateTutorCards(sortedTutors);

            // Reset search input value
            $('#searchTutor').val('');
        });
    });
</script>