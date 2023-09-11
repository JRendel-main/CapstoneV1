<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-danger border-danger border">
                                    <!-- Add icon that indicates pending request -->
                                    <i class="fe-alert-triangle font-22 avatar-title text-danger"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup" id="totalTutor">0</span>
                                    </h3>
                                    <p class="text-muted mb-1 text-truncate">Total Tutor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                    <i class="fe-user-check font-22 avatar-title text-warning"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup" id="totalSched">0</span>
                                    </h3>
                                    <p class="text-muted mb-1 text-truncate">Total Sessions</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                    <i class="fe-users font-22 avatar-title text-primary"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup" id="totalTutee">0</span>
                                    </h3>
                                    <p class="text-muted mb-1 text-truncate">Total Tutee</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-box">
                        <h4 class="header-title mb-3">Total Tutee</h4>
                        <div id="chart"></div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-box">
                        <h4 class="header-title mb-3">Schedules</h4>
                        <div id="chart2"></div>
                    </div>
                </div>
            </div>
            <!-- This is for the "this week schedule" -->
            <div class="row">

            </div>
        </div>
    </div>
</div>