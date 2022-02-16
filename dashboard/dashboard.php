<?php
session_start();
if ($_SESSION['role'] != 'admin'||!isset($_SESSION['role'])) {
    header("Location: ../index.php");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="../index.css">
    <title>Document</title>
</head>

<body>
    <?php
    include('header.php');
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php
            include('sidenav.php');
            ?>
            <div class="col-lg-10 col-md-9 col-sm-12 parentcardd container-fluid">
                <div class='row cardss'>
                    <div class='col-lg-6 cardy col-md-6 col-sm-12'>
                        <a class='linkuser' href='user/displayusers.php'>
                            <div class='users'>
                                <i class='fas fa-users'></i>
                                <p>Users</p>
                            </div>
                        </a>
                    </div>
                    <div class='col-lg-6 cardy col-md-6 col-sm-12'>
                        <a class='linkcategory' href='product/displayProducts.php'>
                            <div class='categories'>
                                <i class="fas fa-shapes"></i>
                                <p>Products</p>

                            </div>
                        </a>
                    </div>
                </div>
                <div class='row cardss'>
                    <div class='col-lg-6 cardy col-md-6 col-sm-12'>
                        <a class='linkpost' href='post/displayPosts.php'>
                            <div class='posts'>
                                <i class="fas fa-mail-bulk"></i>
                                <p>Posts</p>
                            </div>
                        </a>
                    </div>
                    <div class='col-lg-6 cardy col-md-6 col-sm-12'>
                        <a class='linkcomment' href='comment/displayComments.php'>
                            <div class='comment'>
                                <i class="fas fa-comments"></i>
                                <p> Comments</p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <?php

    include('../footer.php');
    ?>