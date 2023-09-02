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
                                <li class="breadcrumb-item active">Sched Request List</li>
                            </ol>
                        </div>
                        <h4 class="page-title" id="page-title">Schedule Request</h4>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Add 4 tabs for pending, approved, declined, all -->
                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#pending" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                Pending
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#approved" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                Approved
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#declined" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                Declined
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#all" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                All
                            </a>
                        </li>
                    </ul>

                    <!-- For pending tab -->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="pending">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="table-responsive">
                                            <table class="table table-bordered order-column" id="pending-table" style="width:100%">
                                                <thead class="">
                                                    <tr>
                                                        <th>Topic - Description</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Available Slot</th>
                                                        <th>Status</th>
                                                        <th>Pending</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- For approved tab -->
                    <div class="tab-content">
                        <div class="tab-pane show" id="approved">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-centered table-hover mb-0 row-border" id="approved-table">
                                                <thead>
                                                    <tr>
                                                        <th>Date of Schedule</th>
                                                        <th>Fullname</th>
                                                        <th>Topic</th>
                                                        <th>Time</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end tab-pane -->

                        <!-- For declined tab -->
                        <div class="tab-content">
                            <div class="tab-pane show" id="declined">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card-box">
                                            <div class="table-responsive">
                                                <table class="table table-centered table-striped table-hover mb-0 row-border" id="declined-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Topic - Description</th>
                                                            <th>Date</th>
                                                            <th>Time</th>
                                                            <th>Available Slot</th>
                                                            <th>Status</th>
                                                            <th>Declined</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end tab-pane -->

                            <!-- For all tab -->
                            <div class="tab-content">
                                <div class="tab-pane show" id="all">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card-box">
                                                <div class="table-responsive">
                                                    <table class="table table-centered table-striped table-hover mb-0 row-border" id="all-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Topic - Description</th>
                                                                <th>Date</th>
                                                                <th>Time</th>
                                                                <th>Available Slot</th>
                                                                <th>Status</th>
                                                                <th>View</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end tab-pane -->
                            </div> <!-- end tab-content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal for view request-->
        <div class="modal fade" id="view-request" tabindex="-1" aria-labelledby="view-requestLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="view-requestLabel">Request on Schedule</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> <!-- end modal-header -->
                    <div class="modal-body">
                    </div> <!-- end modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div> <!-- end modal-footer -->
                </div> <!-- end modal-content -->
            </div> <!-- end modal-dialog -->
        </div> <!-- end modal -->
        <script src="assets/js/tutee/schedule-request.js"></script>
        <script src="assets/js/tutee/request-list.js"></script>