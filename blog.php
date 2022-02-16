<?php
include('dashboard/functions.php');
$posts = $Post->getData();
$postss = $Post->getRecentedData();
include('header.php'); ?>
<section class="blogSec1">
    <h3>Blog</h3>
    <div>
        <a href="index.php">Home</a>
        <p> /Blog</p>
    </div>
</section>

<section class="container">
    <div class="row">
        <div class="col-md-8 col-sm-6">
            <?php
            foreach ($posts as $post) {
            ?>
                <div class="blogitem">
                    <a href="<?php printf('%s?id=%s', 'postDetail.php',  $post['id']); ?>">
                        <img src="uploads/posts/<?php echo $post['photo']  ?>" alt="">

                        <h3><?php echo $post['title']  ?></h3>
                    </a>
                    <p><?php echo $post['description']  ?></p>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="col-md-4 col-sm-6 sideBlog">
            <div class="serachhh">
                <h3>Search</h3>
                <form>
                    <input type="text" placeholder="Search">
                    <div><i class="fas fa-search"></i></div>
                </form>
            </div>
            <div class="Bloglatest">
                <h3>Latest posts</h3>

                <?php
                foreach ($postss as $postt) {
                ?>
                    <a href="<?php printf('%s?id=%s', 'postDetail.php',  $postt['id']); ?>">
                        <div class="blogrecent">
                            <img src="uploads/posts/<?php echo $postt['photo']  ?>" alt="">
                            <h3><?php echo $postt['title']  ?></h3>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>

        </div>
    </div>
</section>


<?php
include('footer.php');
?>