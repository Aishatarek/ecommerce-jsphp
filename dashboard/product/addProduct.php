<?php
include('../functions.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {

        $name = "'" . $_POST['name'] . "'";
        $price = $_POST['price'];
        $description = "'" . $_POST['description'] . "'";
        $image =  $_FILES['image'];
        $image2 =  $_FILES['image2'];
        $image3 =  $_FILES['image3'];
        $image4 =  $_FILES['image4'];
        $brand = "'" . $_POST['brand'] . "'";
        $product->addProduct($name, $price, $description, $image, $image2, $image3, $image4, $brand);
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

                <div class="theform2">
                    <div>
                        <img src="../../images/pexels-mister-mister-380782.jpg" alt="">
                    </div>
                    <form action="" method="POST" class="login-email" enctype="multipart/form-data">
                        <p style="font-size: 2rem; font-weight: 800;">Add Product</p>
                        <div class="input-group">
                            <input type="text" placeholder="Title" name="name" required>
                        </div>
                        <div class="input-group">
                            <input type="text" placeholder="Price" name="price" required>
                        </div>
                        <div class="input-group">
                            <textarea name="description"></textarea>
                        </div>
                        <div class="input-group">
                            <input type="file" name="image" required>
                        </div>
                        <div class="input-group">
                            <input type="file" name="image2" required>
                        </div>
                        <div class="input-group">
                            <input type="file" name="image3" required>
                        </div>
                        <div class="input-group">
                            <input type="file" name="image4" required>
                        </div>
                        <div class="input-group">
                            <input type="text" placeholder="brand" name="brand" required>
                        </div>
                        <div class="input-group">
                            <button name="submit" class="btn">add product</button>
                        </div>
                        <p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('../../footer.php');
    ?>