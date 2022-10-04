<!-- Ad Banner End -->
<div class="bn-gap-50"></div>
<!-- Newsletter Section Start -->
<div class="bn-newsletter-section">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-7 col-md-6">
                <div class="bn-newsletter-content">
                    <h2 class="bn-newsletter-heading">NEWSLETTER SIGNUP</h2>
                    <p>By subscribing to our mailing list you will always be update with the latest news from us.</p>
                </div>
            </div>
            <!-- Col End -->
            <div class="col-lg-5 col-md-6">
                <div class="bn-footer-newsletter">
                    <?php
                    if (isset($_POST['subscribe'])) {
                        $email = $_POST['email'];
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            echo '<div class="alert alert-danger">The entered E-Mail Address is invalid</div>';
                        } else {
                            $queryvalid = mysqli_query($connect, "SELECT * FROM `newsletter` WHERE email='$email' LIMIT 1");
                            $validator  = mysqli_num_rows($queryvalid);
                            if ($validator > 0) {
                                echo '<div class="alert alert-warning">This E-Mail Address is already subscribed.</div>';
                            } else {
                                $run = mysqli_query($connect, "INSERT INTO `newsletter` (email) VALUES ('$email')");
                                echo '<div class="alert alert-success">You have successfully subscribed to our newsletter.</div>';
                            }
                        }
                    }
                    ?>
                    <form action="#" method="post">
                        <div class="bn-email-form-group">
                            <input type="email" name="email" class="bn-newsletter-email" placeholder="Your email" required="">
                            <input type="submit" name="subscribe" class="bn-newsletter-submit" value="Subscribe">
                        </div>
                    </form>
                    <!-- Form End -->
                </div>
                <!-- Footer Newsletter End -->
            </div>
            <!-- Col End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Newsletter Section End -->
