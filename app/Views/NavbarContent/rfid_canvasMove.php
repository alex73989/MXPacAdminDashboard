<?= $this->extend("includes/baseforCanvas"); ?>

<?php if (session()->has('logged_user')) : ?>
    <?= $this->section('welcome_username'); ?>
    <span>Welcome <?= ucfirst($userdata->username); ?></span>
    <?= $this->endSection() ?>
<?php endif; ?>

<?= $this->section("content"); ?>

<!-- ========== GameCanvas ========== -->
<div>
    <div>
        <button type="button" class="btn btn-primary" onmousedown="moveup()" onmouseup="clearmove()">UP</button>
        <br>
        <br>
        <button type="button" class="btn btn-primary" onmousedown="moveleft()" onmouseup="clearmove()">LEFT</button>
        <button type="button" class="btn btn-primary" onmousedown="moveright()" onmouseup="clearmove()">RIGHT</button>
        <br>
        <br>
        <button type="button" class="btn btn-primary" onmousedown="movedown()" onmouseup="clearmove()">DOWN</button>
        <br>
        <br>
        <button type="button" class="btn btn-primary" onmousedown="resetmove()">RESET</button>
    </div>

    <p>I have created a game area!</p>
    <p>Then I created a component to my game! I is a yellow square!</p>
    <p>I continued to add frames and movement</p>
    <p>After I had added movement, I could finally add controllers</p>
    <p>First I added the buttons that was controlled by the mouse,
    <br>then I added the keystroke controllers for the w,s,a,d keys.</p>

    <div class="btn btn-primary my-3">
        <a href="<?php echo base_url() ?>/RFID_demo_kit/RFID_demo_kit_controller" class="button_rfid_to_scan">BACK</a>
    </div>
    <div class="btn btn-primary my-3">
        <a href="<?php echo base_url() ?>/RFID_demo_kit/RFID_scan_tag_controller" class="button_rfid_to_scan">RFID Scan Tag</a>
    </div>

</div>
<!-- ========== GameCanvas ========== -->

<?= $this->endSection(); ?>

<script>