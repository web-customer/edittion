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

                        <?php
                        $category_id = $row['category_id'];
                        $run   = mysqli_query($connect, "SELECT * FROM `posts` WHERE category_id='$category_id' and active='Yes' and id <> '$id'  ORDER BY id DESC LIMIT 5");
                        $count = mysqli_num_rows($run);
                        $first = [];
                        $second = [];
                        $third = [];
                        if ($count > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($run)) {
                                $third[] = $row;
                                if ($i === 1) {
                                    $first =  $row;
                                } else if ($i === 2) {
                                    $second = $row;
                                } else {
                                    $third[] = $row;
                                }
                                $i++;
                            }
                        }
                        ?>

                        <!-- Author Box -->
                        <div class="bn-post-navigation clearfix">
                            <div class="bn-post-previous float-left">
                                <?php if ($first) { ?>
                                <a href="<?php echo 'post.php?id=' . $first['id']; ?>">
                                    <img src="<?php echo $first['image']; ?>" alt="">
                                    <span>Read Previous</span>
                                    <p>
                                        <?php echo $first['title']; ?>
                                    </p>
                                </a>
                                <?php } ?>
                            </div>
                            <div class="bn-post-next float-right">
                                <?php if ($second) { ?>
                                    <a href="<?php echo 'post.php?id=' . $second['id']; ?>">
                                        <img src="<?php echo $second['image']; ?>" alt="">
                                        <span>Read Next</span>
                                        <p>
                                            <?php echo $second['title']; ?>
                                        </p>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>

                        <!-- Post Navigation -->
                        <div class="bn-gap-30"></div>

                        <!-- Realted Post Start -->
                        <div class="bn-related-post">
                            <h2 class="bn-block-title">Realted Post</h2>
                            <div class="row">
                                <?php if ($third) { foreach ($third as $row) { ?>
                                <div class="col-md-4">
                                    <div class="bn-post-block-style">
                                        <div class="bn-post-thumb">
                                            <a href="<?php echo 'post.php?id=' . $row['id']; ?>">
                                                <img class="img-fluid" src="<?php echo $row['image']; ?>" alt="">
                                            </a>
                                        </div>
                                        <!-- Post Thumb End -->
                                        <div class="bn-post-content">
                                            <h2 class="bn-post-title">
                                                <a href="<?php echo 'post.php?id=' . $row['id']; ?>"><?php echo $row['title']; ?></a>
                                            </h2>
                                            <div class="bn-post-meta bn-mb-7 p-0">
                                                <span class="bn-post-date"><i class="far fa-clock"></i>  <?php echo $row['date'] . ', ' . $row['time']; ?></span>
                                            </div>
                                        </div>
                                        <!-- Post Content End -->
                                    </div>
                                    <!-- Post Block Style End -->
                                </div>
                                <?php }} ?>
                            </div>
                            <!-- Row End -->
                        </div>
                        <!-- Realted Post End -->
                        <div class="bn-gap-30"></div>

                        <!-- Comments Start -->

                        <?php
                            $q     = mysqli_query($connect, "SELECT * FROM comments WHERE post_id='$row[id]' AND approved='Yes' ORDER BY id DESC");
                            $count = mysqli_num_rows($q);
                        ?>
                        <div class="bn-comments-section">
                            <h3 class="bn-block-title"><span><?php echo $count; ?> Comments</span></h3>
                            <ul class="bn-comments-list">
                                <?php
                                if ($count > 0) {
                                    while ($comment = mysqli_fetch_array($q)) {
                                        $aauthor = $comment['user_id'];

                                        if ($comment['guest'] == 'Yes') {
                                            $aavatar = 'assets/img/avatar.png';
                                            $arole   = '<span class="badge bg-secondary">Guest</span>';
                                        } else {

                                            $querych = mysqli_query($connect, "SELECT * FROM `users` WHERE id='$aauthor' LIMIT 1");
                                            if (mysqli_num_rows($querych) > 0) {
                                                $rowch = mysqli_fetch_assoc($querych);

                                                $aavatar = $rowch['avatar'];
                                                $aauthor = $rowch['username'];
                                                if ($rowch['role'] == 'Admin') {
                                                    $arole = '<span class="badge bg-danger">Administrator</span>';
                                                } elseif ($redprv['rolq'] == 'Editor') {
                                                    $arole = '<span class="badge bg-warning">Editor</span>';
                                                } else {
                                                    $arole = '<span class="badge bg-info">User</span>';
                                                }
                                            }
                                        }
                                ?>
                                <li>
                                    <div class="bn-comment">
                                        <img class="bn-comment-avatar pull-left" alt="" src="<?php echo $aavatar; ?>">
                                        <div class="bn-comment-body">
                                            <div class="meta-data">
                                                <span class="bn-comment-author"><?php echo $aauthor; ?></span>
                                            </div>
                                            <div class="bn-comment-content">
                                                <p><?php echo  emoticons($comment['comment']); ?></p>
                                            </div>
                                            <div class="text-left">
                                                <a class="bn-comment-reply" href="#">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php } } ?>
                            </ul>
                        </div>

                        <!-- Comment End -->

                        <!-- Comment Form -->

                        <div class="gap-50 d-none d-md-block"></div>
                        <div class="bn-comments-form">
                            <h3 class="title-normal">Leave a comment</h3>
                            <?php
                            $guest = 'No';

                            $queryst = mysqli_query($connect, "SELECT * FROM `settings` LIMIT 1");
                            $rowst   = mysqli_fetch_assoc($queryst);
                            if ($logged == 'No' AND $rowst['comments'] == 'guests') {
                                $cancomment = 'Yes';
                            } else {
                                $cancomment = 'No';
                            }
                            if ($logged == 'Yes') {
                                $cancomment = 'Yes';
                            }

                            if ($logged == 'No') {
                                $author = $_POST['author'];
                            } else {
                                $author = $rowu['id'];
                            }

                            if (isset($_POST['post'])) {
                                $queryst = mysqli_query($connect, "SELECT date_format FROM settings LIMIT 1");
                                $st      = mysqli_fetch_assoc($queryst);

                                $authname_problem = 'No';
                                $date             = date($st['date_format']);
                                $time             = date('H:i');

                                $comment = $_POST['message'];

                                $runq = mysqli_query($connect, "INSERT INTO `comments` (`post_id`, `comment`, `user_id`, `date`, `time`, `guest`) VALUES ('$row[id]', '$comment', '$author', '$date', '$time', '$guest')");
                                echo '<div class="alert alert-success">Your comment has been successfully posted</div>';
                            }
                            ?>
                            <form method="POST" action="post.php?id=<?php echo $id; ?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control input-msg required-field" id="message" placeholder="Your Comment" rows="10" required=""></textarea>
                                        </div>
                                    </div>
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" name="author" id="author" placeholder="Your Name" type="text" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <button class="comments-btn btn btn-primary"  value="Post"  name="post" type="submit">Post Comment</button>
                                </div>
                            </form>

                        </div>

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
