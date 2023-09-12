<?php $peer_id = $_GET['peer_id']; ?>
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
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title" id="page-title">Tutor Profile</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-4 col-xl-4">
                    <div class="card-box text-center">
                        <img src="../../assets/images/users/user-3.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                        <h4 class="mb-0" id="tutor-name">[Tutor Name]</h4>
                        <p class="text-muted" id="tutor-department">[Tutor Department]</p>

                        <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
                        <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>

                        <div class="text-left mt-3">
                            <h4 class="font-13 text-uppercase">About Me :</h4>
                            <p class="text-muted font-13 mb-3" id="tutor-about">
                                [Tutor's About Me]
                            </p>
                            <p class="text-muted mb-2 font-13" id="fullname"><strong>Full Name :</strong> <span class="ml-2">[Full Name]</span></p>

                            <p class="text-muted mb-2 font-13" id="contactnum"><strong>Mobile :</strong><span class="ml-2"></span></p>

                            <p class="text-muted mb-2 font-13" id="email"><strong>Email :</strong> <span class="ml-2 "></span></p>

                            <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ml-2"></span></p>
                        </div>
                    </div> <!-- end card-box -->

                    <div class="card-box">

                    </div> <!-- end card-box-->

                </div> <!-- end col-->

                <div class="col-lg-8 col-xl-8">
                    <div class="card-box">
                        <ul class="nav nav-pills navtab-bg nav-justified">
                            <li class="nav-item">
                                <a href="#history" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    History
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#schedule" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                    Schedule List
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    Review & Ratings
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="history">
                                <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant mr-1"></i>
                                    Projects</h5>
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Project Name</th>
                                                <th>Start Date</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                                <th>Clients</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>App design and development</td>
                                                <td>01/01/2015</td>
                                                <td>10/15/2018</td>
                                                <td><span class="badge badge-info">Work in Progress</span></td>
                                                <td>Halette Boivin</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Coffee detail page - Main Page</td>
                                                <td>21/07/2016</td>
                                                <td>12/05/2018</td>
                                                <td><span class="badge badge-success">Pending</span></td>
                                                <td>Durandana Jolicoeur</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Poster illustation design</td>
                                                <td>18/03/2018</td>
                                                <td>28/09/2018</td>
                                                <td><span class="badge badge-pink">Done</span></td>
                                                <td>Lucas Sabourin</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Drinking bottle graphics</td>
                                                <td>02/10/2017</td>
                                                <td>07/05/2018</td>
                                                <td><span class="badge badge-blue">Work in Progress</span></td>
                                                <td>Donatien Brunelle</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Landing page design - Home</td>
                                                <td>17/01/2017</td>
                                                <td>25/05/2021</td>
                                                <td><span class="badge badge-warning">Coming soon</span></td>
                                                <td>Karel Auberjo</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div> <!-- end tab-pane -->
                            <!-- end about me section content -->

                            <div class="tab-pane show active" id="schedule">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-md-6 text-center mt-4">
                                        <!-- Use alert -->
                                        <div class="alert alert-danger" role="alert" id="no-sched-message">
                                            <strong>Heads up!</strong> This tutor has no schedule yet.
                                        </div>
                                    </div>
                                    <div class="calendar" id="calendar"></div>
                                </div>
                            </div>



                            <!-- end timeline content-->

                            <div class="tab-pane" id="settings">

                            </div>
                            <!-- end settings content-->

                        </div> <!-- end tab-content -->
                    </div> <!-- end card-box-->

                </div> <!-- end col -->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Schedule Details Modal -->
    <div class="modal fade" id="schedule-modal" tabindex="-1" aria-labelledby="schedule-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="modal-title">Schedule Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs" id="scheduleTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="schedule-details-tab" data-bs-toggle="tab" href="#schedule-details" role="tab" aria-controls="schedule-details" aria-selected="true">Schedule Details</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tutee-list-tab" data-bs-toggle="tab" href="#tutee-list" role="tab" aria-controls="tutee-list" aria-selected="false">Tutee List</a>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content text-center" id="scheduleTabsContent">
                        <!-- Schedule Details Tab -->
                        <div class="tab-pane fade show active" id="schedule-details" role="tabpanel" aria-labelledby="schedule-details-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <h4 class="header-title mb-3" id="schedule-title">[Schedule Title]</h4>
                                        <!-- for description title -->
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- description -->
                                                <p id="schedule-description">[Schedule Description]</p>
                                            </div>
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Date</th>
                                                        <td id="schedule-date">[Schedule Date]</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Time</th>
                                                        <td id="schedule-time">[Schedule Time]</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tutoring Mode</th>
                                                        <td id="schedule-mode">[Schedule Mode]</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Capacity</th>
                                                        <td id="schedule-capacity">[Schedule Capacity]</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> <!-- end card-box -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>

                        <!-- Tutee List Tab -->
                        <div class="tab-pane fade" id="tutee-list" role="tabpanel" aria-labelledby="tutee-list-tab">

                        </div>
                    </div>
                </div>
                <div class="modal-footer" id="footer">
                    <!-- Request schedule button -->
                    <button type="button" class="btn btn-success" id="request-schedule">Request</button>
                    <!-- Cancel request schedule button -->
                    <button type="button" class="btn btn-danger" id="cancel-request">Cancel</button>
                    <!-- schedule full button -->
                    <button type="button" class="btn btn-warning" id="schedule-full" disabled>Full</button>
                    <!-- schedule past button -->
                    <button type="button" class="btn btn-warning" id="schedule-past" disabled>Schedule Done</button>
                </div>
            </div>
        </div>
    </div>