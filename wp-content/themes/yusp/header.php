<!doctype html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

<head>
    <!--
    __  ____  ___________
    / / / / / / / ___/ __ \
    / /_/ / /_/ (__  ) /_/ /
    \__, /\__,_/____/ .___/
    /____/          /_/
    -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title><?php wp_title( 'yusp personalization system', true, 'right' ); ?></title>
    <!-- STYLESHEETS -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/yusp.min.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/fonts.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.css" />
    <!-- TYPOGRAPHY -->
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700,900" rel="stylesheet">
    <!-- JAVASCRIPT LIBS-->
  <!--  <script async type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
    <!-- JAVASCRIPT-->
   <!-- <script type="application/javascript" async  src="<?php echo get_stylesheet_directory_uri(); ?>/js/lib/flickity/flickity.pkgd.min.js"></script>
    <script rel="script" async  src="<?php echo get_stylesheet_directory_uri(); ?>/js/nouislider.min.js"></script>-->
   <!-- <script async  src="<?php echo get_stylesheet_directory_uri(); ?>/dist/yusp.min.js"></script>-->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>