<?php
include "core.php";
include "header.php";

$run  = mysqli_query($connect, "SELECT * FROM `settings`");
$site = mysqli_fetch_assoc($run);
?>
<!-- Breadcrumb -->
<div class="bn-breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ol class="bn-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="#">Home</a>
                    </li>
                    <li><i class="fa fa-angle-right"></i>Contact us</li>
                </ol>
            </div>
            <!-- Col End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->

<?php
if (isset($_POST['send'])) {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $content = $_POST['text'];
    $date = date('d F Y');
    $time = date('H:i');

    $message = '';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = '<div class="alert alert-danger">The entered E-Mail Address is invalid.</div>';
    } else {
        $query = mysqli_query($connect, "INSERT INTO messages (name, email, content, date, time) VALUES('$name','$email','$content','$date','$time')");
        $message = '<div class="alert alert-success">Your message has been sent successfully.</div>';
    }
}
?>

<!-- Start Main Content -->
<section class="main-content pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="bn-Page-title">Contact Us</h2>
                <p>True friendship is perhaps the only relation that survives the trials and tribulations of time and remains unconditional. A unique blend of affection, loyalty, love, respect, trust and loads of fun is perhaps what describes the true meaning of friendship. Similar interests, mutual respect and strong attachment with each other are what friends share between each other. These are just the general traits of a friendship. To experience what is friendship, one must have true friends, who are indeed rare treasure.</p>
                <h3>Contact Form</h3>
                <!-- Start Form -->
                <form id="contact-form" action="" method="post">
                    <div class="error-container"></div>
                    <div class="row">
                        <div class="col-12"><?php echo $message; ?></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control form-control-name" name="name" id="name" placeholder="" type="text" required="">
                            </div>
                        </div>
                        <!-- Col End -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control form-control-email" name="email" id="email" placeholder="" type="email" required="">
                            </div>
                        </div>
                        <!-- Col End -->
                    </div>
                    <!-- Row End -->
                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control form-control-message" name="text" id="text" placeholder="" rows="10" required=""></textarea>
                    </div>
                    <div>
                        <button class="btn-submit btn btn-primary" name="send" type="submit" value="Send">Send Message</button>
                    </div>
                </form>
                <!-- Form End -->
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
