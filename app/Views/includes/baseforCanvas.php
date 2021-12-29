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

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/layers.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/sass.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/errors.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/responsive.css">

    <!-- CanvasMove CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/gameCanvas/canvasMove.css">

    <!-- Charts CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/chart/apexcharts.css">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.1.0/b-colvis-2.1.0/b-html5-2.1.0/b-print-2.1.0/cr-1.5.5/date-1.1.1/fc-4.0.1/fh-3.2.0/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.0/sp-1.4.0/sl-1.3.3/sr-1.0.1/datatables.min.css"/>

    <!-- Alertify CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

    <?php header("Set-Cookie: cross-site-cookie=whatever; SameSite=None; Secure"); ?>

</head>

<?php date_default_timezone_set('Asia/Kuala_Lumpur'); ?>

<body>
    
    <!-- Navbar Section -->
    <div class="bg-dark sticky-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <div class="container-fluid">

                            <a class="navbar-brand" href="#">MXPAC GROUP</a>

                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span> 
                                <span class="icon-bar"></span> 
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
                                            <a class="nav-link" href="<?php echo base_url() ?>/RFID_demo_kit/RFID_demo_kit_controller">RFID Demo Kit</a>
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
                                                    <!-- HERE userdata -->
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
    
    <div id = "canvasDemo">
        <?= $this->renderSection("content"); ?>
    </div>

    <footer class="bg-dark px-2 py-2">
        <div>
            <p class="text-center text-white">&copy; 2021 All Right Reserved</p>
        </div>
    </footer>

    <script src="<?php echo base_url() ?>/public/js/canvasMove.js"></script>
    <script type="text/javascript">
        startGame('canvasDemo');
    </script>

    <!-- Optional Javascript -->
    <!-- <script src="<?php echo base_url() ?>/public/js/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Alertify JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- DataTables Javascript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.1.0/b-colvis-2.1.0/b-html5-2.1.0/b-print-2.1.0/cr-1.5.5/date-1.1.1/fc-4.0.1/fh-3.2.0/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.0/sp-1.4.0/sl-1.3.3/sr-1.0.1/datatables.min.js"></script>

    <!-- Toastr CodeSeven Javascript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- SweetAlert2 Javascript -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap 5 and FontAwesome 6 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0c45dfaf87.js" crossorigin="anonymous"></script>
    
    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="<?php echo base_url() ?>/public/js/chart/chart.js"></script>

    <script src="<?php echo base_url() ?>/public/js/main.js"></script>

    <?= $this->renderSection("scripts"); ?>

</body>

</html>