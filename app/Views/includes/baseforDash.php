<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if (isset($page_title)) {
            echo $page_title;
        } ?>
    </title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/layers.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/sass.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/errors.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/responsive.css">

    <!-- Charts CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/chart/apexcharts.css">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.1.0/b-colvis-2.1.0/b-html5-2.1.0/b-print-2.1.0/cr-1.5.5/date-1.1.1/fc-4.0.1/fh-3.2.0/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.0/sp-1.4.0/sl-1.3.3/sr-1.0.1/datatables.min.css"/>

    <!-- Alertify CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

</head>

<?php date_default_timezone_set('Asia/Kuala_Lumpur'); ?>

<body>

<?= $this->renderSection("content"); ?>

    <!-- Optional Javascript -->
    <!-- <script src="<?php echo base_url() ?>/public/js/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Alertify JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- DataTables Javascript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.1.0/b-colvis-2.1.0/b-html5-2.1.0/b-print-2.1.0/cr-1.5.5/date-1.1.1/fc-4.0.1/fh-3.2.0/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.0/sp-1.4.0/sl-1.3.3/sr-1.0.1/datatables.min.js"></script>

    <!-- Toastr CodeSeven Javascript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- SweetAlert2 Javascript -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap 5 and FontAwesome 6 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0c45dfaf87.js" crossorigin="anonymous"></script>
    
    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="<?php echo base_url() ?>/public/js/chart/chart.js"></script>

    <script src="<?php echo base_url() ?>/public/js/main.js"></script>


</body>

</html>