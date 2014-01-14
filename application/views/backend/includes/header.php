<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php
    $title = isset($title) ? $title : 'Panel';
     echo 'ICENPESCO - ' . $title;
     ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
     
        <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.spacelab.css'); ?>">

        <link rel="stylesheet" href="<?php echo base_url('css/bootstrap-responsive.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('css/jquery.dataTables.css'); ?>">
         <link rel="stylesheet" href="<?php echo base_url('css/TableTools.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('css/main.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('js/uploadify/uploadify.css'); ?>">
        
        <!--[if lte IE 8]>
        <style>
        .row-fluid [class*="span"] { min-height: 20px; }
        </style>
        <![endif]-->

       <!-- <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
    -->
        <script src="<?php echo base_url('js/vendor/jquery-1.9.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/vendor/jquery-migrate-1.0.0.js'); ?>"></script>
        <script src="<?php echo base_url('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js'); ?>"></script>
        <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&amp;sensor=false"></script>-->
        <script src="<?php echo base_url('js/vendor/jquery.cookie.js'); ?>"></script>
          <script src="<?php echo base_url('js/vendor/swfobject.js'); ?>"></script>

    
      
        <script type="text/javascript">
        <!--
            var CI = {
              'base_url': '<?php echo site_url(); ?>' + '/',
              //'rest_url': 'http://cenpesco.dontemplates.com/rest/index.php/cenpesco/',
              'rest_url': 'http://192.168.200.250/cenpesco/rest/index.php/cenpesco/',
              'site_url': '<?php echo base_url(); ?>',
              'year' : <?php echo date("Y"); ?>,
              'cct' : $.cookie('csrf_cookie_c')
            };
        -->
        </script>

  <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url('img/ico/favicon.ico'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo base_url('img/ico/apple-touch-icon-57x57-precomposed.png'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('img/ico/apple-touch-icon-114x114-precomposed.png'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('img/ico/apple-touch-icon-72x72-precomposed.png'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('img/ico/apple-touch-icon-144x144-precomposed.png'); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('img/ico/apple-touch-icon-57-precomposed.png'); ?>">

    </head>
    
    <body>
        <!--[if lt IE 8]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

