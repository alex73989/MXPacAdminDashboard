<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if (isset($page_title)) {
            echo $page_title;
        } ?>
    </title>

    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/custom.css">
    
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/layers.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/sass.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/errors.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/responsive.css">

</head>

<?php date_default_timezone_set('Asia/Kuala_Lumpur'); ?>

<body>
    <div class="bg-dark sticky-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <div class="container-fluid">

                            <a class="navbar-brand" href="#">MXPAC GROUP</a>

                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav nav_design mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url() ?>/home-routes">Home</a>
                                    </li>

                                    <?php if(session()->has('logged_user')): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url() ?>/AdminDashboard/admin_dashboard_controller">Admin Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url() ?>/Valeo/valeo_controller">Valeo</a>
                                        </li>
                                        <!-- <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <?/* = $this->renderSection('welcome_username'); */ ?>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                                <li><a class="dropdown-item" href="<?= base_url()?>/dashboard-routes">User Profile</a></li>
                                                <div class="dropdown-divider"></div>
                                                <li><a class="dropdown-item" href="<?= base_url()?>/dashboard/edit">Edit</a></li>
                                                <div class="dropdown-divider"></div>
                                                <li><a class="dropdown-item" href="<?= base_url()?>/dashboard/avatar">Upload Avatar</a></li>
                                                <div class="dropdown-divider"></div>
                                                <li><a class="dropdown-item" href="<?= base_url()?>/dashboard/change_password">Change Password</a></li>
                                                <div class="dropdown-divider"></div>
                                                <li><a class="dropdown-item" href="<?= base_url()?>/dashboard/login_activity">Login Activity</a></li>
                                                <div class="dropdown-divider"></div>
                                                <li><a class="dropdown-item" href="<?= base_url()?>/dashboard/logout">Logout</a></li>
                                            </ul>
                                        </li> -->

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                                    <a href="<?= base_url()?>/dashboard-routes" class="dropdown-item">
                                                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                        <span class="">User Profile</span>
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="<?= base_url()?>/dashboard/edit" class="dropdown-item">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        <span class="">Edit Profile</span>
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="<?= base_url()?>/dashboard/avatar" class="dropdown-item">
                                                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                                        <span class="">Upload Avatar</span>
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="<?= base_url()?>/dashboard/change_password" class="dropdown-item">
                                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                                        <span class="">Change Password</span>
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="<?= base_url()?>/dashboard/login_activity" class="dropdown-item">
                                                        <i class="fa fa-universal-access" aria-hidden="true"></i>
                                                        <span class="">Login Activity</span>
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="<?= base_url()?>/dashboard/logout" class="dropdown-item">
                                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                                        <span class="">Logout</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>

                                        <!-- <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <?= $this->renderSection('welcome_username_test'); ?>
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
                                        </li> -->

                                        <?php else: ?>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url() ?>/register-routes">Register</a>
                                            <!--can also be using /public/index.php/auth/register  !Remember cannot use .php as url -->
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url() ?>/login-routes">Login</a>
                                            <!--can also be using /auth/index -->
                                        </li>

                                    <?php endif; ?>
                                </ul>

                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

    </div>

    <?= $this->renderSection("content"); ?>


    <footer class="bg-dark px-2 py-2">
        <div>
            <p class="text-center text-white">&copy; 2021 All Right Reserved</p>
        </div>
    </footer>

    <!-- Optional Javascript -->
    <!-- Bootstrap JS first, then jQuery -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/0c45dfaf87.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url() ?>/public/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/public/js/main.js"></script>

</body>

</html>