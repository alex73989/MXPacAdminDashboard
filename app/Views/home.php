<?= $this->extend("includes/base"); ?>

<?php if (session()->has('logged_user')) : ?>
    <?= $this->section('welcome_username'); ?>
    <span>Welcome <?= ucfirst($userdata->username); ?></span>
    <?= $this->endSection() ?>
<?php endif; ?>

<?= $this->section("content"); ?>

<!-- Slider Section-->
<section>
    <?= $this->include("layouts/slider") ?>
</section>

<!-- Features Section -->
<section id="features">
    <?= $this->include("layouts/features") ?>
</section>

<!-- About Us Section-->
<section>
    <?= $this->include("layouts/aboutus") ?>
</section>

<?= $this->endSection(); ?>