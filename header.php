<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $run  = mysqli_query($connect, "SELECT * FROM `settings`");
    $site = mysqli_fetch_assoc($run);
    ?>
    <!-- Basic Page -->
    <meta charset="UTF-8">
    <?php
    // SEO Titles
    if (basename($_SERVER['SCRIPT_NAME']) == 'contact.php') {
        $pagetitle = 'Contact';
    } else if (basename($_SERVER['SCRIPT_NAME']) == 'gallery.php') {
        $pagetitle = 'Gallery';
    } else if (basename($_SERVER['SCRIPT_NAME']) == 'blog.php') {
        $pagetitle = 'Blog';
    } else if (basename($_SERVER['SCRIPT_NAME']) == 'profile.php') {
        $pagetitle = 'Profile';
    } else if (basename($_SERVER['SCRIPT_NAME']) == 'login.php') {
        $pagetitle = 'Sign In';
    } else if (basename($_SERVER['SCRIPT_NAME']) == 'unsubscribe.php') {
        $pagetitle = 'Unsubscribe';
    } else if (basename($_SERVER['SCRIPT_NAME']) == 'search.php') {
        $word      = $_GET['q'];
        $pagetitle = 'Search results for "' . $word . '"';
    } else if (basename($_SERVER['SCRIPT_NAME']) == 'post.php') {
        $id = (int) $_GET['id'];

        if (empty($id)) {
            echo '<meta http-equiv="refresh" content="0; url=blog.php">';
            exit;
        }

        $runpt = mysqli_query($connect, "SELECT * FROM `posts` WHERE id='$id'");
        if (mysqli_num_rows($runpt) == 0) {
            echo '<meta http-equiv="refresh" content="0; url=blog.php">';
            exit;
        }
        $rowpt = mysqli_fetch_assoc($runpt);

        $pagetitle = $rowpt['title'];
    } else if (basename($_SERVER['SCRIPT_NAME']) == 'page.php') {
        $id = (int) $_GET['id'];

        if (empty($id)) {
            echo '<meta http-equiv="refresh" content="0; url=index.php">';
            exit;
        }

        $runpp = mysqli_query($connect, "SELECT * FROM `pages` WHERE id='$id'");
        if (mysqli_num_rows($runpp) == 0) {
            echo '<meta http-equiv="refresh" content="0; url=index.php">';
            exit;
        }
        $rowpp = mysqli_fetch_assoc($runpp);

        $pagetitle = $rowpp['title'];
    } else if (basename($_SERVER['SCRIPT_NAME']) == 'category.php') {
        $id = (int) $_GET['id'];

        if (empty($id)) {
            echo '<meta http-equiv="refresh" content="0; url=blog.php">';
            exit;
        }

        $runct = mysqli_query($connect, "SELECT * FROM `categories` WHERE id='$id'");
        if (mysqli_num_rows($runct) == 0) {
            echo '<meta http-equiv="refresh" content="0; url=blog.php">';
            exit;
        }
        $rowct = mysqli_fetch_assoc($runct);

        $pagetitle = $rowct['category'];
    }

    if (basename($_SERVER['SCRIPT_NAME']) == 'index.php') {
        echo '<title>' . $site['sitename'] . '</title>';
        $mt3 = "mt-3";
    } else {
        $mt3 = "";
        echo '<title>' . $pagetitle . ' - ' . $site['sitename'] . '</title>';
    }
    ?>
    <meta name="description" content="<?php echo $site['description']; ?>" />

    <!-- Mobile Specific -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">

    <!-- Owl Slider Styles -->
    <link rel="stylesheet" href="assets/css/vendor/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/vendor/owl.carousel.min.css">

    <!-- Magnific Styles -->
    <link rel="stylesheet" href="assets/css/vendor/magnific-popup.css">

    <!-- Animate Styles -->
    <link rel="stylesheet" href="assets/css/vendor/animate.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/vendor/fontawesome.min.css">

    <!-- Colorbox -->
    <link rel="stylesheet" href="assets/css/vendor/colorbox.css">

    <!-- Main Styles -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Spaces Styles -->
    <link rel="stylesheet" href="assets/css/spaces.css">

    <!-- Responsive Styles -->
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="assets/js/vendor/html5shiv.js"></script>
    <script src="assets/js/vendor/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- Start Top Section -->
