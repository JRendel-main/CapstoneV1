<!-- Topbar Start -->
<div class="navbar-custom navbar-custom-light">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img id="userImage" src="../../assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ml-1" id="user-name">
                </span><i class="mdi mdi-chevron-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0" id="sidebar-username">Settings</h6>
                </div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>My Account</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-settings"></i>
                    <span>Settings</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-lock"></i>
                    <span>Lock Screen</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="../../logout.php" class="dropdown-item notify-item" id="logoutButton">
                    <i class="fe-log-out"></i>
                    <span>Logout</span>
                </a>

            </div>
        </li>
    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="../../index.html" class="logo text-center">
            <span class="logo-lg">
                <img src="../../assets/images/nexus-logo.png" alt="" height="26">
                <!-- <span class="logo-lg-text-dark"></span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">U</span> -->
                <img src="../../assets/images/new-logo-sm.png" alt="" height="38">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>
    </ul>
</div>