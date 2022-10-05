<?php
include "core.php";
include "header.php";

if ($logged == 'No') {
    echo '<meta http-equiv="refresh" content="0;url=login.php">';
    exit;
}
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
                        <li><i class="fa fa-angle-right"></i>Profile</li>
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

                </div>
                <!-- Col End -->
                <div class="col-lg-4 col-md-12">
                    <!-- Start Sidebar -->
                    <?php include "sidebar.php"?>
                    <!-- Sidebar End -->
                </div>
                <!-- Col End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </section>
<?php
include "footer.php";
?>