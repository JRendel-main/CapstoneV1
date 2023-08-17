<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Schedule Management</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-lg font-16 btn-primary btn-block  ">
                                        <i class="mdi mdi-plus-circle-outline"></i> Add New Schedule
                                    </a>

                                    <div class="mt-5 d-none d-xl-block">
                                        <h5 class="text-center">How It Works ?</h5>

                                        <!-- Form for viewing the schedule when the event clicked -->
                                        <form class="pl-3">
                                            <div class="checkbox checkbox-primary mb-3">
                                                <input id="drop-remove" type="checkbox" checked="">
                                                <label for="drop-remove">
                                                    Create a new schedule by clicking on the calendar
                                                </label>
                                            </div>
                                        </form>
                                        <form id="event-details-form" class="d-none">
                                            <div class="form-group">
                                                <label for="event-title">Title</label>
                                                <input type="text" id="event-title" class="form-control" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="event-description">Description</label>
                                                <textarea id="event-description" class="form-control" disabled></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="event-place">Place</label>
                                                <input type="text" id="event-place" class="form-control" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="event-date">Date</label>
                                                <input type="text" id="event-date" class="form-control" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="event-time">Time</label>
                                                <input type="text" id="event-time" class="form-control" disabled>
                                            </div>
                                            <button type="button" id="edit-event-btn" class="btn btn-primary">Edit</button>
                                            <button type="button" id="save-event-btn" class="btn btn-success d-none">Save</button>
                                        </form>
                                    </div>
                                </div> <!-- end col-->
                                <div class="col-lg-9">
                                    <div id="calendar"></div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                    <!-- Add New Event MODAL -->
                    <div class="modal fade" id="event-modal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New Event</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body p-3">
                                    <!-- put here the events created -->
                                </div>
                                <div class="text-right p-3">
                                    <button type="button" class="btn btn-light " data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success save-event  ">Create event</button>
                                    <button type="button" class="btn btn-danger delete-event  " data-dismiss="modal">Delete</button>
                                </div>
                            </div> <!-- end modal-content-->
                        </div> <!-- end modal dialog-->
                    </div>
                    <!-- end modal-->

                    <!-- Modal Add Category -->
                    <div class="modal fade" id="add-category" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add a schedule</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body p-3">
                                    <div class="form-group">
                                        <label class="control-label">Topic</label>
                                        <input class="form-control form-white" placeholder="Event title" type="text" name="topic">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Description</label>
                                        <textarea class="form-control form-white" placeholder="Event description" name="description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Place</label>
                                        <input class="form-control form-white" placeholder="Event place" type="text" name="place">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Start</label>
                                        <input class="form-control form-white" placeholder="Event start" type="time" name="start">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Duration</label>
                                        <input class="form-control form-white" placeholder="Event end" type="text" name="duration">
                                    </div>
                                </div>
                                <div class="modal-footer text-right">
                                    <button type="button" class="btn btn-light " data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success save-category">Save</button>
                                </div>
                            </div> <!-- end modal-content-->
                        </div> <!-- end modal dialog-->
                    </div>
                    <!-- end modal-->
                </div>
            </div>
        </div>
    </div>