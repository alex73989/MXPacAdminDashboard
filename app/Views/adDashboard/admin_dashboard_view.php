<?= $this->extend("includes/baseforDash") ?>


<?= $this->section('welcome_username'); ?>
<p>Welcome <?= ucfirst($userdata->username); ?></p>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>

<div class = "main-wrapper">
    <!-- NAVBAR START -->
    <div class = "header-container">
        <header class = "header navbar navbar-expand-sm expand-header admin_header_nav">
            <div class = "header-left d-flex">
                <div class = "logo">
                    MXPac Group
                </div>
                <a href="#" class = "sidebarCollapse" id = "toggleSidebar" data-placement="bottom">
                    <p class="fa fa-bars"></p>
                </a>
            </div>

            <ul class = "navbar-item flex-row ml-auto">
                <li class="nav-item">
                    <a class="nav-link user" href="<?php echo base_url() ?>/home-routes">
                        <i class="fas fa-house-user size_center"></i>
                        <p>Home</p>
                    </a>
                </li>
                <?php if(session()->has('logged_user')): ?>
                    <li class="nav-item">
                        <a class="nav-link user" href="<?php echo base_url() ?>/AdminDashboard/admin_dashboard_controller">
                            <i class="fas fa-audio-description size_center"></i>
                            <p>Admin Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link user" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-cog size_center"></i>
                            <?= $this->renderSection('welcome_username'); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                            <div class = "user-profile-section">
                                <div class = "media mx-auto">
                                    <?php if($userdata->profile_pic != ''): ?>
                                        <img src = "<?= $userdata->profile_pic; ?>" alt = "" class = "img-fluid mr-2">
                                    <?php else: ?>
                                        <img src = "<?= base_url()?>/public/assets/images/avatar.png" alt = "" class = "img-fluid mr-2">
                                    <?php endif; ?>
                                        <div class = "media-body">
                                            <h5><?= $userdata->username; ?></h5>
                                            <p>Super Admin</p>

                                        </div>
                                </div>
                            </div>
                            <hr class = "hr_nav">

                            <div class="dp-main-menu">
                                <a href="" class="dropdown-item">
                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                    <span class="">User Profile</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="" class="dropdown-item">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <span class="">Edit Profile</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="" class="dropdown-item">
                                    <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                    <span class="">Upload Avatar</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="" class="dropdown-item">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                    <span class="">Change Password</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="" class="dropdown-item">
                                    <i class="fa fa-universal-access" aria-hidden="true"></i>
                                    <span class="">Login Activity</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="" class="dropdown-item">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    <span class="">Logout</span>
                                </a>
                            </div>
                        </div>
                        
                    </li>

                <?php endif; ?>
            </ul>
        </header>
    </div>
    <!-- NAVBAR END -->

    
    <!-- SIDEBAR START -->
    <div class = "left-menu">
        <div class="menubar-content">
            <nav class = "animated bounceInDown">
                <ul id = "sidebar">
                    <li class = "active">
                        <a href="#">
                            <i class="fas fa-home"></i>
                            <span>Module 1</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-home"></i>
                            <span>Module 2</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-home"></i>
                            <span>Module 3</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-home"></i>
                            <span>Module 4</span>
                        </a>
                    </li>

                    <li class = "sub-menu">
                        <a href="#">
                            <i class="fas fa-cog"></i>
                            <span>Module 5</span>
                            <div class = "fas fa-caret-down right"></div>
                        </a>
                        <ul class = left-menu-dp>
                            <li>
                                <a href="#">
                                    <i class="fas fa-user-circle"></i>
                                    <span>Module 5 - a</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-user-circle"></i>
                                    <span>Module 5 - b</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-user-circle"></i>
                                    <span>Module 5 - c</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-user-circle"></i>
                                    <span>Module 5 - d</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-user-circle"></i>
                                    <span>Module 5 - e</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </nav>
        </div>
    </div>

    <!-- SIDEBAR END -->

    <div class="content-wrapper">
        <section class = "dashboard-top-sec">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="bg-white top-chart-earn">
                            <div class="row">
                                <div class="col-sm-4 my-2 pe-0">
                                    <div class="last-month">
                                        <h5>Dashboard</h5>
                                        <p>Overview of Latest Month</p>

                                        <div class="earn">
                                            <h2>$3367.98</h2>
                                            <p>Current Month Sales</p>
                                        </div>
                                        <div class="sale mb-3">
                                            <h2>95</h2>
                                            <p>Current Month Sales</p>
                                        </div>
                                        <a href="" class = "di-btn purple-gradient">Last Month Summary</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>

<?= $this->endSection(); ?>