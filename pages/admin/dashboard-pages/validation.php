<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Admin Dashbaord</a>
                                </li>
                                <li class="breadcrumb-item active">Approval Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Account Validation (Admin)</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <table id="validation" class="stripe hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Fullname</th>
                                    <th>Department</th>
                                    <th>Year</th>
                                    <th>COR</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div> <!-- end card-box -->
                </div> <!-- end col -->
            </div>

        </div>
    </div>
</div>
</div>
<!-- Modal for View COR -->
<div class="modal fade" id="viewCORModal" tabindex="-1" role="dialog" aria-labelledby="viewCORModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewCORModalLabel">View Certificate of Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="cor-container" class="embed-responsive embed-responsive-4by3">
                </div>
            </div>
        </div>
    </div>
</div>
