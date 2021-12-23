<?= $this->extend("includes/base"); ?>

<?php if (session()->has('logged_user')) : ?>
    <?= $this->section('welcome_username'); ?>
    <span>Welcome <?= ucfirst($userdata->username); ?></span>
    <?= $this->endSection() ?>
<?php endif; ?>

<?= $this->section("content"); ?>

<!-- ========== GameCanvas ========== -->
<div>

    <h1>RFID Demo Kit</h1>
    <div class="btn btn-primary my-3">
        <a href="<?php echo base_url() ?>/RFID_demo_kit/RFID_scan_tag_controller" class="button_rfid_to_scan">RFID Scan Tag</a>
    </div>
    <div class="btn btn-primary my-3">
        <a href="<?php echo base_url() ?>/RFID_demo_kit/RFID_canvasMove_controller" class="button_car_physical_demostration">Car Physical Demostration</a>
    </div>

</div>
<!-- ========== GameCanvas ========== -->

<?= $this->endSection(); ?>

<script>