<?= $this->extend("includes/base") ?>

<?= $this->section('welcome_username'); ?>
<span>Welcome <?= ucfirst($userdata->username); ?></span>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Change Password</h1>

            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
            <?php endif; ?>

            <?php if (session()->getTempdata('success')) : ?>
                <div class="alert alert-success">
                    <?= session()->getTempdata('success'); ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getTempdata('error')) : ?>
                <div class="alert alert-danger">
                    <?= session()->getTempdata('error'); ?>
                </div>
            <?php endif; ?>

            <?= form_open(); ?>
            <div class="form-group my-2">
                <label>Enter Old Password</label>
                <input type="password" name="eopwd" class="form-control">
            </div>
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
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>