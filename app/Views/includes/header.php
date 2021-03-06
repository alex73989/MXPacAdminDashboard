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

    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/custom.css">
    
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/layers.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/sass.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/errors.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/dashboard/responsive.css">

</head>

<?php date_default_timezone_set('Asia/Kuala_Lumpur'); ?>

<body>