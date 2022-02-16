<?php
include('dashboard/functions.php');
$posts = $Post->getData();
$users = $User->getData();
$comments = $Comment->getData();
include('header.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $post_id = $_GET['id'];
    $description = "'" . $_POST['description'] . "'";


    $Comment->addComment($user_id, $post_id, $description);
    $comments = $Comment->getData();
    $users = $User->getData();
}



$item_id = $_GET['id'];
foreach ($posts as $post) :
    if ($post['id'] == $item_id) :
?>

        <section class="blogDetail">
            <img src="uploads/posts/<?php echo $post['photo']  ?>" alt="">
            <div class="container">
                <h3><?php echo $post['title']  ?></h3>
                <p><?php echo $post['description']  ?></p>
                <div class="row py-3">
                    <div class="col-md-6 col-sm-12">
                        <img src="images/image-45-copyright_480x480.jpg" alt="">

                    </div>
                    <p class="col-md-6 col-sm-12">Condimentum erat penatibus, vestibulum donec. Velit lorem incidunt nibh commodo, arcu pretium in fusce sodales neque. Ipsum nunc volutpat congue morbi mi, eget arcu, semper vivamus amet. Lectus praesent blandit donec interdum sit. Ante ut integer venenatis, vel auctor a. Leo ante vestibulum vestibulum, ut nibh porttitor duis wisi fermentum, quam ultricies odio vel. Neque magna accumsan a lacus, ultrices erat taciti parturient metus. Diam leo ipsum auctor, quis amet ac, bibendum rhoncus dictum integer urna. Mi vestibulum neque orci wisi aliquam a. Fusce turpis illum a morbi. Reiciendis tortor sit</p>

                </div>
                <p>Proin luctus, enim egestas, laoreet nec duis turpis ornare ut, et quam. Justo massa, ut commodo ligula animi leo, vestibulum morbi eu massa platea, neque rutrum hendrerit pellentesque pellentesque venenatis felis. Amet ultrices at felis curabitur, eget massa, felis massa eget, etiam aliquam blandit dis wisi eget posuere. Rutrum urna feugiat odio consectetuer porta, placerat feugiat blandit enim vel, quis wisi. Nec morbi volutpat urna, fugiat magna leo, a nam aenean nemo nullam auctor sem, fermentum nunc lacus et dui justo est, sapien tortor urna auctor.</p>
                <iframe src="https://player.vimeo.com/video/72258294" frameborder="0"></iframe>
                <p>Proin luctus, enim egestas, laoreet nec duis turpis ornare ut, et quam. Justo massa, ut commodo ligula animi leo, vestibulum morbi eu massa platea, neque rutrum hendrerit pellentesque pellentesque venenatis felis. Amet ultrices at felis curabitur, eget massa, felis massa eget, etiam aliquam blandit dis wisi eget posuere. Rutrum urna feugiat odio consectetuer porta, placerat feugiat blandit enim vel, quis wisi. Nec morbi volutpat urna, fugiat magna leo, a nam aenean nemo nullam auctor sem, fermentum nunc lacus et dui justo est, sapien tortor urna auctor.</p>
                <?php
            foreach ($comments as $comment) :
                if ($comment['post_id'] == $item_id) : ?>
                    <div class="commentt">
                        <?php
                        foreach ($users as $commenter) {
                            if ($commenter['id'] == $comment['user_id']) {
                        ?>
                                <div class="d-flex align-items-baseline">
                                    <i class="fas fa-user"></i>
                                    <h6 class="ml-2"><?php echo $commenter['username'] ?> </h6>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <p><?php echo $comment['description'] ?></p>
                    </div>

            <?php endif;
            endforeach; ?>
            </div>
         
        </section>


        <form action="" method="POST" class="commentform container">
            <h3>Leave A Comment</h3>
            <textarea name="description" required></textarea>
            <input type="hidden" name="post_id" value="<?php echo $post['id'] ?>" required>
            <button type="submit">Add Comment</button>

        </form>
<?php

    endif;
endforeach;
include('footer.php');
?>