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
                                    <h4 class="header-title">Schedule List</h4>
                                    <!-- Add notes before creating a schedule -->
                                    <p class="header-description"><i>Please follow the University Rules and be respectful to other student</i></p>
                                    <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-lg font-16 btn-success btn-block  ">
                                        <i class="mdi mdi-plus-circle-outline"></i> Add New Schedule
                                    </a>

                                    <div class="mt-5 d-none d-xl-block">
                                        <h5 class="text-center">Edit Schedule</h5>

                                        <!-- Form for viewing the schedule when the event clicked -->
                                        <form id="event-details-form" class="d-none">
                                            <div class="form-group">
                                                <label for="event-title">Title</label>
                                                <input type="text" id="event-title" class="form-control" placeholder="Schedule Topic" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="event-description">Description</label>
                                                <textarea id="event-description" class="form-control" placeholder="Schedule Description" disabled></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="event-place">Place</label>
                                                <input type="text" id="event-place" class="form-control" disabled>
                                                <!-- Add notes for selecting place for scheduling -->

                                            </div>
                                            <div class="form-group">
                                                <label for="event-date">Date</label>
                                                <input type="text" id="event-date" class="form-control" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="event-time">Time</label>
                                                <input type="text" id="event-time" class="form-control" disabled>
                                            </div>
                                            <div class="btn-group">
                                                <div class="col-mb-6">
                                                    <button type="button" class="btn btn-primary" id="edit-event-btn">Edit</button>
                                                    <button type="button" class="btn btn-success" id="save-event-btn">Save</button>
                                                </div>
                                                <div class="col-mb-6">
                                                    <button type="button" class="btn btn-danger" id="delete-event-btn">Delete</button>
                                                </div>
                                            </div>
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
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add a new schedule</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body p-3">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Topic</label>
                                                    <input class="form-control form-white" placeholder="Schedule Title" type="text" name="topic">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Description</label>
                                                    <textarea class="form-control form-white" placeholder="Schedule Description" name="description"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Date</label>
                                                    <input class="form-control form-white" id="humanfd-datepicker" placeholder="Event date" type="date" name="date">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Mode of Tutoring</label>
                                                    <select class="form-control form-white" name="mode" id="mode">
                                                        <option selected disable>Select mode of learning</option>
                                                        <option value="online">Online Tutoring</option>
                                                        <option value="f2f">Face-to-Face</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">How many Tutees can enroll?</label>
                                                    <input class="form-control form-white" placeholder="Number of Tutees" type="number" name="max">
                                                    <p class="header-description"><i class="fe-info"></i><i> Maximum of 10 tutees only</i></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="f2f">
                                                <div class="form-group">
                                                    <label class="control-label">Place</label>
                                                    <input class="form-control form-white" placeholder="Select Place" type="text" name="place">
                                                    <p class="header-description"><i class="fe-info"></i><i> Please click <a href="#" id="place-rules">here</a> to see the rules for selecting the place</i></p>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Start</label>
                                                    <input class="form-control form-white" placeholder="Event start" type="time" name="start-f2f">
                                                    <p class="header-description"><i class="fe-info"></i><i> Set schedules between 8:00am - 5:00pm only</i></p>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Duration</label>
                                                    <input class="form-control form-white" placeholder="Duration of Session" type="number" name="duration-f2f">
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="online">
                                                <div class="form-group">
                                                    <label class="control-label">Select one platform:</label>
                                                    <select class="form-control form-white" name="platform">
                                                        <option value="zoom">Zoom Meeting</option>
                                                        <option value="googlemeet">Google Meet</option>
                                                        <option value="messenger">Facebook Messenger</option>
                                                        <option value="discord">Discord</option>
                                                        <option value="skype">Skype</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Link:</label>
                                                    <input class="form-control form-white" placeholder="Link for the platform" type="url" name="link">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Start</label>
                                                    <input class="form-control form-white" placeholder="Event start" type="time" name="start-online">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Duration</label>
                                                    <input class="form-control form-white" placeholder="Duration of Session" type="number" name="duration-online">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer text-right">
                                    <button type="button" class="btn btn-success save-category" id="add-event-btn">Create Schedule</button>
                                </div>
                            </div> <!-- end modal-content-->
                        </div> <!-- end modal dialog-->
                    </div>
                    <!-- end modal-->
                </div>
            </div>
        </div>
    </div>
    <!-- form for display the schedule -->
</div>