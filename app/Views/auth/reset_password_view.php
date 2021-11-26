<?= $this->extend("includes/base") ?>

<?= $this->section("content") ?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1>Reset Password</h1>

                <?php if(isset($validation)): ?>
                    <div class = "alert alert-danger">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>

                <?php if(isset($error)): ?>
                    <div class = 'alert alert-danger'><?= $error; ?></div>
                <?php else: ?>

                    <?= form_open(); ?>

                    <div class="form-group my-2">
                        <label>Enter New Password</label>
                        <input type="password" name="enpwd" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label>Confirm New Password</label>
                        <input type="password" name="cnpwd" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <input type="submit" name="updatePassword" value="Update" class="btn btn-primary">
                    </div>

                    <?= form_close() ?>

                <?php endif ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>