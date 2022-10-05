<?php
include "core.php";
include "header.php";
?>


    <!-- Breadcrumb -->
    <div class="bn-breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="bn-breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="index.php">Home</a>
                        </li>
                        <li><i class="fa fa-angle-right"></i>Gallery</li>
                    </ol>
                </div>
                <!-- Col End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Start Main Content -->
    <section class="main-content bn-category-grid pt-0">
        <div class="container">
            <div class="row bn-gutter-30">
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="bn-post-block-style">
                                <div class="bn-post-thumb">
                                    <a href="#">
                                        <img class="img-fluid" src="assets/images/800x520.png" alt="">
                                    </a>
                                    <div class="bn-category">
                                        <a class="bn-post-category" href="#">Tech</a>
                                    </div>
                                </div>
                                <!-- Post Thumb End -->
                                <div class="bn-post-content">
                                    <h2 class="bn-post-title title-md">
                                        <a href="#">It wasn’t raining when Noah built the ark</a>
                                    </h2>
                                    <div class="bn-post-meta bn-mb-7">
                                        <span class="bn-post-author"><a href="#"><i class="fa fa-user"></i> James Bond</a></span>
                                        <span class="bn-post-date"><i class="far fa-clock"></i> 26 Jan, 2021</span>
                                    </div>
                                    <p>True friendship is perhaps the only relation that survives the trials and tribulations of time and remains unconditional.</p>
                                </div>
                                <!-- Post Content End -->
                            </div>
                            <!-- Post Block Style End -->
                        </div>
                    </div>
                    <!-- Row End -->
                    <div class="bn-gap-30"></div>
                    <div class="row">
                        <div class="col-12">
                            <div class="load-more-btn text-center">
                                <button class="btn"> Load More </button>
                            </div>
                        </div>
                        <!-- Col End -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Col End -->
                <div class="col-lg-4 col-md-12">
                    <!-- Start Sidebar -->
                    <?php include "sidebar.php"; ?>
                    <!-- Sidebar End -->
                </div>
                <!-- Col End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </section>
    <!-- Main Content End -->

<?php
include "footer.php";
?>