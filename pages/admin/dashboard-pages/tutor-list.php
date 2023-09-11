<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Tutor and Tutee List</a>
                                </li>
                                <li class="breadcrumb-item active">Course List</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Tutor's Lists</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- set the tutor list -->
                <div class="col-md-8">
                    <div class="card-box">
                        <div class="table-responsive">
                            <table class="table display" style="width: 100%" id="tutor-lists">
                                <thead>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box">
                        <!-- alert message if user didnt click the view yet -->
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
                            <strong>Click the view button to see the tutor's profile!</strong>
                        </div>
                        <!-- tutor's profile -->
                        <div class="text-center" id="profile">
                            <img alt="Profile Image" class="rounded-circle avatar-lg img-thumbnail" id="profile">
                            <h4 class="mt-3"><b id="name">[Tutee Name]!</b></h4>
                            <p class="text-muted" id="expertise"></p>
                            <div class="mt-4" id="disable">
                            </div>
                        </div>
                    </div>
                    <div class="card-box">
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>