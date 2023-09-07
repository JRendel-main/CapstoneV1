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
                        <h4 class="page-title">Course Settings</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Table -->
                <div class="col-md-8">
                    <div class="card-box">
                        <div class="table-responsive">
                            <table class="table cell-border" style="width: 100%" id="course-list">
                                <thead>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- using form for adding new course -->
                    <div class="card-box">
                        <h4 class="header-title">Add New Course</h4>
                        <form>
                            <div class="form-group">
                                <label for="courseName">Course Name</label>
                                <input type="text" class="form-control" id="courseName" placeholder="Enter Course Name">
                            </div>
                            <div class="form-group">
                                <label for="courseAlias">Course Alias</label>
                                <input type="text" class="form-control" id="courseAlias" placeholder="Enter Course Alias">
                            </div>
                            <button type="button" class="btn btn-success btn-block" id="add-course-btn">Add Course</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- now for edit courses use modal -->
<!-- Add a modal for editing courses -->
<div class="modal fade" id="editCourseModal" tabindex="-1" role="dialog" aria-labelledby="editCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCourseModalLabel">Edit Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="editCourseName">Course Name</label>
                        <input type="text" class="form-control" id="editCourseName" placeholder="Enter Course Name">
                    </div>
                    <div class="form-group">
                        <label for="editCourseAlias">Course Alias</label>
                        <input type="text" class="form-control" id="editCourseAlias" placeholder="Enter Course Alias">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveCourseChanges">Save Changes</button>
            </div>
        </div>
    </div>
</div>
