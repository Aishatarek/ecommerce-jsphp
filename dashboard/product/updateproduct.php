<?php
include('../functions.php');
$item_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit_submit'])) {
        function img($imgg)
        {
            if (isset($imgg) && $imgg["error"] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "rar" => "application/rar", "pdf" => "application/pdf");
                $filename = rand(0, 1000) . $imgg["name"];
                $filetype = $imgg["type"];
                $filesize = $imgg["size"];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
                if (in_array($filetype, $allowed)) {
                    if (file_exists("../../uploads/products/" . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        $result = move_uploaded_file($imgg["tmp_name"], "../../uploads/products/" . $filename);
                        echo "Your file was uploaded successfully.";
                    }
                } else {
                    echo "Error: There was a problem uploading your file. Please try again.";
                }
                if ($result) {
                    return "'" . $filename . "'";
                } else {
                    echo "Error: " . $imgg["error"];
                }
            }
        }


        $name = "'" . $_POST['name'] . "'";
        $price = $_POST['price'];
        $description = $_POST['description'];
        $image = img($image);
        $image2 = img($image2);
        $image3 = img($image3);
        $image4 = img($image4);

        $brand = "'" . $_POST['brand'] . "'";
        $product->updateProduct($item_id, $name, $price, $description, $image, $image2, $image3, $image4, $brand);
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
            <div class="col-lg-10 col-md-9 col-sm-12 container-fluid">

                <?php
                foreach ($product->getData() as $productt) :
                    if ($productt['id'] == $item_id) :

                ?>
                        <div class="theform2">
                            <div>
                                <img src="../../images/pexels-mister-mister-380782.jpg" alt="">
                            </div>
                            <form method="post" enctype="multipart/form-data">
                                <input type="text" name="name" value="<?php echo $productt['name']; ?>">
                                <input type="text" name="price" value="<?php echo $productt['price']; ?>">
                                <textarea name="description"><?php echo $productt['description']; ?></textarea>
                                <span class="d-flex">
                                    <img src="../../uploads/products/<?php echo $productt["image"] ?>" width="50px" alt="">
                                    <img src="../../uploads/products/<?php echo $productt["image2"] ?>" width="50px" alt="">
                                    <img src="../../uploads/products/<?php echo $productt["image3"] ?>" width="50px" alt="">
                                    <img src="../../uploads/products/<?php echo $productt["image4"] ?>" width="50px" alt="">

                                </span>
                                <input type="file" name="image">
                                <input type="file" name="image2">
                                <input type="file" name="image3">
                                <input type="file" name="image4">

                                <input type="text" name="brand" value="<?php echo $productt['brand']; ?>">
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