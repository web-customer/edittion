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
                    <li><i class="fa fa-angle-right"></i>Search</li>
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
if (isset($_GET['q'])) {
    $word = $_GET['q'];
    $postsperpage = 6;
    $pageNum = 1;
    if (isset($_GET['page'])) {
        $pageNum = $_GET['page'];
    }
    if (!is_numeric($pageNum)) {
        echo '<meta http-equiv="refresh" content="0; url=blog.php">';
        exit();
    }
    $rows = ($pageNum - 1) * $postsperpage;

    $run   = mysqli_query($connect, "SELECT * FROM `posts` WHERE (title LIKE '%$word%' OR content LIKE '%$word%') AND active='Yes' ORDER BY id DESC LIMIT $rows, $postsperpage");
    $count = mysqli_num_rows($run);
?>
<section class="main-content bn-category-grid pt-0">
    <div class="container">
        <div class="row bn-gutter-30">
            <div class="col-lg-8 col-md-12">
                <h2 class="bn-Page-title">Search</h2>
                <p class="bn-page-description">Friendship is much beyond roaming together and sharing good moments, it is when someone comes to rescue you from the worst phase of life. Friendship is eternal.</p>
                <div class="row">

                    <?php
                    if ($count <= 0) {
                        echo '<div class="alert alert-info">There are no published posts</div>';
                    } else {
                        while ($row = mysqli_fetch_assoc($run)) {
                    ?>
                        <div class="col-md-6">
                        <div class="bn-post-block-style">
                            <?php if($row['image'] != "") { ?>
                            <div class="bn-post-thumb">
                                <a href="<?php echo 'post.php?id=' . $row['id']; ?>">
                                    <img class="img-fluid" src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                                </a>
                                <div class="bn-category">
                                    <a class="bn-post-category" href="<?php echo 'category.php?id=' . $row['category_id']; ?>"><?php echo post_category($row['category_id']) ?></a>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- Post Thumb End -->
                            <div class="bn-post-content">
                                <h2 class="bn-post-title title-md">
                                    <a href="<?php echo 'post.php?id=' . $row['id']; ?>"><?php echo $row['title']; ?></a>
                                </h2>
                                <div class="bn-post-meta bn-mb-7">
                                    <span class="bn-post-author"><a href="#"><i class="fa fa-user"></i> <?php echo post_author($row['author_id']); ?></a></span>
                                    <span class="bn-post-date"><i class="far fa-clock"></i> <?php echo $row['date'] . ', ' . $row['time']; ?></span>
                                </div>
                                <p><?php echo short_text(strip_tags(html_entity_decode($row['content'])), 400); ?></p>
                            </div>
                            <!-- Post Content End -->
                        </div>
                        <!-- Post Block Style End -->
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>

                <?php
                $query   = "SELECT COUNT(id) AS numrows FROM posts WHERE category_id='$category_id' and active='Yes'";
                $result  = mysqli_query($connect, $query);
                $row     = mysqli_fetch_array($result);
                $numrows = $row['numrows'];

                if ($count > 0 && $numrows > $postsperpage) {
                ?>
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
                <?php
                }
                ?>
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
} else {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
    exit();
}
?>
<?php
include "footer.php";
?>
