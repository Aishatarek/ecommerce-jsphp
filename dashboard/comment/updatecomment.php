<?php
include('../functions.php');
$item_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit_submit'])) {
        $user_id = $_POST['user_id'];
        $post_id = $_POST['post_id'];
        $description = "'" . $_POST['description'] . "'";

        $Comment->updateComment($item_id, $user_id, $post_id, $description);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="../../index.css">
    <title>Document</title>
</head>

<body>
    <?php
    include('../headerr.php');
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php
            include('../sidenavv.php');
            ?>
            <div class="col-lg-10 col-md-9 col-sm-12 container-fluid">
                <?php
                foreach ($Comment->getData() as $comentt) :
                    if ($comentt['id'] == $item_id) :

                ?>
                        <div class="theform2">
                            <div>
                                <img src="../../images/pexels-mister-mister-380782.jpg" alt="">
                            </div>
                            <form method="post" enctype="multipart/form-data">

                                <select name="user_id">
                                    <?php foreach ($User->getData() as $userr)
                                        if ($userr['id'] == $comentt["user_id"]) {; ?>
                                        <option value="<?php echo $userr['id'] ?>" selected> <?php echo $userr['username'] ?> </option>
                                    <?php  } else { ?>
                                        <option value="<?php echo $userr['id'] ?>"> <?php echo $userr['username'] ?> </option>
                                    <?php    }
                                    ?>
                                </select>

                                <select name="post_id">
                                    <?php foreach ($Post->getData() as $postt)
                                        if ($postt['id'] == $comentt["post_id"]) {; ?>
                                        <option value="<?php echo $postt['id'] ?>" selected> <?php echo $postt['title'] ?> </option>
                                    <?php  } else { ?>
                                        <option value="<?php echo $postt['id'] ?>"> <?php echo $postt['title'] ?> </option>
                                    <?php    }
                                    ?>
                                </select>

                                <textarea name="description" placeholder="Comment" rows="2"><?php echo $comentt['description']; ?></textarea>
                                <button type="submit" name="edit_submit">submit</button>
                            </form>

                        </div>
                <?php

                    endif;
                endforeach;
                ?>
            </div>
        </div>
    </div>
    <?php
    include('../../footer.php');
    ?>