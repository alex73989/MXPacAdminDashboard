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
</div>

<?= $this->endSection(); ?>