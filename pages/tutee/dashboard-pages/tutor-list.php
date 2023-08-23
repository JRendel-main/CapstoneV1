<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tutee Dashboard</a></li>
                                <li class="breadcrumb-item active">Tutor List</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Tutor List</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-md-8">
                    <form class="form-inline mb-3">
                        <div class="form-group">
                            <label for="searchTutor" class="sr-only">Search</label>
                            <input type="search" class="form-control" id="searchTutor" placeholder="Search for Tutor...">
                        </div>
                        <div class="form-group mx-sm-3">
                            <label for="status-select" class="mr-2">Sort By</label>
                            <select class="custom-select mb-0" id="status-select">
                                <option>Name</option>
                                <option>Department</option>
                                <option selected>Rating</option>
                                <option>Expertise</option>
                                <option>Recent</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="text-sm-right">
                        <!-- Open filter modal -->
                        <a href="javascript:void(0);" class="btn btn-danger mb-2" data-toggle="modal" data-target="#filterModal"><i class="mdi mdi-filter-outline mr-1"></i> Filter</a>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row" id="tutor-cards-container">
                <!-- Tutor cards will be dynamically generated here -->
            </div>
        </div>
    </div>
</div>
<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filter Tutors</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Filter by Expertise:</h6>
                <select class="form-control select2" multiple="multiple" id="expertiseFilter">
                    <option></option>
                    <!-- Add sample indiviual academic skills for tutors can brag -->
                    <option value="Calculus">Calculus</option>
                    <option value="Physics">Physics</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Software Development">Software Development</option>
                    <option value="Data Science">Data Science</option>
                </select>
                <h6 class="mt-3">Filter by Department:</h6>
                <select class="form-control select2" multiple="multiple" id="departmentFilter">
                    <option></option>
                    <!-- Add sample departments -->
                    <option value="BSIT">BSIT</option>
                    <option value="BSCS">BSCS</option>
                    <option value="BSIS">BSIS</option>
                </select>
                <h6 class="mt-3">Filter by Rating:</h6>
                <select class="form-control" id="ratingFilter">
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="3">3 Stars</option>
                    <!-- Add more rating options here -->
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>