<!-- Top Bar Start -->
        <div class="topbar">
             <!-- Navbar -->
             <nav class="navbar-custom">

                <!-- LOGO -->
                <div class="topbar-left">
                    
                    
                </div>
                
                <ul class="list-unstyled topbar-nav float-right mb-0">
                    <li>
                    <a href="index.php" class="logo" style="">
                        <span>
                            <img src="img/group_gsenc_en_b.png" style="padding-top:7px" alt="logo-small" class="logo-sm">
							<img src="img/logo.png" alt="logo-small" style="padding-top:7px" class="logo-sm">
                        </span>
                    </a>
                    </li>
                    <li>
                        <button class="button-menu-mobile nav-link waves-effect waves-light">
                            <i class="mdi mdi-menu nav-icon"></i>
                        </button>
                    </li>
                    
                    
                    
<?php
if(isset($_SESSION['idx'])){
                    echo '<li class="dropdown">';
                    echo '   <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"';
                    echo '        aria-haspopup="false" aria-expanded="false">';
                    echo '        <i class="mdi mdi-bell-outline nav-icon"></i>';
                    echo '        <span class="badge badge-danger badge-pill noti-icon-badge" id="notification_title_1">0</span>';
                    echo '    </a>';
                    echo '    <div class="dropdown-menu dropdown-menu-right dropdown-lg">';
                    echo '        <!-- item-->';
                    echo '        <h6 class="dropdown-item-text" id="notification_title_2">';
                    echo '            Notifications (258)';
                    echo '        </h6>';
                    echo '        <div class="slimscroll notification-list" id="notification_items">';
                    echo '            <!-- item-->';
                    echo '            <a href="javascript:void(0);" class="dropdown-item notify-item active">';
                    echo '                <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>';
                    echo '                <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>';
                    echo '            </a>';
                    echo '            <!-- item-->';
                    echo '            <a href="javascript:void(0);" class="dropdown-item notify-item">';
                    echo '                <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>';
                    echo '                <p class="notify-details">New Message received<small class="text-muted">You have 87 unread messages</small></p>';
                    echo '            </a>';
                    echo '            <!-- item-->';
                    echo '            <a href="javascript:void(0);" class="dropdown-item notify-item">';
                    echo '                <div class="notify-icon bg-info"><i class="mdi mdi-martini"></i></div>';
                    echo '                <p class="notify-details">Your item is shipped<small class="text-muted">It is a long established fact that a reader will</small></p>';
                    echo '            </a>';
                    echo '            <!-- item-->';
                    echo '            <a href="javascript:void(0);" class="dropdown-item notify-item">';
                    echo '                <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>';
                    echo '                <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>';
                    echo '            </a>';
                    echo '            <!-- item-->';
                    echo '            <a href="javascript:void(0);" class="dropdown-item notify-item">';
                    echo '                <div class="notify-icon bg-danger"><i class="mdi mdi-message"></i></div>';
                    echo '                <p class="notify-details">New Message received<small class="text-muted">You have 87 unread messages</small></p>';
                    echo '            </a>';
                    echo '        </div>';
                    echo '        <!-- All-->';
                    echo '        <a href="javascript:void(0);" class="dropdown-item text-center text-primary">';
                    echo '            View all <i class="fi-arrow-right"></i>';
                    echo '        </a>';
                    echo '    </div>';
                    echo '</li>';
}
?>
                    <li class="dropdown">
					<?php
                        if(isset($_SESSION['idx'])){
							printf('<a class="nav-link" href="/data/API_011.php" role="button">LOGOUT</a>');
						}else{
							printf('<a class="nav-link" href="/auth-login.php" role="button">LOGIN</a>');
						}
					?>
                    </li>
                </ul>
    
                <ul class="list-unstyled topbar-nav mb-0">
                    <li>
                        
                    </li>
                    <!--
                    <li>
                    </li class="topbar-nav">
                    <li class="hide-phone app-search">
                        <form role="search" class="">
                            <input type="text" placeholder="Search..." class="form-control">
                            <a href=""><i class="fas fa-search"></i></a>
                        </form>
                    </li>-->
                    
                </ul>

            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->
        <div class="page-wrapper-img">
            <div class="page-wrapper-img-inner">
                <div class="sidebar-user">                    
                    <h3 style="color:white">NCS N101 Safety Training School</h3>   
                </div>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <a  href="https://www.n105sts.com/" role="button"><h4 class="header-title mt-0 mb-3" style="color:white;float:right">Link to NCS N105 STS</h4></a>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
            </div>
        </div>
        
        <div class="page-wrapper">
            <div class="page-wrapper-inner">

                <!-- Left Sidenav -->
                <div class="left-sidenav">
                    
                    <ul class="metismenu left-sidenav-menu" id="side-nav">

                        <li class="menu-title">Main</li>

                        <li>
                            <a href="index.php"><i class="mdi mdi-monitor"></i><span>Home</span></a>
                        </li>
                        <li>
                        <a href="javascript: void(0);"><i class="mdi mdi-apps"></i><span>About Safety Courses</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
							<li><a href="#"><span>Safety Course for Full Packager (8H)</span></a>
                                <ul>
                                <li><a href="about_full.php"><span>About Training</span></a>
                                <li><a href="tl.php"><span>Time Schedule</span></a>
                                </ul>
                            </li>
                            <li><a href="#"><span>Safety Course for Lifting Work (4H)</span></a>
                            <ul>
                                <li><a href="about_s1.php"><span>About Training</span></a>
                                <li><a href="#"><span>Time Schedule</span></a>
                                </ul></li>
                            <li><a href="#"><span>Safety Course for Working at Height (4H)</span></a>
                            <ul>
                                <li><a href="about_s2.php"><span>About Training</span></a>
                                <li><a href="#"><span>Time Schedule</span></a>
                                </ul></li>
                            <li><a href="#"><span>Safety Course for Confined Space (4H)</span>
                            <ul>
                                <li><a href="about_s3.php"><span>About Training</span></a>
                                <li><a href="#"><span>Time Schedule</span></a>
                                </ul></li>
						</ul>
                        </li>
                        <li>
                        <!-- <a href="javascript: void(0);"><i class="mdi mdi-apps"></i><span>Apply Training</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="tl.php"><span>Time schedule</span></a></li>

						</ul>-->
                        </li>
                        
                        <?php
							if(isset($_SESSION['idx'])){
							echo '<li>';
							echo '    <a href="javascript: void(0);"><i class="mdi mdi-apps"></i><span>Book Courses</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>';
							echo '    <ul class="nav-second-level" aria-expanded="false">';
							echo '        <li><a href="calendar.php"><span>Book Courses</span></a></li>';
							echo '		<li><a href="my.php"><span>Training History</span></a></li>';
							echo '    </ul>';
							echo '</li>';
								if($_SESSION['level'] < 5){
								echo '<li>';
								echo '    <a href="javascript: void(0);"><i class="mdi mdi-lock-outline"></i><span>Management</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>';
								echo '    <ul class="nav-second-level" aria-expanded="false">';
								echo '        <li><a href="admin.php"><span>Reservation</span></a></li>';
								echo '        <li><a href="admint.php"><span>Education</span></a></li>';
								echo '        <li><a href="members.php"><span>Membership Info</span></a></li>';
								echo '    </ul>';
								echo '</li>';
								}
							}
						?>
						<li>
                            <a href="#"><i class="mdi mdi-map"></i><span>Location & Layout</span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="tsl.php"><span>Training School Layout</span></a></li>
                            <li><a href="location.php"><span>Training School Location</span></a></li>
						    </ul>
                        </li>
					</ul>
                </div>
                <!-- end left-sidenav-->

                <!-- Page Content-->
                <div class="page-content">
                    <div class="container-fluid"> 
                    <div class="row">
                            <div class="col-12">
                                
                            </div>
                        </div>