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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Extras</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit your Profile</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-4 col-xl-4">
                    <div class="card-box text-center">
                        <img src="" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image" id="profile-pic">

                        <h4 class="mb-0" id="title-name"></h4>
                        <p class="text-muted" id="title-course"></p>

                        <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
                        <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>

                        <div class="text-left mt-3">
                            <h4 class="font-13 text-uppercase">About Me :</h4>
                            <p class="text-muted font-13 mb-3">
                                
                            </p>
                            <p class="text-muted mb-2 font-13" id="fullname"><span class="ml-2"></span></p>

                            <p class="text-muted mb-2 font-13" id="contactnum-title"><strong>Mobile :</strong><span class="ml-2"></span></p>

                            <p class="text-muted mb-2 font-13" id="email"><strong>Email :</strong> <span class="ml-2 "></span></p>

                            <p class="text-muted mb-1 font-13" id="year"><strong>Year :</strong> <span class="ml-2"></span></p>
                        </div>

                    </div> <!-- end card-box -->

                    <div class="card-box">
                    </div> <!-- end card-box-->

                </div> <!-- end col-->

                <div class="col-lg-8 col-xl-8">
                    <div class="card-box">
                        <form>
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
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
                                        <span class="form-text text-muted"><small>If you want to change email please <a href="javascript: void(0);">click</a> here.</small></span>
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
                                        <!-- Course -->
                                        <label for="course">Course</label>
                                        <select class="form-control select2" data-toggle="select2" id="dropdown-course">
                                            <option selected disabled>Select Course</option>
                                            <option value="bscs">BSCS</option>
                                            <option value="bsit">BSIT</option>
                                            <option value="bsis">BSIS</option>
                                            <option value="bsce">BSCE</option>
                                            <option value="bsece">BSECE</option>
                                        </select>
                                    </div>
                                </div>
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
                                <div class="col-md-6">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-success waves-effect waves-light mt-2" id="save-profile-btn"><i class="mdi mdi-content-save"></i> Save</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-danger waves-effect waves-light mt-2"><i class="mdi mdi-delete"></i> Clear</button>
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

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    2015 - 2019 &copy; UBold theme by <a href="">Coderthemes</a>
                </div>
                <div class="col-md-6">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript:void(0);">About Us</a>
                        <a href="javascript:void(0);">Help</a>
                        <a href="javascript:void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

</div>