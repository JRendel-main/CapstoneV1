<?php $peer_id = $_GET['peer_id']; ?>
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tutee Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title" id="page-title">Tutor Profile</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-4 col-xl-4">
                    <div class="card-box text-center">
                        <img src="../../assets/images/users/user-3.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                        <h4 class="mb-0" id="tutor-name">[Tutor Name]</h4>
                        <p class="text-muted" id="tutor-department">[Tutor Department]</p>

                        <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
                        <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>

                        <div class="text-left mt-3">
                            <h4 class="font-13 text-uppercase">About Me :</h4>
                            <p class="text-muted font-13 mb-3" id="tutor-about">
                                [Tutor's About Me]
                            </p>
                            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2">Geneva
                                    D. McKnight</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ml-2">(123)
                                    123 1234</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">user@email.domain</span></p>

                            <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ml-2">USA</span></p>
                        </div>

                        <ul class="social-list list-inline mt-3 mb-0">
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                            </li>
                        </ul>
                    </div> <!-- end card-box -->

                    <div class="card-box">
                        <h4 class="header-title mb-3">Inbox</h4>

                        <div class="inbox-widget slimscroll" style="max-height: 310px;">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/images/users/user-2.jpg" class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Tomaslau</p>
                                <p class="inbox-item-text">I've finished it! See you so...</p>
                                <p class="inbox-item-date">
                                    <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                </p>
                            </div>
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/images/users/user-3.jpg" class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Stillnotdavid</p>
                                <p class="inbox-item-text">This theme is awesome!</p>
                                <p class="inbox-item-date">
                                    <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                </p>
                            </div>
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/images/users/user-4.jpg" class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Kurafire</p>
                                <p class="inbox-item-text">Nice to meet you</p>
                                <p class="inbox-item-date">
                                    <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                </p>
                            </div>

                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/images/users/user-5.jpg" class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Shahedk</p>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <p class="inbox-item-date">
                                    <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                </p>
                            </div>
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/images/users/user-6.jpg" class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Adhamdannaway</p>
                                <p class="inbox-item-text">This theme is awesome!</p>
                                <p class="inbox-item-date">
                                    <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                </p>
                            </div>

                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/images/users/user-3.jpg" class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Stillnotdavid</p>
                                <p class="inbox-item-text">This theme is awesome!</p>
                                <p class="inbox-item-date">
                                    <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                </p>
                            </div>
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/images/users/user-4.jpg" class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Kurafire</p>
                                <p class="inbox-item-text">Nice to meet you</p>
                                <p class="inbox-item-date">
                                    <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                </p>
                            </div>
                        </div> <!-- end inbox-widget -->

                    </div> <!-- end card-box-->

                </div> <!-- end col-->

                <div class="col-lg-8 col-xl-8">
                    <div class="card-box">
                        <ul class="nav nav-pills navtab-bg nav-justified">
                            <li class="nav-item">
                                <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    History
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#timeline" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                    Schedule List
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    Review & Ratings
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="aboutme">

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-briefcase mr-1"></i>
                                    Experience</h5>

                                <ul class="list-unstyled timeline-sm">
                                    <li class="timeline-sm-item">
                                        <span class="timeline-sm-date">2015 - 18</span>
                                        <h5 class="mt-0 mb-1">Lead designer / Developer</h5>
                                        <p>websitename.com</p>
                                        <p class="text-muted mt-2">Everyone realizes why a new common language
                                            would be desirable: one could refuse to pay expensive translators.
                                            To achieve this, it would be necessary to have uniform grammar,
                                            pronunciation and more common words.</p>

                                    </li>
                                    <li class="timeline-sm-item">
                                        <span class="timeline-sm-date">2012 - 15</span>
                                        <h5 class="mt-0 mb-1">Senior Graphic Designer</h5>
                                        <p>Software Inc.</p>
                                        <p class="text-muted mt-2">If several languages coalesce, the grammar
                                            of the resulting language is more simple and regular than that of
                                            the individual languages. The new common language will be more
                                            simple and regular than the existing European languages.</p>
                                    </li>
                                    <li class="timeline-sm-item">
                                        <span class="timeline-sm-date">2010 - 12</span>
                                        <h5 class="mt-0 mb-1">Graphic Designer</h5>
                                        <p>Coderthemes LLP</p>
                                        <p class="text-muted mt-2 mb-0">The European languages are members of
                                            the same family. Their separate existence is a myth. For science
                                            music sport etc, Europe uses the same vocabulary. The languages
                                            only differ in their grammar their pronunciation.</p>
                                    </li>
                                </ul>

                                <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant mr-1"></i>
                                    Projects</h5>
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Project Name</th>
                                                <th>Start Date</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                                <th>Clients</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>App design and development</td>
                                                <td>01/01/2015</td>
                                                <td>10/15/2018</td>
                                                <td><span class="badge badge-info">Work in Progress</span></td>
                                                <td>Halette Boivin</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Coffee detail page - Main Page</td>
                                                <td>21/07/2016</td>
                                                <td>12/05/2018</td>
                                                <td><span class="badge badge-success">Pending</span></td>
                                                <td>Durandana Jolicoeur</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Poster illustation design</td>
                                                <td>18/03/2018</td>
                                                <td>28/09/2018</td>
                                                <td><span class="badge badge-pink">Done</span></td>
                                                <td>Lucas Sabourin</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Drinking bottle graphics</td>
                                                <td>02/10/2017</td>
                                                <td>07/05/2018</td>
                                                <td><span class="badge badge-blue">Work in Progress</span></td>
                                                <td>Donatien Brunelle</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Landing page design - Home</td>
                                                <td>17/01/2017</td>
                                                <td>25/05/2021</td>
                                                <td><span class="badge badge-warning">Coming soon</span></td>
                                                <td>Karel Auberjo</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div> <!-- end tab-pane -->
                            <!-- end about me section content -->

                            <div class="tab-pane show active" id="timeline">

                                

                            </div>
                            <!-- end timeline content-->

                            <div class="tab-pane" id="settings">
                                
                            </div>
                            <!-- end settings content-->

                        </div> <!-- end tab-content -->
                    </div> <!-- end card-box-->

                </div> <!-- end col -->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->