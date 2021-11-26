<div class="bg-dark">
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
                                    <a class="nav-link active" href="<?php echo base_url() ?>/home/home_main">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url() ?>/dashboard/dashboard_main">Dashboard</a>
                                </li>

                                <?php if (!isset($_SESSION['authenticated'])) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url() ?>/auth/register">Register</a>
                                        <!--can also be using /public/index.php/auth/register  !Remember cannot use .php as url -->
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url() ?>/auth/login">Login</a>
                                        <!--can also be using /auth/index -->
                                    </li>
                                <?php endif ?>

                                <?php if (isset($_SESSION['authenticated'])) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="logout.php">Logout</a>
                                    </li>
                                <?php endif ?>
                            </ul>

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

</div>