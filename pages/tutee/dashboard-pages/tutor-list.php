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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filter Tutors</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your filter options here use group radio button -->
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="applyFilters">Apply Filters</button>
            </div>
        </div>
    </div>
</div>
