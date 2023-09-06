<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-left">
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-box">
                        <div class="text-center">
                            <img src="https://ui-avatars.com/api/?name=John+Rendel" alt="Profile Image" class="rounded-circle avatar-lg img-thumbnail">
                            <h4 class="mt-3">Welcome, <b id="name">[Tutee Name]!</b></h4>
                            <p class="text-muted">We're glad to have you here. Start your learning journey today!</p>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="mt-3">
                                        <h4 id="pending-count">13</h4>
                                        <p class="mb-0 text-muted">Pending Requests</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mt-3">
                                        <h4 id="upcoming-count">3</h4>
                                        <p class="mb-0 text-muted">Upcoming Sessions</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View all Sessions</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- for today's schedule -->
                    <div class="card-box">
                        <h4 class="header-title mb-3">Today's Schedule</h4>
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-centered m-0" id="today-sched">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Time</th>
                                        <th>Subject</th>
                                        <th>Mode</th>
                                        <th>Duration</th>
                                        <th>Max Tutee</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>10:00 AM</td>
                                        <td>Math</td>
                                        <td>Online</td>
                                        <td>60 mins</td>
                                        <td>5</td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#view-schedule-modal">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1:00 PM</td>
                                        <td>Science</td>
                                        <td>Online</td>
                                        <td>60 mins</td>
                                        <td>5</td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#view-schedule-modal">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3:00 PM</td>
                                        <td>English</td>
                                        <td>Online</td>
                                        <td>60 mins</td>
                                        <td>5</td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#view-schedule-modal">View</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- This week schedule -->
                <div class="col-md-8">
                    <div class="card-box">
                        <h4 class="header-title mb-3">This Week's Schedule</h4>
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-centered m-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Time</th>
                                        <th>Subject</th>
                                        <th>Mode</th>
                                        <th>Duration</th>
                                        <th>Max Tutee</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>10:00 AM</td>
                                        <td>Math</td>
                                        <td>Online</td>
                                        <td>60 mins</td>
                                        <td>5</td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#view-schedule-modal">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1:00 PM</td>
                                        <td>Science</td>
                                        <td>Online</td>
                                        <td>60 mins</td>
                                        <td>5</td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#view-schedule-modal">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3:00 PM</td>
                                        <td>English</td>
                                        <td>Online</td>
                                        <td>60 mins</td>
                                        <td>5</td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#view-schedule-modal">View</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box">
                        <h4 class="header-title mb-3">Inbox</h4>

                        <div class="inbox-widget slimscroll" style="max-height: 404px;">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/images/users/user-2.jpg" class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Tomaslau</p>
                                <p class="inbox-item-text">I've finished it! See you so...</p>
                                <p class="inbox-item-date">
                                    <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                </p>
                            </div>
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/images/users/user-3.jpg" class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Stillnotdavid</p>
                                <p class="inbox-item-text">This theme is awesome!</p>
                                <p class="inbox-item-date">
                                    <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                </p>
                            </div>
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/images/users/user-4.jpg" class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Kurafire</p>
                                <p class="inbox-item-text">Nice to meet you</p>
                                <p class="inbox-item-date">
                                    <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                </p>
                            </div>

                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/images/users/user-5.jpg" class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Shahedk</p>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <p class="inbox-item-date">
                                    <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                </p>
                            </div>
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/images/users/user-6.jpg" class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Adhamdannaway</p>
                                <p class="inbox-item-text">This theme is awesome!</p>
                                <p class="inbox-item-date">
                                    <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                </p>
                            </div>

                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/images/users/user-3.jpg" class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Stillnotdavid</p>
                                <p class="inbox-item-text">This theme is awesome!</p>
                                <p class="inbox-item-date">
                                    <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                </p>
                            </div>
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/images/users/user-4.jpg" class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Kurafire</p>
                                <p class="inbox-item-text">Nice to meet you</p>
                                <p class="inbox-item-date">
                                    <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                </p>
                            </div>
                        </div> <!-- end inbox-widget -->

                    </div> <!-- end card-box-->
                </div>
            </div>
        </div>
    </div>
</div>