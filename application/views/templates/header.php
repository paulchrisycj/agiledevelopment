<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>

    <style>
        .buttonLink{
            background:none!important;
            border:none;
            padding:0!important;

            /*optional*/
            font-family:arial,sans-serif; /*input has OS specific font-family*/
            color:#069;
            text-decoration:underline;
            cursor:pointer;
        }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>302CEM Agile Development</title>

    <!-- Bootstrap core CSS -->

    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/maps/jquery-jvectormap-2.0.3.css"/>
    <link href="<?php echo base_url(); ?>css/icheck/flat/green.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>css/floatexamples.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/datatables/css/jquery.dataTables.css">

    <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>js/nprogress.js"></script>

    <link href="<?php echo base_url(); ?>css/select/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>js/select/select2.full.js"></script>

    <!-- Table CSS -->
    <!--    <link rel="stylesheet" href="../css/table.css">-->

    <!--[if lt IE 9]>
    <!--<script src="/production/assets/js/ie8-responsive-file-warning.js"></script>-->
    <!--    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>-->
    <!--    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <!--    <![endif]-->

</head>

