<?php $page_session = \Config\Services::session(); ?>
<?= $this->extend("includes/base") ?>

<?= $this->section("content") ?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <?php
                    if($page_session->getTempdata('success')):
                ?>
                    <div class='alert alert-success'>
                        <?= $page_session->getTempdata('success')?>
                    </div>
                <?php
                    endif;
                ?>

                <?php
                    if($page_session->getTempdata('error')):
                ?>
                    <div class='alert alert-danger'>
                        <?= $page_session->getTempdata('error')?>
                    </div>
                <?php
                    endif;
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

                        <?= form_open(); ?>
                            <div class="form-group mb-3">
                                <label for="">Username :</label>
                                <input type="text" name="username" class="form-control" placeholder="Enter Your Name" value='<?= set_value('username')?>'>
                                <span class = "text-danger">
                                    <?= display_error($validation, 'username')?>
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Mobile Number :</label>
                                <input type="text" name="mobile" class="form-control" placeholder="Enter Your Mobile No" value='<?= set_value('mobile')?>'>
                                <span class = "text-danger">
                                    <?= display_error($validation, 'mobile')?>
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email Address :</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Your Email Address" value='<?= set_value('email')?>'>
                                <span class = "text-danger">
                                    <?= display_error($validation, 'email')?>
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password :</label>
                                <input type="password" name="pass" class="form-control" placeholder="Enter Your Password">
                                <span class = "text-danger">
                                    <?= display_error($validation, 'pass')?>
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Confirm Password :</label>
                                <input type="password" name="cpass" class="form-control" placeholder="Enter Your Confirm Password">
                                <span class = "text-danger">
                                    <?= display_error($validation, 'cpass')?>
                                </span>
                            </div>
                            <div class="form-group login_center">
                                <button type="submit" name="register_btn" class="btn btn-primary">Register Now</button>
                            </div>
                        <?= form_close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>