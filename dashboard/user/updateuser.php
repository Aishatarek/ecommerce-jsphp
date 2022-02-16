<?php
include('../functions.php');
$item_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit_submit'])) {
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "rar" => "application/rar", "pdf" => "application/pdf");
            $filename = rand(0, 1000) . $_FILES["image"]["name"];
            $filetype = $_FILES["image"]["type"];
            $filesize = $_FILES["image"]["size"];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
            $maxsize = 5 * 1024 * 1024;
            if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
            if (in_array($filetype, $allowed)) {
                if (file_exists("../../uploads/users/" . $filename)) {
                    echo $filename . " is already exists.";
                } else {
                    $result = move_uploaded_file($_FILES["image"]["tmp_name"], "../../uploads/users/" . $filename);
                    echo "Your file was uploaded successfully.";
                }
            } else {
                echo "Error: There was a problem uploading your file. Please try again.";
            }
            if ($result) {

                $username = "'" . $_POST['username'] . "'";
                $email = "'" . $_POST['email'] . "'";
                $avatar = "'" . $filename . "'";
                $role = "'" . $_POST['role'] . "'";
                echo $_POST['role'];
                $User->updateUser($item_id, $username, $email, $avatar, $role);
            }
        } else {
            echo "Error: " . $_FILES["image"]["error"];
        }
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
                foreach ($User->getData() as $userr) :
                    if ($userr['id'] == $item_id) :

                ?>
                        <div class="theform2">
                     
                            <form method="post" enctype="multipart/form-data">
                            <p  style="font-size: 2rem; font-weight: 800;">Update User</p>
                                <input type="text" name="username" value="<?php echo $userr['username']; ?>">
                                <input type="email" name="email" value="<?php echo $userr['email']; ?>">

                                <img src="../../uploads/users/<?php echo $userr["avatar"] ?>" width="50px" alt="">
                                <input type="file" name="image">
                                <select name="role">
                                    <option <?php if ($userr["role"] == "admin") echo 'selected'; ?> value="admin">admin</option>

                                    <option <?php if ($userr["role"] == "user") echo 'selected'; ?> value="user">user</option>
                                </select>
                                <button type="submit" name="edit_submit">submit</button>
                            </form>
                            <div>
                                <img src="../../images/pexels-mister-mister-380782.jpg" alt="">
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
include('../../footer.php');
?>