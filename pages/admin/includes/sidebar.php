<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="slimscroll-menu">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">
                        <li class="menu-title">Dashboard</li>

                        <li>
                            <a href="index.php">
                                <i class="fe-airplay"></i>
                                <span> Reports </span>
                            </a>
                        </li>

                        <!-- Complains and emails -->
                        <li>
                            <a href="logs.php">
                                <i class="fe-archive"></i>
                                <span> Logs </span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fe-users"></i>
                                <span> User List </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level nav" aria-expanded="false">
                                <li>
                                    <a href="tutor-list.php">Tutor List</a>
                                </li>
                                <li>
                                    <a href="tutee-list.php">Tutee List</a>
                                </li>
                                <li>
                                    <a href="moderator-list.php">Moderator List</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fe-calendar"></i>
                                <span> Schedules </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level nav" aria-expanded="false">
                                <li>
                                    <a href="tutor-list.php">Current Schedules</a>
                                </li>
                                <li>
                                    <a href="tutee-list.php">Past Schedules</a>
                                </li>
                                <li>
                                    <a href="moderator-list.php">Upcoming Schedules</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="validation.php">
                                <i class="fe-user-plus"></i>
                                <span> Validation </span>
                            </a>
                        </li>

                        <li>
                            <a href="restricted-list.php">
                                <i class="fe-alert-triangle"></i>
                                <span> Restricted Accounts </span>
                            </a>
                        </li>

                        <li class="menu-title">Admin Settings</li>

                        <!-- Website settings -->
                        <li>
                            <a href="website-settings.php">
                                <i class="fe-settings"></i>
                                <span> Website Settings </span>
                            </a>
                        </li>

                        <!-- Course settings -->
                        <li>
                            <a href="course-list.php">
                                <i class="fe-book"></i>
                                <span> Course Settings </span>
                            </a>
                        </li>

                        <!-- Archive list -->
                        <li>
                            <a href="{{ route('archive') }}">
                                <i class="fe-folder"></i>
                                <span> Archive </span>
                            </a>
                        </li>

                        <!-- Generate report -->
                        <li>
                            <a href="{{ route('generate') }}">
                                <i class="fe-file-text"></i>
                                <span> Generate Report </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>