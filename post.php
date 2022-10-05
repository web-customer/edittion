<?php
include "core.php";
include "header.php";
?>

<?php
$id = (int) $_GET['id'];

if (empty($id)) {
    echo '<meta http-equiv="refresh" content="0; url=blog.php">';
    exit;
}

$runq = mysqli_query($connect, "SELECT * FROM `posts` WHERE active='Yes' AND id='$id'");
if (mysqli_num_rows($runq) == 0) {
    echo '<meta http-equiv="refresh" content="0; url=blog.php">';
    exit;
}

mysqli_query($connect, "UPDATE `posts` SET views = views + 1 WHERE active='Yes' and id='$id'");
$row         = mysqli_fetch_assoc($runq);
$post_id     = $row['id'];
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
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><i class="fa fa-angle-right"></i><?php echo post_category($row['category_id']) ?></li>
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
                        <ul class="bn-post-meta">
                            <li class="bn-post-author">
                                <a href="#"><img alt="" src="assets/images/100x100.png"><strong><?php echo post_author($row['author_id']); ?></strong></a>
                            </li>
                            <li>
                                <a href="#"><i class="far fa-clock"></i> <?php echo $row['date'] . ', ' . $row['time']; ?></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-comments"></i><?php echo post_commentscount($row['id']); ?> Comments</a>
                            </li>
                            <li>
                                <a href="#" class="view"><i class="fab fa-gripfire"></i> <?php echo $row['views']; ?></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-eye"></i>3 minutes read</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Single Post Header End -->
                    <div class="bn-single-post-content">
                        <?php
                        if ($row['image'] != '') {
                            echo '<img src="' . $row['image'] . '" width="100%" height="260" alt="' . $row['title'] . '"/>';
                        }
                        ?>

                        <br /> <br />
                        <?php echo html_entity_decode($row['content']); ?>
                    </div>


                    <!-- Single Post Content End -->
                    <div class="bn-single-post-footer">
                        <div class="bn-tag-lists">
                            <span>Tags: </span><a href="<?php echo 'category.php?id=' . $row['category_id']; ?>"><?php echo post_category($row['category_id']) ?></a>
                        </div>

                        <!-- Tag Lists -->
                        <div class="bn-author-box d-flex">
                            <div class="bn-author-img flex-grow-1">
                                <img src="assets/images/100x100.png" alt="">
                            </div>
                            <div class="bn-author-info">
                                <h3><?php echo post_author($row['author_id']); ?></h3>
                                <p>This helps them to function like healthy individuals in life as they learn to draw a line as and when needed in a relation. This greatly helps in the emotional development of an individual. However.</p>
                            </div>
                        </div>

                        <!-- Author Box -->
                        <div class="bn-post-navigation clearfix">
                            <div class="bn-post-previous float-left">
                                <a href="#">
                                    <img src="assets/images/100x70.png" alt="">
                                    <span>Read Previous</span>
                                    <p>
                                        The worth of a man lies in what he does well
                                    </p>
                                </a>
                            </div>
                            <div class="bn-post-next float-right">
                                <a href="#">
                                    <img src="assets/images/100x70.png" alt="">
                                    <span>Read Next</span>
                                    <p>
                                        Better have a wise enemy than a foolish friend
                                    </p>
                                </a>
                            </div>
                        </div>

                        <!-- Post Navigation -->
                        <div class="bn-gap-30"></div>

                        <!-- Realted Post Start -->
                        <div class="bn-related-post">
                            <h2 class="bn-block-title">Realted Post</h2>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="bn-post-block-style">
                                        <div class="bn-post-thumb">
                                            <a href="#">
                                                <img class="img-fluid" src="assets/images/800x520.png" alt="">
                                            </a>
                                        </div>
                                        <!-- Post Thumb End -->
                                        <div class="bn-post-content">
                                            <h2 class="bn-post-title">
                                                <a href="#">It wasn’t raining when Noah built the ark</a>
                                            </h2>
                                            <div class="bn-post-meta bn-mb-7 p-0">
                                                <span class="bn-post-date"><i class="far fa-clock"></i> 26 Jan, 2021</span>
                                            </div>
                                        </div>
                                        <!-- Post Content End -->
                                    </div>
                                    <!-- Post Block Style End -->
                                </div>
                                <!-- Col End -->
                                <div class="col-md-4">
                                    <div class="bn-post-block-style">
                                        <div class="bn-post-thumb">
                                            <a href="#">
                                                <img class="img-fluid" src="assets/images/800x520.png" alt="">
                                            </a>
                                        </div>
                                        <!-- Post Thumb End -->
                                        <div class="bn-post-content">
                                            <h2 class="bn-post-title">
                                                <a href="#">Don’t talk unless you can improve the silence</a>
                                            </h2>
                                            <div class="bn-post-meta bn-mb-7 p-0">
                                                <span class="bn-post-date"><i class="far fa-clock"></i> 26 Jan, 2021</span>
                                            </div>
                                        </div>
                                        <!-- Post Content End -->
                                    </div>
                                    <!-- Post Block Style End -->
                                </div>
                                <!-- Col End -->
                                <div class="col-md-4">
                                    <div class="bn-post-block-style">
                                        <div class="bn-post-thumb">
                                            <a href="#">
                                                <img class="img-fluid" src="assets/images/800x520.png" alt="">
                                            </a>
                                        </div>
                                        <!-- Post Thumb End -->
                                        <div class="bn-post-content">
                                            <h2 class="bn-post-title">
                                                <a href="#">You will succeed because most people are lazy</a>
                                            </h2>
                                            <div class="bn-post-meta bn-mb-7 p-0">
                                                <span class="bn-post-date"><i class="far fa-clock"></i> 26 Jan, 2021</span>
                                            </div>
                                        </div>
                                        <!-- Post Content End -->
                                    </div>
                                    <!-- Post Block Style End -->
                                </div>
                                <!-- Col End -->
                            </div>
                            <!-- Row End -->
                        </div>
                        <!-- Realted Post End -->

                        <div class="bn-gap-30"></div>

                        <!-- Comments Start -->
                        <!--
                        <div class="bn-comments-section">
                            <h3 class="bn-block-title"><span>03 Comments</span></h3>
                            <ul class="bn-comments-list">
                                <li>
                                    <div class="bn-comment">
                                        <img class="bn-comment-avatar pull-left" alt="" src="assets/images/80x80.png">
                                        <div class="bn-comment-body">
                                            <div class="meta-data">
                                                <span class="bn-comment-author">Jordan Michelle</span>
                                            </div>
                                            <div class="bn-comment-content">
                                                <p>Friendship is much beyond roaming together and sharing good moments, it is when someone comes to rescue you from the worst phase of life. Friendship is eternal.</p>
                                            </div>
                                            <div class="text-left">
                                                <a class="bn-comment-reply" href="#">Reply</a>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="bn-comments-reply">
                                        <li>
                                            <div class="bn-comment">
                                                <img class="bn-comment-avatar pull-left" alt="" src="assets/images/80x80.png">
                                                <div class="bn-comment-body">
                                                    <div class="bn-meta-data">
                                                        <span class="bn-comment-author">Liza Lopez</span>
                                                    </div>
                                                    <div class="bn-comment-content">
                                                        <p>Different people have different definitions of friendship. For some, it is the trust in an individual that he won’t hurt you. For others, it is unconditional love. There are some who feel that friendship is companionship.</p>
                                                    </div>
                                                    <div class="text-left">
                                                        <a class="bn-comment-reply" href="#">Reply</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    </ul>

                                    <div class="bn-comment last">
                                        <img class="bn-comment-avatar pull-left" alt="" src="assets/images/80x80.png">
                                        <div class="bn-comment-body">
                                            <div class="bn-meta-data">
                                                <span class="bn-comment-author">Mike Soul</span>
                                            </div>
                                            <div class="bn-comment-content">
                                                <p>It is when someone knows you better than yourself and assures to be your side in every emotional crisis. It is when you can sleep fighting and get another morning with a better understanding.</p>
                                            </div>
                                            <div class="text-left">
                                                <a class="bn-comment-reply" href="#">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        -->
                        <!-- Comment End -->

                        <!-- Comment Form -->
                        <!--
                        <div class="gap-50 d-none d-md-block"></div>
                        <div class="bn-comments-form">
                            <h3 class="title-normal">Leave a comment</h3>
                            <form method="POST" action="#">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control input-msg required-field" id="message" placeholder="Your Comment" rows="10" required=""></textarea>
                                        </div>
                                    </div>
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" name="name" id="name" placeholder="Your Name" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" name="email" id="email" placeholder="Your Email" type="email" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Your Website" type="text" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <button class="comments-btn btn btn-primary" type="submit">Post Comment</button>
                                </div>
                            </form>

                        </div>
                        -->
                    </div>
                    <!-- Single Post Footer End -->
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
