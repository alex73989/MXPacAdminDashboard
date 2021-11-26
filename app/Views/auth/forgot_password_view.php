<?= $this->extend("includes/base") ?>

<?= $this->section("content") ?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

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


                        <?php if(session()->getTempdata('error')):?>
                        <div class='alert alert-danger'><?= session()->getTempdata('error');?></div>
                        <?php endif;?>

                        <?php if(session()->getTempdata('success')):?>
                        <div class='alert alert-success'><?= session()->getTempdata('success');?></div>
                        <?php endif;?>


                        <?= form_open(); ?>

                        <div class="form-group mb-3">
                            <label for="">Enter your email</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter Email Address">
                        </div>
                        <div class="form-group mb-3">
                            <input type="submit" name="reset" class="btn btn-primary" value = "Send" >
                        </div>

                        <div class="form-group login_center">
                            <a href="<?= base_url() ?>/"></a>
                        </div>
                        <?= form_close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>