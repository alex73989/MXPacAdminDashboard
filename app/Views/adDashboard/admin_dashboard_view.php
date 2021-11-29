<?= $this->extend("includes/base") ?>


<?= $this->section('welcome_username'); ?>
<span>Welcome <?= ucfirst($userdata->username); ?></span>
<?= $this->endSection() ?>


<?= $this->section('welcome_username_test'); ?>
<span>Welcome <?= ucfirst($userdata->username); ?></span>
<?= $this->endSection() ?>


<?= $this->section('content'); ?>

<div class = "main-wrapper">
    <!-- NAVBAR -->
    <div class = "header-container">
        <header class = "header navbar navbar-expand-sm expand-header admin_header_nav">
            <div class = "header-left d-flex">
                <div class = "logo">
                    MXPac Group
                </div>
                <a href="" class = "sidebarCollapse" data-placement="bottom">
                    <span class="fa fa-bars"></span>
                </a>
            </div>
        </header>
    </div>

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
</div>

<?= $this->endSection(); ?>