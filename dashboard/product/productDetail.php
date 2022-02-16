<?php
include('../functions.php');
$item_id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem_product'])) {
        $product->deleteProduct($_POST['item_id']);
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
            <div class="col-lg-10 col-md-9 col-sm-12 container-fluid thedetailll">

<?php
foreach ($product->getData() as $productt) :
    if ($productt['id'] == $item_id) :

?>
                        <div class="thedetailsss">
                            <span>Product Images</span>
                            <br>
            <img src="../../uploads/products/<?php echo $productt["image"] ?>"  alt="">

            <img src="../../uploads/products/<?php echo $productt["image2"] ?>"  alt="">
            <img src="../../uploads/products/<?php echo $productt["image3"] ?>"  alt="">
            <img src="../../uploads/products/<?php echo $productt["image4"] ?>"  alt="">
   

            <p>    <span>The Name:</span><?php echo $productt["name"] ?></p>
            <p><span>The Price:</span>$<?php echo $productt["price"] ?></p>
            <p><span>The Brand:</span><?php echo $productt["brand"] ?></p>
            <div class="d-flex justify-content-around">
            <form method="post">
                <input type="hidden" value="<?php echo $productt["id"] ?>" name="item_id">
                <button name="deleteItem_product" class="deletebtn" type="submit"><i class="fas fa-trash"></i></button>

            </form>
            <a href="<?php printf('%s?id=%s', 'updateproduct.php',  $productt['id']); ?>">
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