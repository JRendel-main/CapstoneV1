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
                                            <table class="table table-centered table-striped table-hover mb-0" id="pending-table">
                                                <thead>
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
                </div>
            </div>
        </div>
    </div>
</div>