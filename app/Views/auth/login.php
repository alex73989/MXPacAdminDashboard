<?= $this->extend("includes/base") ?>

<?= $this->section("content") ?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php
                if (isset($_SESSION['status'])) {
                ?>
                    <div class="alert alert-success login_center">
                        <h5><?= $_SESSION['status']; ?></h5>
                    </div>
                <?php
                    unset($_SESSION['status']);
                }
                ?>

                <div class="card shadow">
                    <div class="card-header login_center">
                        <h5>
                            <?php if (isset($page_heading)) {
                                echo $page_heading;
                            } ?>
                        </h5>
                    </div>
                    <div class="card-body">

                        <?php 
                        if(isset($validation)): ?>
                        <div class = "alert alert-danger">
                        <?= $validation->listErrors()?>
                        </div>
                        <?php endif; ?>

                        <?php if(isset($error)): ?>
                            <div class = "alert alert-danger"><?= $error; ?></div>
                        <?php endif; ?>


                        <?php if(session()->getTempdata('error')):?>
                        <div class='alert alert-danger'><?= session()->getTempdata('error');?></div>
                        <?php endif;?>

                        <?php if(session()->getTempdata('success')):?>
                        <div class='alert alert-success'><?= session()->getTempdata('success');?></div>
                        <?php endif;?>


                        <?= form_open(); ?>

                        <div class="form-group mb-3">
                            <label for="">Email Address</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter Email Address">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Enter Password">
                        </div>

                        <div class="form-group login_center">
                            <button type="submit" name="login_now_btn" class="btn btn-primary">Login Now</button>
                        </div>
                        <div class="form-group reset_password_form">
                            <a href="<?= base_url()?>/auth/forgot_password" class="">Reset Password</a>
                        </div>
                        <?= form_close(); ?>

                        <hr>
                        <h5 class="login_center">
                            Did not receive your Verification Email?
                            <a href="resend-email-verification.php">Resend</a>
                        </h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>