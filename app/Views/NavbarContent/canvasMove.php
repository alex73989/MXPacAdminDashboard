<?= $this->extend("includes/baseforCanvas"); ?>

<?php if (session()->has('logged_user')) : ?>
    <?= $this->section('welcome_username'); ?>
    <span>Welcome <?= ucfirst($userdata->username); ?></span>
    <?= $this->endSection() ?>
<?php endif; ?>

<?= $this->section("content"); ?>

<!-- ========== GameCanvas ========== -->
  <div>
    <button onmousedown="moveup()" onmouseup="clearmove()">UP</button>
    <br>
    <br>
    <button onmousedown="moveleft()" onmouseup="clearmove()">LEFT</button>
    <button onmousedown="moveright()" onmouseup="clearmove()">RIGHT</button>
    <br>
    <br>
    <button onmousedown="movedown()" onmouseup="clearmove()">DOWN</button>
    <button onmousedown="resetmove()">RESET</button>
  </div>

  <p>I have created a game area!</p>
  <p>Then I created a component to my game! I is a yellow square!</p>
  <p>I continued to add frames and movement</p>
  <p>After I had added movement, I could finally add controllers</p>
  <p>First I added the buttons that was controlled by the mouse,
    <br>then I added the keystroke controllers for the w,s,a,d keys.</p>

<!-- ========== GameCanvas ========== -->

<?= $this->endSection(); ?>

<script>