<?php
include "core.php";
include "header.php";
?>

<!-- Start Featured Section -->
<section class="bn-featured-section no-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php
                    $run = mysqli_query($connect, "SELECT * FROM `posts` WHERE active='Yes' ORDER BY id DESC LIMIT 3");
                    $count = mysqli_num_rows($run);
                    $first = [];
                    $second = [];
                    if ($count > 0) {
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($run)) {
                            if ($i > 1) {
                                $second[$i] = $row;
                            } else {
                                $first[$i] = $row;
                            }

                            $i++;
                        }
                    }
                    ?>
                    <?php if($first) { ?>
                    <div class="col-lg-7 col-md-12">
                        <div class="bn-slide bn-post-overaly-style post-lg" style="background-image:url(<?php echo $first[1]['image']; ?>)">
                            <a href="#" class="bn-image-link">&nbsp;</a>
                            <div class="bn-category">
                                <a class="bn-post-category" href="<?php echo 'category.php?id=' . $first[1]['category_id']; ?>"><?php echo post_category($first[1]['category_id']) ?></a>
                            </div>
                            <div class="bn-overlay-post-content featured-post">
                                <div class="bn-post-content">
                                    <h2 class="bn-post-title title-lg">
                                        <a href="<?php echo 'post.php?id=' . $first[1]['id']; ?>"><?php echo $first[1]['title']; ?></a>
                                    </h2>
                                    <div class="bn-post-meta bn-mb-7">
                                        <ul>
                                            <li class="bn-post-author"><a href="#"><i class="fa fa-user"></i> <?php echo post_author($first[1]['author_id']); ?></a></li>
                                            <li class="bn-post-date"><i class="far fa-clock"></i> <?php echo $first[1]['date'] . ', ' . $first[1]['time']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Post Content End -->
                            </div>
                            <!-- Overlay Post Content -->
                        </div>
                        <!-- Big Slide End -->
                    </div>
                    <?php } ?>
                    <?php if($second) { ?>
                    <div class="col-lg-5 col-md-12">
                        <div class="row">
                            <?php
                                foreach ($second as $row) {
                            ?>
                                <div class="col-md-12 bn-mrb-30">
                                <div class="bn-post-overaly-style post-extra-sm" style="background-image:url(<?php echo $row['image']; ?>)">
                                    <a href="#" class="bn-image-link">&nbsp;</a>
                                    <div class="bn-category">
                                        <a class="bn-post-category" href="<?php echo 'category.php?id=' . $row['category_id']; ?>"><?php echo post_category($row['category_id']) ?></a>
                                    </div>
                                    <div class="bn-overlay-post-content">
                                        <div class="bn-post-content">
                                            <h2 class="bn-post-title title-md">
                                                <a href="<?php echo 'post.php?id=' . $row['id']; ?>"><?php echo $row['title']; ?></a>
                                            </h2>
                                            <div class="bn-post-meta bn-mb-7">
                                                <ul>
                                                    <li class="bn-post-author"><a href="#"><i class="fa fa-user"></i> <?php echo post_author($row['author_id']); ?></a></li>
                                                    <li class="bn-post-date"><i class="far fa-clock"></i> <?php echo $row['date'] . ', ' . $row['time']; ?></li>
                                                </ul>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php }?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- Row End -->
            </div>
            <!-- Col End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</section>
<!-- Featured Section End -->

<?php
include "footer.php";
?>