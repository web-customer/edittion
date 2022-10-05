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
<?php
$run   = mysqli_query($connect, "SELECT * FROM `gallery` WHERE active='Yes' ORDER BY id DESC");
$count = mysqli_num_rows($run);
?>
    <section class="main-content bn-category-grid pt-0">
        <div class="container">
            <div class="row bn-gutter-30">
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <?php
                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($run)) {
                        ?>
                            <div class="col-md-6">
                                <div class="bn-post-block-style">
                                    <div class="bn-post-thumb">
                                        <a href="#">
                                            <img class="img-fluid" src="<?php echo $row['image']; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="bn-post-content">
                                        <h2 class="bn-post-title title-md">
                                            <a href="#"><?php echo $row['title']; ?></a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        <?php } } ?>
                    </div>
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