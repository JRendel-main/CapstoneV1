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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                                <li class="breadcrumb-item active">Projects</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Schedule List</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row mb-2">
                <div class="col-sm-4">
                    <!-- add search bar here -->


                </div>
                <div class="col-sm-8">
                    <div class="text-sm-right">
                        <div class="btn-group mb-3">
                            <button type="button" class="btn btn-primary">All</button>
                        </div>
                        <div class="btn-group mb-3 ml-1">
                            <button type="button" class="btn btn-light">Ongoing</button>
                            <button type="button" class="btn btn-light">Finished</button>
                        </div>
                        <div class="btn-group mb-3 ml-2 d-none d-sm-inline-block">
                            <button type="button" class="btn btn-dark"><i class="mdi mdi-apps"></i></button>
                        </div>
                        <div class="btn-group mb-3 d-none d-sm-inline-block">
                            <button type="button" class="btn btn-link text-dark"><i class="mdi mdi-format-list-bulleted-type"></i></button>
                        </div>
                    </div>
                </div><!-- end col-->
            </div>
            <!-- end row-->
            <div class="row" id="schedule-list">
            </div>

        </div> <!-- container -->

    </div> <!-- content -->

</div>
<!-- View Students Modal -->
<div class="modal fade" id="viewStudentsModal" tabindex="-1" role="dialog" aria-labelledby="viewStudentsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewStudentsModalLabel">Students for [Tutor Name]</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul id="studentList"></ul>
            </div>
        </div>
    </div>
</div>

<!-- View Location/Link Modal -->
<div class="modal fade" id="viewLocationLinkModal" tabindex="-1" role="dialog" aria-labelledby="viewLocationLinkModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewLocationLinkModalLabel">Location and Link</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Place:</b> <span id="schedulePlace"></span></p>
                <p><b>Platform:</b> <span id="schedulePlatform"></span></p>
                <p><b>Link:</b> <input type="text" id="scheduleLink" readonly></p>
            </div>
        </div>
    </div>
</div>