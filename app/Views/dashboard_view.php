<?= $this->extend("includes/base") ?>

    <?= $this->section('welcome_username'); ?>
        <span>Welcome <?= ucfirst($userdata->username); ?></span>
    <?= $this->endSection() ?>
    
    <?= $this->section("content") ?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php
                if (isset($_SESSION['status'])) {
                ?>
                    <div class="alert alert-success">
                        <h5><?= $_SESSION['status']; ?></h5>
                    </div>
                <?php
                    unset($_SESSION['status']);
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>~ User Dashboard ~ Welcome <?= ucfirst($userdata->username); ?></h4>
                    </div>
                    <div class="card-body">
                        <h4>Access when you are Logged In</h4>
                        <hr>

                        <?php if($userdata->profile_pic != ''): ?>
                            <img src = '<?= $userdata->profile_pic; ?>' height = '60'>
                        <?php else: ?>
                            <img src = '<?= base_url()?>/public/assets/images/avatar.png' height = '60'>
                        <?php endif; ?>

                        <h5>Username:
                            <?= $userdata->username; ?>
                        </h5>
                        <h5>Email Address:
                            <?= $userdata->email; ?>
                        </h5>
                        <h5>Phone No:
                            <?= $userdata->mobile; ?>
                        </h5>
                        <a href = "<?= base_url() ?>/dashboard/logout">Logout</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>