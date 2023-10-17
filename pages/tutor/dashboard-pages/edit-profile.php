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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tutor Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit your Profile</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="card-box">
                        <form>
                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account mr-1"></i> Personal Info</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control" id="firstname" placeholder="Enter first name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="middlename">Middle Name</label>
                                        <input type="text" class="form-control" id="middlename" placeholder="Enter middle name">
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-md-4">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" id="lastname" placeholder="Enter last name">
                                </div>
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="userbio">Bio</label>
                                        <textarea class="form-control" id="userbio" rows="4" placeholder="Write something..."></textarea>
                                        <span class="form-text text-muted"><small><i>Bio will be displayed publicly so please be respectful.</i></small></span>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="useremail">Email Address</label>
                                        <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                                        <span class="form-text text-muted"><small><i>For verification and certification purposes, please use a <b>Valid</b> email.</i></small></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contactnum">Contact Number</label>
                                        <input type="number" class="form-control" id="contactnum" placeholder="Enter contact number">
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-school mr-1"></i> Academic Info</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cwebsite">Year</label>
                                        <select class="form-control" id="year-select">
                                            <option disabled>Select Year</option>
                                            <option value="first_year">1st Year</option>
                                            <option value="second_year">2nd Year</option>
                                            <option value="third_year">3rd Year</option>
                                            <option value="fourth_year">4th Year</option>
                                            <option value="fifth_year">5th Year</option>
                                        </select>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-book mr-1"></i> Expertise </h5>

                            <div class="row">
                                <!-- Using multiselect user can select expertise or skills add if there is none -->
                                <div class="col-md-6">
                                    <select class="form-control select2" id="expertiseDropdown" multiple="multiple">

                                    </select>
                                </div>
                            </div> <!-- end row -->


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-success btn-block waves-effect waves-light mt-2" id="save-profile-btn"><i class="mdi mdi-content-save"></i> Save</button>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                    <!-- end settings content-->
                </div> <!-- end col -->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

</div>