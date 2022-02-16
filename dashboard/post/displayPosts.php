<?php
include('../functions.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem_post'])) {
        $Post->deletePost($_POST['item_id']);
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
            <a href="addPost.php" class="addtotable"><button>Add Post</button></a>

                <table class="w-100 table-striped ">
                    <tr>
                  
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>-</th>
                    </tr>
                    <?php
                    foreach ($Post->getData() as $postt) :
                    ?>
                        <tr>
                            <td>
                                <img src="../../uploads/posts/<?php echo $postt["photo"] ?>" width="50px" alt="">
                            </td>
                            <td>
                                <p><?php echo $postt["title"] ?></p>
                            </td>
                            <td>
                                <p>$<?php echo $postt["description"] ?></p>
                            </td>

                            <td>
                                <form method="post">
                                    <input type="hidden" value="<?php echo $postt["id"] ?>" name="item_id">
                                    <button name="deleteItem_post" class="btn btn-outline-danger" type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                                <a href="<?php printf('%s?id=%s', 'updatepost.php',  $postt['id']); ?>">
                                    <button class="btn btn-outline-success"><i class="fas fa-edit"></i></button>
                                </a>
                                <a href="<?php printf('%s?id=%s', 'postDetail.php',  $postt['id']); ?>">
                                    <button class="btn btn-outline-info"><i class="fas fa-eye"></i></button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </table>
                </div>
        </div>
    </div>
                <?php
                include('../../footer.php');
                ?>