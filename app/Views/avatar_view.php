<?= $this->extend("includes/base") ?>

    <?= $this->section('welcome_username'); ?>
        <span>Welcome <?= ucfirst($userdata->username); ?></span>
    <?= $this->endSection() ?>

<?= $this->section('content'); ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-12">

            <?php if(isset($validation)):?>
                <div class = "alert alert-danger"><?= $validation->listErrors();?></div>
            <?php endif; ?>

            <?php if(session()->getTempdata('success')): ?>
                <div class = "alert alert-success">
                    <?= session()->getTempdata('success'); ?>
                </div>
            <?php endif; ?>

            <?php if(session()->getTempdata('error')): ?>
                <div class = "alert alert-danger">
                    <?= session()->getTempdata('error'); ?>
                </div>
            <?php endif; ?>

            <h3>Upload Avatar</h3>
            <?= form_open_multipart(); ?>
            <div class = "form-group mb-3">
                <label>Upload Avatar</label>
                <input type="file" name="avatar" class = "form-control">
            </div>
            <div class = "form-group mb-3">
                <input type="submit" name="upload" value="Upload" class = "btn btn-primary">
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>