<style>
    /* Style for the main dashboard card */
    .card-box {
        background-color: #fff;
        border: 1px solid #ebeef3;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
    }

    /* Style for the profile image */
    .avatar-lg {
        width: 100px;
        height: 100px;
    }

    /* Style for the "View all Sessions" button */
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    /* Style for the table headers */
    .thead-light th {
        background-color: #f8f9fa;
    }

    /* Style for the table rows */
    .table-hover tbody tr:hover {
        background-color: #f5f5f5;
    }

    /* Style for illustrations */
    .illustration {
        width: 100px;
        height: 100px;
    }
</style>


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
                            <img alt="Profile Image" class="rounded-circle avatar-lg img-thumbnail" id="profilePic">
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
                        <table class="table table-borderless table-hover table-centered m-0" id="today-sched" style="width: 100%">
                            <thead class="thead-light">
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- This week schedule -->
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="header-title mb-3">This Week's Schedule</h4>
                        <table class="table table-borderless table-hover table-centered m-0" id="upcoming-sched">
                            <thead class="thead-light">
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