<?php
include "core.php";
include "header.php";

$id = (int) $_GET['id'];
if (empty($id)) {
    echo '<meta http-equiv="refresh" content="0;url=index.php">';
    exit;
}

$run = mysqli_query($connect, "SELECT * FROM `pages` WHERE id='$id' LIMIT 1");
if (mysqli_num_rows($run) == 0) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
    exit;
}

$row = mysqli_fetch_assoc($run);
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
                    <li><i class="fa fa-angle-right"></i><?php echo $row['title']; ?></li>
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
<section class="main-content pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="bn-single-post">
                    <div class="bn-single-post-header">
                        <h2 class="bn-post-title title-lg"><?php echo $row['title']; ?></h2>
                    </div>
                    <!-- Single Post Header End -->
                    <div class="bn-single-post-content">
                        <?php echo html_entity_decode($row['content']); ?>
                    </div>
                </div>
                <!-- Single Post End -->
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