<div class="bn-top">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="bn-breaking-title">
                        <span class="bn-breaking-title-text">Breaking News</span>
                    </div>
                    <div id="bn-breaking-news">
                        <ul class="fade">
                            <li>
                                <div class="breaking-news-item">
                                    <a href="#">The worth of a man lies in what he does well</a>
                                </div>
                            </li>
                            <!-- Breaking News Item 1 End -->
                            <li>
                                <div class="breaking-news-item">
                                    <a href="#">Better have a wise enemy than a foolish friend</a>
                                </div>
                            </li>
                            <!-- Breaking News Item 2 End -->
                            <li>
                                <div class="breaking-news-item">
                                    <a href="#">The fear of God is the beginning of wisdom</a>
                                </div>
                            </li>
                            <!-- Breaking News Item 3 End -->
                            <li>
                                <div class="breaking-news-item">
                                    <a href="#">It wasn’t raining when Noah built the ark</a>
                                </div>
                            </li>
                            <!-- Breaking News Item 4 End -->
                        </ul>
                    </div>
                    <!-- Breaking News End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Col End -->
            <div class="col-md-3">
                <div class="bn-social-icons">
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <!-- Social Icons Item 1 End -->
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <!-- Social Icons Item 2 End -->
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <!-- Social Icons Item 3 End -->
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <!-- Social Icons Item 4 End -->
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        <!-- Social Icons Item 5 End -->
                    </ul>
                </div>
                <!-- Social Icons End -->
            </div>
            <!-- Col End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Top Section End -->
<!-- Start Header Section -->
<header class="bn-header">
    <div class="bn-header-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="bn-logo">
                        <a href="index.php">
                            <img src="assets/images/header-logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- Logo Col End -->
                <div class="col-md-9">
                    <div class="bn-top-ad">
                        <a href="#">
                            <img class="img-fluid" src="assets/images/728x91.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- Ad col End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Content End -->
</header>
<!-- Header Section End -->
<!-- Start Main Navigation Section -->
<div class="main-nav clearfix bn-sticky">
    <div class="container">
        <div class="row justify-content-between">
            <nav class="navbar navbar-expand-lg col-lg-8">
                <div class="site-nav-inner float-left">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>
                    <!-- Navbar Toggler End -->
                    <div id="navbarSupportedContent" class="navbar-collapse navbar-responsive-collapse collapse">
                        <?php
                        $runq = mysqli_query($connect, "SELECT * FROM `menu`");
                        echo'<ul class="navbar-nav">';
                        while ($row = mysqli_fetch_assoc($runq)) {
                            if ($row['path'] == 'blog.php') {
                                echo'<li class="nav-item dropdown">';
                                echo'<a href="#" class="nav-link menu-dropdown" data-toggle="dropdown">'.$row['page'] .' <i class="fa fa-angle-down"></i></a>';
                                $run2 = mysqli_query($connect, "SELECT * FROM `categories`");
                                echo'<ul class="dropdown-menu fade-up" role="menu">';
                                echo'<li><a class="dropdown-item" href="blog.php">View all</a></li>';
                                while ($row2 = mysqli_fetch_array($run2)) {
                                    echo'<li><a class="dropdown-item" href="category.php?id=' . $row2['id'] . '">'.$row2['category'].'</a></li>';
                                }
                                echo'</ul>';
                             echo'</li>';
                            } else {
                                echo'<li class="nav-item ">';
                                    echo'<a class="nav-link" href="'.$row['path'].'">'.$row['page'].'</a>';
                                echo'</li>';
                            }
                        }
                        echo '</ul>';
                        ?>
                        <!-- Nav UL End -->
                    </div>
                    <!-- Navbar Collapse End -->
                </div>
                <!-- Site Nav Inner End -->
            </nav>
            <!-- Navbar End -->
            <div class="col-lg-4 text-right nav-search-wrap">
                <div class="nav-search">
                    <a href="#search-popup" class="bn-modal-popup">
                        <i class="fas fa-search"></i>
                    </a>
                </div>
                <!-- Search End -->
                <div class="zoom-anim-dialog mfp-hide modal-searchPanel bn-search-form" id="search-popup">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="bn-search-panel">
                                <form class="bn-search-group" method="get" action="search.php">
                                    <div class="input-group">
                                        <input type="search" class="form-control" name="q" placeholder="Search" value="">
                                        <button class="input-group-btn search-button">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
            </div>
            <!-- Col End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Menu Nav End -->
<div class="bn-gap-30"></div>