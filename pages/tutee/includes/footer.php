<div id="container-floating">
    <div id="floating-button">
        <p class="plus" id="messageModalBtn">
            <!-- Alert triangle -->
            <i class="fas fa-triangle-exclamation fa-2xs"></i>
        </p>
    </div>
</div>
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Send Message to Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your message form here -->
                <form id="messageForm">
                    <div class="form-group">
                        <label for="name">Subject</label>
                        <input type="text" class="form-control" id="subject" placeholder="Enter subject here">
                    </div>
                    <div class="form-group">
                        <label for="name">Priority Level</label>
                        <!-- Add color per intensity -->
                        <select class="form-control" id="priority">
                            <option value="1">Low</option>
                            <option value="2">Medium</option>
                            <option value="3">High</option>
                            <option value="4">Urgent</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" rows="4" placeholder="Type your message here"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="sendMessage">Send Message</button>
            </div>
        </div>
    </div>
</div>

</div>


<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div class="rightbar-title">
        <a href="javascript:void(0);" class="right-bar-toggle float-right">
            <i class="dripicons-cross noti-icon"></i>
        </a>
        <h5 class="m-0 text-white">Settings</h5>
    </div>
    <div class="slimscroll-menu">
        <!-- User box -->
        <div class="user-box">
            <div class="user-img">
                <img src="../../assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                <a href="javascript:void(0);" class="user-edit"><i class="mdi mdi-pencil"></i></a>
            </div>

            <h5><a href="javascript: void(0);">Geneva Kennedy</a> </h5>
            <p class="text-muted mb-0"><small>Admin Head</small></p>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />
        <h5 class="pl-3">Basic Settings</h5>
        <hr class="mb-0" />

        <div class="p-3">
            <div class="checkbox checkbox-primary mb-2">
                <input id="Rcheckbox1" type="checkbox" checked>
                <label for="Rcheckbox1">
                    Notifications
                </label>
            </div>
            <div class="checkbox checkbox-primary mb-2">
                <input id="Rcheckbox2" type="checkbox" checked>
                <label for="Rcheckbox2">
                    API Access
                </label>
            </div>
            <div class="checkbox checkbox-primary mb-2">
                <input id="Rcheckbox3" type="checkbox">
                <label for="Rcheckbox3">
                    Auto Updates
                </label>
            </div>
            <div class="checkbox checkbox-primary mb-2">
                <input id="Rcheckbox4" type="checkbox" checked>
                <label for="Rcheckbox4">
                    Online Status
                </label>
            </div>
            <div class="checkbox checkbox-primary mb-0">
                <input id="Rcheckbox5" type="checkbox" checked>
                <label for="Rcheckbox5">
                    Auto Payout
                </label>
            </div>
        </div>

        <!-- Timeline -->
        <hr class="mt-0" />
        <h5 class="px-3">Messages <span class="float-right badge badge-pill badge-danger">25</span></h5>
        <hr class="mb-0" />
        <div class="p-3">
            <div class="inbox-widget">
                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="../../assets/images/users/user-2.jpg" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Tomaslau</a></p>
                    <p class="inbox-item-text">I've finished it! See you so...</p>
                </div>
                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="../../assets/images/users/user-3.jpg" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Stillnotdavid</a></p>
                    <p class="inbox-item-text">This theme is awesome!</p>
                </div>
                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="../../assets/images/users/user-4.jpg" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Kurafire</a></p>
                    <p class="inbox-item-text">Nice to meet you</p>
                </div>

                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="../../assets/images/users/user-5.jpg" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Shahedk</a></p>
                    <p class="inbox-item-text">Hey! there I'm available...</p>
                </div>
                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="../../assets/images/users/user-6.jpg" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Adhamdannaway</a></p>
                    <p class="inbox-item-text">This theme is awesome!</p>
                </div>
            </div> <!-- end inbox-widget -->
        </div> <!-- end .p-3-->

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="../../assets/js/vendor.min.js"></script>

<!-- App js -->
<script src="../../assets/js/app.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.6/af-2.6.0/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.10.0/r-2.5.0/sl-1.7.0/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.js" integrity="sha512-+IpCthlNahOuERYUSnKFjzjdKXIbJ/7Dd6xvUp+7bEw0Jp2dg6tluyxLs+zq9BMzZgrLv8886T4cBSqnKiVgUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Summernote js -->
<script src="../../assets/libs/summernote/summernote-bs4.min.js"></script>
<!-- Select2 js-->
<script src="../../assets/libs/select2/select2.min.js"></script>
<!-- Dropzone file uploads-->
<script src="../../assets/libs/dropzone/dropzone.min.js"></script>
<script>
    // get the fullname from php using ajax
    $(document).ready(function() {
        $('#messageModalBtn').click(function() {
            $('#messageModal').modal('show');

            $('#sendMessage').click(function() {
                var subject = $('#subject').val();
                var priority = $('#priority').val();
                var message = $('#message').val();

                if (subject == "" || priority == "" || message == "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please fill out all fields!',
                    })
                } else {
                    $.ajax({
                        url: "../../server/send-report.php",
                        type: "POST",
                        data: {
                            subject: subject,
                            priority: priority,
                            message: message
                        },
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Message sent!',
                            })
                            $('#messageModal').modal('hide');
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                }
            });
        });
        $.ajax({
            url: "../../server/admin-dashboard/get-sidebar-name.php",
            type: "POST",
            dataType: "json",
            success: function(data) {
                $("#user-fullname").text(data.fullname);
                $("#user-rank").html("Bronze");

                // upper case the first letter
                var name = data.name;
                var firstLetter = name.charAt(0).toUpperCase();
                var restOfName = name.slice(1);
                var fullName = firstLetter + restOfName;


                $("#user-name").text(fullName);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
</script>

</body>

</html>