<!-- Start Footer Section -->
<div class="bn-footer">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="bn-footer-widget">
                    <div class="bn-widget-header">
                        <h2 class="bn-widget-title">Follow us</h2>
                    </div>
                    <div class="bn-widget-content">
                        <div class="bn-footer-logo">
                            <img class="img-fluid text-center" src="assets/images/footer-logo.png" alt="">
                        </div>
                        <div class="bn-footer-about-text">
                            <p class="text-muted">Here , write the complete address of the Registered office address along with telephone number.</p>
                        </div>
                        <div class="bn-footer-social-icons">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" title="twitter"><i class="fab fa-2x fa-twitter"></i></a>
                                </li>
                                <!-- Social Icons Item 1 End -->
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" title="facebook"><i class="fab fa-2x fa-facebook-f"></i></a>
                                </li>
                                <!-- Social Icons Item 2 End -->
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" title="instagram"><i class="fab fa-2x fa-instagram"></i></a>
                                </li>
                                <!-- Social Icons Item 3 End -->
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" title="pinterest"><i class="fab fa-2x fa-youtube"></i></a>
                                </li>
                                <!-- Social Icons Item 4 End -->
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" title="vimeo"><i class="fab fa-2x fa-google"></i></a>
                                </li>
                                <!-- Social Icons Item 5 End -->
                            </ul>
                        </div>
                        <!-- Social Icons End -->
                    </div>
                    <!-- Footer Widget Content End -->
                </div>
                <!-- Footer Widget End -->
            </div>
            <!-- Col End -->
            <div class="col-lg-4 col-md-6">
                <div class="bn-footer-widget">
                    <div class="bn-post-widget">
                        <div class="bn-widget-header">
                            <h2 class="bn-widget-title">Most Viewed Posts</h2>
                        </div>
                        <div class="bn-widget-content">
                            <div class="bn-list-post-block">
                                <?php
                                $run = mysqli_query($connect, "SELECT * FROM `posts` WHERE active='Yes' ORDER BY id DESC LIMIT 4");
                                $count = mysqli_num_rows($run);
                                if ($count <= 0) {
                                    echo 'There are no published posts';
                                } else {
                                    echo '<ul class="bn-list-post">';
                                    while ($row = mysqli_fetch_assoc($run)) {
                                        ?>
                                        <li>
                                            <div class="bn-post-block-style media">
                                                <?php
                                                if($row['image'] != "") {
                                                    ?>
                                                    <div class="bn-post-thumb">
                                                        <a href="<?php echo 'post.php?id=' . $row['id']; ?>">
                                                            <img class="img-fluid" src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                                                        </a>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <!-- Post Thumb End -->
                                                <div class="bn-post-content media-body">
                                                    <h2 class="bn-post-title">
                                                        <a href="<?php echo 'post.php?id=' . $row['id']; ?>"><?php echo $row['title']; ?></a>
                                                    </h2>
                                                    <div class="bn-post-meta bn-mb-7">
                                                        <span class="bn-post-date"><i class="far fa-clock"></i> <?php echo $row['date'] . ', ' . $row['time']; ?></span>
                                                    </div>
                                                </div>
                                                <!-- Post Content End -->
                                            </div>
                                            <!-- Post Block Style End -->
                                        </li>
                                        <?php
                                    }
                                    echo '</ul>';
                                }
                                ?>
                                <!-- List Post End -->
                            </div>
                        </div>
                        <!-- Widget Content End -->
                    </div>
                    <!-- Post Widget End -->
                </div>
                <!-- Footer Widget End -->
            </div>
            <!-- Col End -->
            <div class="col-lg-4 col-md-6">
                <div class="bn-footer-widget">
                    <div class="bn-post-widget">
                        <div class="bn-widget-header">
                            <h2 class="bn-widget-title">Most Viewed Posts</h2>
                        </div>
                        <div class="bn-widget-content">
                            <div class="bn-list-post-block">
                                <?php
                                $run = mysqli_query($connect, "SELECT * FROM `posts` WHERE active='Yes' ORDER BY views, id DESC LIMIT 4");
                                $count = mysqli_num_rows($run);
                                if ($count <= 0) {
                                    echo 'There are no published posts';
                                } else {
                                    echo '<ul class="bn-list-post">';
                                    while ($row = mysqli_fetch_assoc($run)) {
                                        ?>
                                        <li>
                                            <div class="bn-post-block-style media">
                                                <?php
                                                if($row['image'] != "") {
                                                    ?>
                                                    <div class="bn-post-thumb">
                                                        <a href="<?php echo 'post.php?id=' . $row['id']; ?>">
                                                            <img class="img-fluid" src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                                                        </a>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <!-- Post Thumb End -->
                                                <div class="bn-post-content media-body">
                                                    <h2 class="bn-post-title">
                                                        <a href="<?php echo 'post.php?id=' . $row['id']; ?>"><?php echo $row['title']; ?></a>
                                                    </h2>
                                                    <div class="bn-post-meta bn-mb-7">
                                                        <span class="bn-post-date"><i class="far fa-clock"></i> <?php echo $row['date'] . ', ' . $row['time']; ?></span>
                                                    </div>
                                                </div>
                                                <!-- Post Content End -->
                                            </div>
                                            <!-- Post Block Style End -->
                                        </li>
                                        <?php
                                    }
                                    echo '</ul>';
                                }
                                ?>
                            </div>
                            <!-- List Post Block End -->
                        </div>
                        <!-- Widget Content End -->
                    </div>
                    <!-- Post Widget End -->
                </div>
                <!-- Footer Widget End -->
            </div>
            <!-- Col End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Footer Section End -->
<!-- Start Copyrights Section -->
<div class="bn-copyright">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-6">
                <p>© Copyright 2021, All Rights Reserved</p>
            </div>
            <!-- Col End -->
            <div class="col-md-6">
                <div class="bn-copyright-menu">
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </div>
                <!-- Copyrights Menu End -->
            </div>
            <!-- Col End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Copyrights Section End -->
<!-- To Top Button Start-->
<div class="bn-back-to-top-btn">
    <div class="bn-back-to-top" style="display: block;">
        <a href="#" class="fas fa-angle-up" aria-hidden="true"></a>
    </div>
</div>
<!-- To Top Button End -->

<!-- Javascript Files
================================================== -->

<!-- Initialize jQuery Library -->
<script src="assets/js/vendor/jquery.js"></script>
<!-- Popper jQuery -->
<script src="assets/js/vendor/popper.min.js"></script>
<!-- Bootstrap jQuery -->
<script src="assets/js/vendor/bootstrap.min.js"></script>
<!-- jQuery Pop-up Search -->
<script src="assets/js/vendor/jquery.magnific-popup.min.js"></script>
<!-- Breaking News jQuery -->
<script src="assets/js/vendor/inewsticker.js"></script>
<!-- Owl Slider -->
<script src="assets/js/vendor/owl.carousel.min.js"></script>
<!-- Color box -->
<script src="assets/js/vendor/jquery.colorbox.js"></script>
<!-- Template Custom -->
<script src="assets/js/main.js"></script>
</body>
</html>