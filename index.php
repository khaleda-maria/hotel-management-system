<?php
ob_start();

require './classes/application.php';
$obj_app = new Application();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="Theme-Paradise" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link href='fonts/icomoon/style.css' rel='stylesheet' type='text/css'>

        <link href='assets/front_end_assets/css/jquery-ui.min.css' rel='stylesheet' type='text/css'>
        <link href='assets/front_end_assets/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <link href='assets/front_end_assets/css/animate.css' rel='stylesheet' type='text/css'>
        <link href='assets/front_end_assets/css/swiper.min.css' rel='stylesheet' type='text/css'>

        <link href='assets/front_end_assets/css/style.css' rel='stylesheet' type='text/css'>

        <title>Hotel Paradise</title>

        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] ||
                        function () {
                            (i[r].q = i[r].q || []).push(arguments)
                        }, i[r].l = 1 * new Date();
                a = s.createElement(o), m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-60023389-3', 'auto');
            ga('send', 'pageview');

        </script>

    </head>
    <body class="loading">

        <?php
        include 'includes/preloader.php';
        include 'includes/header.php';
        ?>
        <?php
        if (isset($pages)) {
            if ($pages == 'rooms') {
                include 'pages/rooms_content.php';
            } else if ($pages == 'facilities') {
                include 'pages/facilities_content.php';
            } else if ($pages == 'gallery') {
                include 'pages/gallery_content.php';
            } else if ($pages == 'reservation') {
                include 'pages/reservation_content.php';
            } else if ($pages == 'room_details') {
                include 'pages/room_details_content.php';
            } else if ($pages == 'registration') {
                include 'pages/registration_content.php';
            } else if ($pages == 'login') {
                include 'pages/login_content.php';
            } else if ($pages == 'bill') {
                include 'pages/bill_content.php';
            } else if ($pages == 'contact') {
                include 'pages/contact_content.php';
            } else if ($pages == 'cv') {
                include 'pages/cv_content.php';
                   }
               else if ($pages == 'login_menu') {
                include 'pages/login_menu_content.php';
         
            }
               else if ($pages == 'reservation_two') {
                include 'pages/reservation_by_room_id_content.php';
         
            }
               else if ($pages == 'customer_home_page') {
                include 'pages/customer_home_page_content.php';
         
            }
        } else {
            include 'includes/main_slider.php';
            include 'includes/home_content.php';
        }
        ?>
        <?php
        include 'includes/footer.php';
        ?>

        <script type="text/javascript" src="assets/front_end_assets/js/jquery.js"></script>
        <script type="text/javascript" src="assets/front_end_assets/js/jquery-ui.js"></script>
        <script type="text/javascript" src="assets/front_end_assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/front_end_assets/js/plugins.js"></script>
        <script type="text/javascript" src="assets/front_end_assets/js/functions.js"></script>
        <script type="text/javascript" src="assets/front_end_assets/js/wow.min.js"></script>
    </body>
</html>