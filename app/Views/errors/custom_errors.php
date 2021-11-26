<?= $this->extend('includes/base') ?>

<?= $this->section("content") ?>
<section>
    <div class="container">
        <div class="row">

            <!-- First 404 Errors -->
            <!--
                <div class="site">
                    <div class="sketch">
                        <div class="bee-sketch red"></div>
                        <div class="bee-sketch blue"></div>
                    </div>

                    <h1>404:
                        <small>Players Not Found</small>
                    </h1>
                </div> -->

            <!-- Second 404 Errors -->
            <div id="notfound">
                <div class="notfound-bg">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="notfound">
                    <div class="notfound-404">
                        <h1>404</h1>
                    </div>
                    <h2>Page Not Found</h2>
                    <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
                    <a href="<?php echo base_url() ?>/home-routes">Homepage</a>
                    <div class="notfound-social">
                        <a href="#">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-pinterest"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection() ?>