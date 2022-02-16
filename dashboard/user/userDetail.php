<?php
include('../functions.php');
$item_id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['delete_user'])) {
        $User->deleteUser($_POST['item_id']);
    }
} ?>

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
            <div class="col-lg-10 col-md-9 col-sm-12 container-fluid thedetailll">

                <?php

                foreach ($User->getData() as $userr) :
                    if ($userr['id'] == $item_id) :

                ?>
                        <div class="thedetailsss">
                            <span>Avatar:</span>
                            
                            <img src="../../uploads/users/<?php echo $userr["avatar"] ?>" width="50px" alt="">
                          
                            
                            <p><span>User Name</span><?php echo $userr["username"] ?></p>
                        
                            
                            <p><span>Email</span><?php echo $userr["email"] ?></p>
                            <div class="d-flex justify-content-around">
                                <form method="post">
                                    <input type="hidden" value="<?php echo $userr["id"] ?>" name="item_id">
                                    <button name="delete_user" class="deletebtn" type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                                <a href="<?php printf('%s?id=%s', 'updateuser.php',  $userr['id']); ?>">
                                    <button class="editbtn"><i class="fas fa-edit"></i></button>
                                </a>
                            </div>
                        </div>

                <?php

                    endif;
                endforeach;
                ?>
            </div>
        </div>
    </div>
    <?php
    include('../../footer.php')

    ?>