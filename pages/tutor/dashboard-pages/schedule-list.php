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

                                    <!-- This section is for listed schedule list -->

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
                <!-- Edit Modal -->
                <div class="modal fade" id="edit-schedule-modal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Schedule</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body p-3">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Add hidden value for sched id -->
                                            <input type="hidden" name="sched_id" id="edit-sched-id">
                                            <div class="form-group">
                                                <label class="control-label">Topic</label>
                                                <input class="form-control form-white" placeholder="Schedule Title" type="text" name="edit-topic">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Description</label>
                                                <textarea class="form-control form-white" placeholder="Schedule Description" name="edit-description"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Date</label>
                                                <input class="form-control form-white" readonly id="edit-datepicker" placeholder="Event date" type="date" name="edit-date">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Mode of Tutoring</label>
                                                <select class="form-control form-white" name="edit-mode" id="edit-mode">
                                                    <option selected disabled>Select mode of learning</option>
                                                    <option value="online">Online Tutoring</option>
                                                    <option value="f2f">Face-to-Face</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">How many Tutees can enroll?</label>
                                                <input class="form-control form-white" placeholder="Number of Tutees" type="number" name="edit-max">
                                                <p class="header-description"><i class="fe-info"></i><i> Maximum of 10 tutees only</i></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="edit-f2f">
                                            <div class="form-group">
                                                <label class="control-label">Place</label>
                                                <input class="form-control form-white" placeholder="Select Place" type="text" name="edit-place">
                                                <p class="header-description"><i class="fe-info"></i><i> Please click <a href="#" id="place-rules">here</a> to see the rules for selecting the place</i></p>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Start</label>
                                                <input class="form-control form-white" readonly placeholder="Event start" type="time" name="edit-start-f2f">
                                                <p class="header-description"><i class="fe-info"></i><i> Set schedules between 8:00 am - 5:00 pm only</i></p>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Duration <b>(Hours)</b></label>
                                                <input class="form-control form-white" placeholder="Duration of Session" type="number" name="edit-duration-f2f">
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="edit-online">
                                            <div class="form-group">
                                                <label class="control-label">Select one platform:</label>
                                                <select class="form-control form-white" name="edit-platform">
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
                                                <input class="form-control form-white" placeholder="Link for the platform" type="url" name="edit-link">
                                                <p class="header-description"><i class="fe-info"></i><i> Note: Provide link that cannot be changed later.</i></p>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Start</label>
                                                <input class="form-control form-white" readonly placeholder="Event start" type="time" name="edit-start-online">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Duration<b>(Hours)</b></label>
                                                <input class="form-control form-white" placeholder="Duration of Session" type="number" name="edit-duration-online">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer text-right">
                                <button type="button" class="btn btn-danger delete-schedule" id="delete-event-btn">Delete Schedule</button>
                                <button type="button" class="btn btn-success save-category" id="edit-event-btn">Save Changes</button>
                            </div>
                        </div> <!-- end modal-content-->
                    </div> <!-- end modal dialog-->
                </div>


            </div>
        </div>
    </div>
    <!-- form for display the schedule -->
</div>